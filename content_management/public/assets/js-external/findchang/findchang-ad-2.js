function destroyImage(imgId, imgName) {
    Swal.fire({
        title: "ลบรูปนี้",
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
                url:  APP_BASE_URL+ "/findchang/ads/2/destroy/img/" + imgId + "/" + imgName,
                success: function (response) {
                    Swal.fire({
                        title: "สำเร็จ",
                        text: "ระบบได้ลบรูปภาพของคุณเรียบร้อยแล้ว",
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
function previewFile() {
    var preview = document.querySelector(".ripple-effect");
    var file = document.querySelector("input[type=file]").files[0];
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

$(document).ready(function () {
    $("#frm-ad2").submit(function (e) {
        if ($("input[type=file]")[0].files[0] != undefined) {
            var frm = $("#frm-ad2");
            var formData = new FormData(frm[0]);
            formData.append("image", $("input[type=file]")[0].files[0]);

            $.ajax({
                type: frm.attr("method"),
                url:  APP_BASE_URL+ "/findchang/ads/2/store/img",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            title: "สำเร็จ",
                            text: "ระบบได้บันทึกรูปภาพของคุณเรียบร้อยแล้ว",
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
            toastr.warning("โปรดเลือกรูปถาพ! แล้วกดบันทึกอีกครั้ง");
        }
        e.preventDefault();
    });
});
