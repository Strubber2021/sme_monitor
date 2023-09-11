@php
    // dd($imgshowup['data']);
@endphp
@extends('layouts.app')

@section('css-content')
<style>
   .sidemenu-area.hidden {
    z-index: 9999;
    left: -100%;
    opacity: 0;
    visibility: hidden !important;
   }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <button type="button" class="default-btn" data-bs-toggle="modal" data-bs-target="#modal-01">เพิ่มข้อมูล <i class="flaticon-send"></i></button>
    </div>
    <div class="blog-area pb-70">
        <div class="container">
            <div class="section-title text-center">
                @if (count($imgshowup['data']) == 0)
                    <p class="m-auto">ไม่พบข้อมูล! คุณสามารถเริ่มอัพโหลดข้อมูลของคุณได้เลยตอนนี้</p>
                @endif      
            </div>
            <div class="row pt-20 justify-content-center">
                @if (count($imgshowup['data']) > 0)             
                @foreach ($imgshowup['data'] as $item)
                <div class="col-lg-4 col-md-6 mt-2">
                    <div class="card card-shadow" style="border-radius: 15px; overflow: hidden;">
                        <div class="card-body p-0 text-center">
                            <img src="{{ asset($item->article_image) }}" alt="" onerror="this.onerror=null;this.src='{{ asset('assets/images/image_web_1-01.jpg') }}';">
                            
                            <div class="p-4" style="text-align: left">
                                <div class="text-muted mb-2 small" style="font-style: italic;">โดย : {{ $item->created_by }} / {{ $item->dateText }} </div>
                                <h3 style="font-weight: 700;">{{ $item->article_name }}</h3>
                                <div class="text-muted small">{{ $item->article_preview }}</div>
                                <div class="d-flex justify-content-between mt-3">
                                    <span>
                                        <span class="a-pointer" title="{{ $item->is_active == '1' ? "เปิดการแสดงผลข้อมูล" : "ปิดการแสดงผลข้อมูล" }}" onclick="changeStatus(`{{ $item->id }}`,`{{ $item->is_active }}`)">
                                            @if ($item->is_active == '1')
                                                <i class="fas fa-eye text-success"></i>
                                            @else
                                                <i class="fas fa-eye-slash"></i>
                                            @endif
                                        </span>
                                         {{ $item->counter_view }}
                                    </span>
                                    <div class="small">
                                        <span class="text-warning a-pointer" onclick="edit({{ $item->id }})">แก้ไข</span>
                                        <span>|</span>
                                        <span class="text-danger a-pointer" onclick="destroy({{ $item->id }})">ลบ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                
                @endif
                <div class="col-lg-12 col-md-12 text-center mt-5">
                    @if (count($imgshowup['data']) > 0)    
                        <div class="pagination-area">
                            @if ($imgshowup['prev_page_url'] != null)                    
                                <a href="{{ $imgshowup['prev_page_url'] }}" class="prev page-numbers">
                                    <i class="ri-arrow-left-s-line"></i>
                                </a>
                            @endif
                            @foreach ($imgshowup['page_number'] as $item)
                                <a href="{{ $item['url'] }}" class="page-numbers {{ $item['active'] == true ? 'current' : ''}}">{{ $item['label'] }}</a>
                            @endforeach
                            @if ($imgshowup['last_page_url'] != null && $imgshowup['next_page_url'] != null)    
                                <a href="{{ $imgshowup['last_page_url'] }}" class="next page-numbers">
                                    <i class="ri-arrow-right-s-line"></i>
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-01" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header text-modal-header">
            <h1 class="modal-title fs-5" id="">Article</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form name="frm-article" id="frm-article" method="post" data-id="" data-frmstatus="create" data-imageurl="" class="needs-validation" novalidate>
        <div class="modal-body sme-modal-box">
            @csrf
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="profile-outer-area">
                        <div class="profile-outer" style="border-bottom: unset;">
                            <div class="profileButton">
                                <input class="profileButton-input" type="file" name="article_image" onchange="previewFile()" accept="image/*" id="upload-1" multiple/>
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
                        <label>Article Name<span class="text-danger">*</span></label>
                        <input type="text" name="article_name" id="article_name" class="form-control" placeholder="ชื่อบทความ" required>
                    </div>
                </div>     
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Article Preview<span class="text-danger">*</label>
                        <input type="text" name="article_preview" id="article_preview" class="form-control" placeholder="ตัวอย่างบทความโดยย่อ" required>
                    </div>
                </div>  
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Article Detail<span class="text-danger">*</span></label>
                        <textarea name="article_detail" id="article_detail" placeholder="" class="form-control" required></textarea>
                    </div>
                </div>
                {{-- 
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="form-group select-group">
                        <label>Post In<span class="text-danger">*</span></label>

                        <select name="post_in" id="post_in" class="form-select form-control" required>
                            <option value="">โปรดระบุ</option>
                            @if (count($project_sme) > 0)
                                @foreach ($project_sme as $item)
                                    <option value="{{ $item->id }}">{{ $item->project_name_th }}</option>                                    
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                 --}}
                <div class="mt-3 mb-2" style="font-size: 16px; font-weight: 500;">Post In<span class="text-danger">*</span></div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="post_in_ninec" id="post_in_ninec" value="1" checked>
                            <label class="form-check-label" for="post_in_ninec">
                                Ninechang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="post_in_bukk" id="post_in_bukk" value="1" checked>
                            <label class="form-check-label" for="post_in_bukk">
                                Bukkhon
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="post_in_sme_th" id="post_in_sme_th" value="1" checked>
                            <label class="form-check-label" for="post_in_sme_th">
                                Smethaisoftware
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="post_in_job_th" id="post_in_job_th" value="1" checked>
                            <label class="form-check-label" for="post_in_job_th">
                                งานไทย
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="post_in_find_chang" id="post_in_find_chang" value="1" checked>
                            <label class="form-check-label" for="post_in_find_chang">
                                หาช่างหางาน
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="mt-3" style="font-size: 16px; font-weight: 500;">สถานะ</div>
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="is_active" id="is_active" value="1" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">ปิด/เปิด สถานะการแสดงผล</label>
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
    <script src="{{ asset('assets/js-external/article.js') }}"></script>
@endsection





