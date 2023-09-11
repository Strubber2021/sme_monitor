function destroyVdo(id) {
    Swal.fire({
        title: "ลบวิดีโอนี้",
        text: "กดยืนยันอีกครั้ง",
        icon: "worning",
        confirmButtonColor: "#3085d6",
        confirmButtonText: "ยืนยัน",
        allowOutsideClick: false,
        allowEscapeKey: false,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "get",
                url:  APP_BASE_URL+ "/findchang/vdo/1/destroy/" + id,
                success: function (response) {
                    Swal.fire({
                        title: "สำเร็จ",
                        text: "ระบบได้ลบวิดีโอภาพของคุณเรียบร้อยแล้ว",
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
                },
            });
        }
    });
}
$(document).ready(function () {
    $('#frm-upload-vdo').submit(function (e) { 
        e.preventDefault();  
        if (this.checkValidity() != false) {
            var frm = $(this);
            var formData = new FormData(frm[0]);
            
            $.ajax({
                type: frm.attr("method"),
                url:  APP_BASE_URL+ "/findchang/vdo/1/create",
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
                }
            });
        } else {
            toastr.warning("โปรดระบุข้อมูลในช่องที่มีเครื่องหมาย * ให้ครบถ้าน! แล้วกดบันทึกอีกครั้ง");
        }              
    });
});