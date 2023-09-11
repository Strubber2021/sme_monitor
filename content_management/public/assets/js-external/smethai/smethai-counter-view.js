$(document).ready(function () {
    $("#frm-counter").submit(function (e) {
        
        if (this.checkValidity() != false) {
            var frm = $("#frm-counter");
            var formData = new FormData(frm[0]);
            let url = "";

            if ($("#counter_id").val() != "") {
                url = '/counter/view/update'
            } else {
                url = '/counter/view/create'
            }
            
            $.ajax({
                type: frm.attr("method"),
                url:  APP_BASE_URL+ "/smethai"+url,
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
        } else {
            toastr.warning("โปรดกรอกข้อมูลในช่องที่มีเครื่องหมาย *! แล้วกดบันทึกอีกครั้ง");
        }
        e.preventDefault();
    });
});
