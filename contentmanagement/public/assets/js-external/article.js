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
function changeStatus(id, is_active){
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
                url:  APP_BASE_URL+ "/article/changeStatus/"+id+'/'+is_active,
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
function edit(id){
	$.ajax({
		type: "get",
		url:  APP_BASE_URL+ "/article/get/"+id,
		success: function (response) {
			if (response.success) {
				let data = response.data
				// console.log(data);
				if (data.article_image != "") {
					let img_path = APP_BASE_URL + '/' + data.article_image;
					// $('.ripple-effect').attr('src', img_path);

					var preview = document.querySelector(".ripple-effect");
					preview.style.backgroundImage = `url(${img_path})`
					preview.style.backgroundSize = `cover`;
        			preview.style.backgroundRepeat = `round`;
					$('#frm-article').data('imageurl',data.article_image)
				}

				
				$('#frm-article').data('id',data.id)
				$('#frm-article').data('frmstatus', "edit")
				
				$('#article_name').val(data.article_name)
				$('#article_preview').val(data.article_preview)
				$('#article_detail').val(data.article_detail).trigger('change');
				// $('#post_in').val(data.post_in)
				data.post_in_ninec == '1' ? $('#post_in_ninec').prop('checked',true) : $('#post_in_ninec').prop('checked',false)
				data.post_in_bukk == '1' ? $('#post_in_bukk').prop('checked',true) : $('#post_in_bukk').prop('checked',false)
				data.post_in_sme_th == '1' ? $('#post_in_sme_th').prop('checked',true) : $('#post_in_sme_th').prop('checked',false)
				data.post_in_job_th == '1' ? $('#post_in_job_th').prop('checked',true) : $('#post_in_job_th').prop('checked',false)
				data.post_in_find_chang == '1' ? $('#post_in_find_chang').prop('checked',true) : $('#post_in_find_chang').prop('checked',false)

				data.is_active == "1" ? $('#flexSwitchCheckChecked').prop('checked',true) : $('#flexSwitchCheckChecked').prop('checked',false)
				$('#modal-01').modal('show')
			} else {
				toastr.warning(response.message);
			}
		}
	});
}
function destroy(id) {
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
                url:  APP_BASE_URL+ "/article/destroy/"+id,
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
	$('#frm-article').submit(function (e) { 
        e.preventDefault();  
        if($('#post_in_ninec').is(':checked') == false && $('#post_in_bukk').is(':checked') == false && $('#post_in_sme_th').is(':checked') == false && $('#post_in_job_th').is(':checked') == false){
            toastr.warning("โปรดเลือกชื่อโปรเจ็ค อย่างน้อยหนึ่งรายการ! แล้วกดบันทึกอีกครั้ง");
            // $('#post_in_ninec').prop('checked',true)
            return
        }
        if (this.checkValidity() != false) {
            var frm = $(this);
            var formData = new FormData(frm[0]);
			formData.append("article_image", $("input[type=file]")[0].files[0]);
			let url = "";
			let frmStatus = $('#frm-article').data('frmstatus')

			
			if (frmStatus == "create") {
				url = "/article/create"
			} else {
				url = "/article/update"
				formData.append("id", $('#frm-article').data('id'));
				$('#frm-article').data('imageurl') != "" ? formData.append("old_image", $('#frm-article').data('imageurl')) : formData.append("old_image", null)
			}

            var post_in_ninec = "0";
            if ($('#post_in_ninec').is(':checked')) {
                post_in_ninec = "1";
            }else{
                post_in_ninec = "0";
                formData.append("post_in_ninec", post_in_ninec);
            }

            var post_in_bukk = "0";
            if ($('#post_in_bukk').is(':checked')) {
                post_in_bukk = "1";
            }else{
                post_in_bukk = "0";
                formData.append("post_in_bukk", post_in_bukk);
            }
            
            var post_in_sme_th = "0";
            if ($('#post_in_sme_th').is(':checked')) {
                post_in_sme_th = "1";
            }else{
                post_in_sme_th = "0";
                formData.append("post_in_sme_th", post_in_sme_th);
            }

            var post_in_job_th = "0";
            if ($('#post_in_job_th').is(':checked')) {
                post_in_job_th = "1";
            }else{
                post_in_job_th = "0";
                formData.append("post_in_job_th", post_in_job_th);
            }

            var post_in_find_chang = "0";
            if ($('#post_in_find_chang').is(':checked')) {
                post_in_find_chang = "1";
            }else{
                post_in_find_chang = "0";
                formData.append("post_in_find_chang", post_in_find_chang);
            }

			var is_active = "0";
            if ($('input.form-check-input').is(':checked')) {
                is_active = "1";
            }else{
                is_active = "0";
                formData.append("is_active", is_active);
            }

            
            $.ajax({
                type: frm.attr("method"),
                url: url,
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

    $('#article_detail').richText({
		showToolbar: false,
		// text formatting
		bold: true,
		italic: true,
		underline: true,
		
		// text alignment
		leftAlign: true,
		centerAlign: true,
		rightAlign: true,
		justify: true,
	
		// lists
		ol: true,
		ul: true,
	
		// title
		heading: true,
	
		// fonts
		fonts: false,
		fontList: [
			"Arial", 
			"Arial Black", 
			"Comic Sans MS", 
			"Courier New", 
			"Geneva", 
			"Georgia", 
			"Helvetica", 
			"Impact", 
			"Lucida Console", 
			"Tahoma", 
			"Times New Roman",
			"Verdana"
		],
		fontColor: false,
		fontSize: true,
	
		// uploads
		imageUpload: false,
		fileUpload: false,
	
		// media
		videoEmbed: false,
	
		// link
		urls: false,
	
		// tables
		table: false,
	
		// code
		removeStyles: false,
		code: false,
	
		// privacy
		youtubeCookies: false,
			
		// preview
		preview: false,
		

	
		// developer settings
		useSingleQuotes: false,
		height: 200,
		callback: undefined,
		useTabForNext: false
	});

	$("#modal-01").on('shown.bs.modal', function () {
        
    });
    $("#modal-01").on('hidden.bs.modal', function () {
        $('#frm-article').removeClass('was-validated')
		$('#article_detail').val("").trigger('change');
        $(this).find('#frm-article')[0].reset();

		var preview = document.querySelector(".ripple-effect");
		preview.style.backgroundImage = `url("")`
    });
});