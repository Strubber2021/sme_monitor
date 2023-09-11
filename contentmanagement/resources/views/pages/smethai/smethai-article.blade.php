@extends('layouts.app')

@section('css-content')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <button type="button" class="default-btn" data-bs-toggle="modal" data-bs-target="#modal-01">เพิ่มข้อมูล <i class="flaticon-send"></i></button>
    </div>
    <div class="blog-area pb-70">
        <div class="container">
            <div class="section-title text-center">
                <p class="m-auto">ไม่พบข้อมูล! คุณสามารถเริ่มอัพโหลดข้อมูลของคุณได้เลยตอนนี้</p>
            </div>
            <div class="row pt-20 justify-content-center">

            </div>
        </div>
    </div>
</div>
<div id="modal-01" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header text-modal-header">
            <h1 class="modal-title fs-5" id="">Article</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form name="frm-top-company" id="frm-top-company" method="post" class="needs-validation" novalidate>
        <div class="modal-body sme-modal-box">
            @csrf
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="profile-outer-area">
                        <div class="profile-outer" style="border-bottom: unset;">
                            <div class="profileButton">
                                <input class="profileButton-input" type="file" name="company_logo" onchange="previewFile_1()" accept="image/*" id="upload-1" multiple/>
                                <label class="profileButton-button ripple-effect temp-img-1" for="upload-1">Browse Image</label>
                                <span class="profileButton-file-name"></span>
                            </div>
                            <div class="text"><h4>Article Image</h4> Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>company name<span class="text-danger">*</span></label>
                        <input type="text" name="conpany_name" id="conpany_name" class="form-control" placeholder="ชื่อบริษัท" required>
                    </div>
                </div>     
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Detail<span class="text-danger">*</label>
                        <input type="text" name="content_detail" id="content_detail" class="form-control" placeholder="ใส่คำอธิบาย เช่น 'เปิดรับสมัครพนักงานหลายอัตรา'" required>
                    </div>
                </div>  
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="is_active" id="is_active" value="1" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">ปิด/เปิด สถานะการแสดง</label>
                    </div>
                </div>   
            </div> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">บันทึก</button>
        </div>
        </form>
      </div>
    </div>
</div>
@endsection

@section('js-content')
    {{-- <script src="{{ asset('assets/js-external/smethai/smethai-article.js') }}"></script> --}}
@endsection





