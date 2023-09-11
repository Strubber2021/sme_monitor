@php
    // dd($imgshowup);
@endphp
@extends('layouts.app')

@section('css-content')
@endsection

@section('content')
{{-- 
<div class="my-profile-box">
    <h3 data-bs-toggle="modal" data-bs-target="#modal-01">Profile Details</h3>
    
    <div class="bar"></div>
    <form name="frm-top-company" id="frm-top-company" method="post" class="needs-validation" novalidate>
    @csrf
    <div class="row align-items-center">
        <div class="col-xl-6 col-lg-12 col-md-12">
            <div class="profile-outer-area">
                <div class="profile-outer" style="border-bottom: unset;">
                    <div class="profileButton">
                        <input class="profileButton-input" type="file" name="company_logo" onchange="previewFile_1()" accept="image/*" id="upload-1" multiple/>
                        <label class="profileButton-button ripple-effect temp-img-1" for="upload-1">Browse Logo</label>
                        <span class="profileButton-file-name"></span>
                    </div>
                    <div class="text"><h4>Company Logo</h4> Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-md-12">
            <div class="profile-outer-area">
                <div class="profile-outer" style="border-bottom: unset;">
                    <div class="profileButton">
                        <input class="profileButton-input" type="file" name="company_banner" onchange="previewFile_2()" accept="image/*" id="upload-2" multiple/>
                        <label class="profileButton-button ripple-effect temp-img-2" for="upload-2">Browse Banner</label>
                        <span class="profileButton-file-name"></span>
                    </div>
                    <div class="text"><h4>Banner</h4> Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</div>
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
        <div class="col-lg-12 col-md-12 mt-4">
            <button type="submit" class="default-btn">บันทึก <i class="flaticon-send"></i></button>
        </div>
    </div>    
    </form>   
</div>
 --}}
<div class="row">
    <div class="col-lg-12 col-md-12">
        <button type="button" class="default-btn" data-bs-toggle="modal" data-bs-target="#modal-01">เพิ่มข้อมูล <i class="flaticon-send"></i></button>
    </div>
</div>

<div class="blog-area pb-70">
    <div class="container">
        <div class="section-title text-center">
            {{-- <h2>Top Company</h2> --}}
            {{-- <div class="bar m-auto"></div> --}}
            @if (count($imgshowup['data']) == 0)
                <p class="m-auto">ไม่พบข้อมูล! คุณสามารถเริ่มอัพโหลดข้อมูลของคุณได้เลยตอนนี้</p>
            @endif            
        </div>
        <div class="row pt-20 justify-content-center">
            @if (count($imgshowup['data']) > 0)             
                @foreach ($imgshowup['data'] as $item)
                <div class="col-lg-3 col-md-6 mt-2">
                    {{-- 
                    <div class="blog-card">
                        <div class="blog-img" style="hw">
                            <a href="#">
                                <img src="{{ asset($item->banner_path) }}" alt="Blog Images">
                            </a>
                            <div class="tag tag-danger" style="cursor: pointer;" data-id="{{ $item->id }}" data-name="{{ $item->imgName }}" onclick="destroyImage(`{{ $item->id }}`,`{{ $item->imgName }}`)">
                                DELETE
                            </div>
                        </div>
                        <div class="content small">
                            <ul>
                                <li>
                                    <i class="ri-time-line"></i> {{ $item->dateText }}
                                </li>
                                <li>
                                    <i class="ri-user-line" title="โพสโดย"></i> {{ $item->created_by }}
                                </li>
                            </ul>
                        </div>
                    </div>
                     --}}
                     <div class="card card-shadow" style="border-radius: 15px;">
                        <div class="card-header bg-white p-4 text-center" style="border-radius: 15px 15px 0px 0px;">
                            <img src="{{ asset($item->company_logo) }}" height="60" alt="" onerror="this.onerror=null;this.src='{{ asset('assets/images/empty-logo.png') }}';">
                        </div>
                        <div class="card-body p-0 text-center">
                            <img src="{{ asset($item->company_banner) }}" alt="" onerror="this.onerror=null;this.src='{{ asset('assets/images/image_web_1-01.jpg') }}';">
                        </div>
                        <div class="card-footer bg-white"style="border-radius: 0px 0px 15px 15px;">
                            <h3 class="top-company-name mb-0">{{ $item->conpany_name }}</h3>
                            <div class="top-company-detail text-muted">{{ $item->content_detail }}</div>
                            <div class="d-flex justify-content-between mt-2">
                                <small class="font-style-italic a-pointer" onclick="changeStatus(`{{ $item->id }}`,`{{ $item->is_active }}`)">
                                    <span>สถานะ : </span>
                                    @if ($item->is_active == "1")
                                        <span class="text-success">แสดงข้อมูล</span>
                                    @else
                                        <span class="text-muted">ปิด</span>
                                    @endif
                                </small>
                                <div class="small">
                                    {{--  
                                    <span class="text-warning a-pointer" onclick="editDetail({{ $item->id }})">แก้ไข</span>
                                    <span class="font-weight-bold">|</span>
                                    --}}
                                    <span class="text-danger a-pointer" onclick="destroyCompany({{ $item->id }})">ลบ</span>
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
<div id="modal-01" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header text-modal-header">
            <h1 class="modal-title fs-5" id="">Top Company</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form name="frm-top-company" id="frm-top-company" method="post" class="needs-validation" novalidate>
        <div class="modal-body sme-modal-box">
            @csrf
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="profile-outer-area">
                        <div class="profile-outer" style="border-bottom: unset;">
                            <div class="profileButton">
                                <input class="profileButton-input" type="file" name="company_logo" onchange="previewFile_1()" accept="image/*" id="upload-1" multiple/>
                                <label class="profileButton-button ripple-effect temp-img-1" for="upload-1">Browse Logo</label>
                                <span class="profileButton-file-name"></span>
                            </div>
                            <div class="text"><h4>Company Logo</h4> Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="profile-outer-area">
                        <div class="profile-outer" style="border-bottom: unset;">
                            <div class="profileButton">
                                <input class="profileButton-input" type="file" name="company_banner" onchange="previewFile_2()" accept="image/*" id="upload-2" multiple/>
                                <label class="profileButton-button ripple-effect temp-img-2" for="upload-2">Browse Banner</label>
                                <span class="profileButton-file-name"></span>
                            </div>
                            <div class="text"><h4>Banner</h4> Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</div>
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
    <script src="{{ asset('assets/js-external/jobth/jobth-top-company.js') }}"></script>
@endsection
