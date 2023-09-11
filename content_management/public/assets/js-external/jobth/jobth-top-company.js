function previewFile_1() {
    var preview = document.querySelector(".temp-img-1");
    var file = document.querySelector("#upload-1").files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
        preview.style.backgroundImage = `url(${reader.result})`;
        preview.style.backgroundSize = `cover`;
        preview.style.backgroundRepeat = `round`;
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}

function previewFile_2() {
    var preview = document.querySelector(".temp-img-2");
    var file = document.querySelector("#upload-2").files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
        preview.style.backgroundImage = `url(${reader.result})`;
        preview.style.backgroundSize = `cover`;
        preview.style.backgroundRepeat = `round`;
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}

function changeStatus(id, status){
    Swal.fire({
        title: "เปลี่ยนสถานะ",
        text: "ต้องการเปลี่ยนสถานะการแสดงข้อมูล! โปรดยืนยันอีกครั้ง",
        icon: "warning",
        confirmButtonColor: "#ffc107",
        confirmButtonText: "เปลี่ยนสถานะ",
        allowOutsideClick: false,
        allowEscapeKey: false,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "get",
                url:  APP_BASE_URL+ "/jobth/ads/3/top/company/change/status/"+id+'/'+status,
                success: function (response) {
                    if (response.success) {
                        window.location.reload();
                    } else {
                        toastr.warning(response.message);
                    }
                }
            });
        }
    });
}
// function editDetail(id){}
function destroyCompany(id){
    Swal.fire({
        title: "ลบข้อมูลนี้",
        text: "โปรดยืนยันอีกครั้ง",
        icon: "warning",
        confirmButtonColor: "#dc3545",
        confirmButtonText: "ลบ",
        allowOutsideClick: false,
        allowEscapeKey: false,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "get",
                url:  APP_BASE_URL+ "/jobth/ads/3/top/company/destroy/"+id,
                success: function (response) {
                    if (response.success) {
                        window.location.reload();
                    } else {
                        toastr.warning(response.message);
                    }
                }
            });
        }
    });
}


$(document).ready(function () {
    $('#frm-top-company').submit(function (e) { 
        e.preventDefault();
        
        var company_logo = $("#upload-1")[0].files[0];
        var company_banner = $("#upload-2")[0].files[0];
        
        if (company_logo == undefined) {
            toastr.warning("โปรดเลือกรูปถาพ โลโก้บริษัท! แล้วกดบันทึกอีกครั้ง");
            return
        }

        if (company_banner == undefined) {
            toastr.warning("โปรดเลือกรูปถาพ แบรนเนอร์! แล้วกดบันทึกอีกครั้ง");
            return
        }

        if (this.checkValidity() != false) {
            var frm = $(this);
            var formData = new FormData(frm[0]);
            var is_active = "0";


            if ($('input.form-check-input').is(':checked')) {
                is_active = "1";
            }else{
                is_active = "0";
                formData.append("is_active", is_active);
            }

            formData.append("company_logo", company_logo);
            formData.append("company_banner", company_banner);

            $.ajax({
                type: frm.attr("method"),
                url:  APP_BASE_URL+ "/jobth/ads/3/top/company/create",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            title: "สำเร็จ",
                            text: "ระบบได้บันทึกข้อมูลของคุณเรียบร้อยแล้ว",
                            icon: "success",
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "ตกลง",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    } else {
                        toastr.warning(response.message);
                    }
                },
            });
        }else{
            toastr.warning("โปรดกรอกข้อมูลในช่องที่มีเครื่องหมาย *! แล้วกดบันทึกอีกครั้ง");
        }
    });
    $("#modal-01").on('shown.bs.modal', function () {});
    $("#modal-01").on('hidden.bs.modal', function () {
        $('#frm-top-company').removeClass('was-validated')
        $(this).find('#frm-top-company')[0].reset();
    });
});