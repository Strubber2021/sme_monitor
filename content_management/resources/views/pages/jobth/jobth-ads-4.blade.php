@php
    // dd($imgshowup);
@endphp
@extends('layouts.app')

@section('css-content')
@endsection

@section('content')
<div class="my-profile-box">
    <h3>Form upload</h3>
    <div class="bar"></div>
    
    <form id="frm-ad1" method="post" class="needs-validation" novalidate>
        @csrf
        <div class="profile-outer-area">
            <div class="profile-outer">
                <div class="profileButton">
                    <input class="profileButton-input" type="file" name="attachments" onchange="previewFile()" accept="image/*" id="upload" multiple/>
                    <label class="profileButton-button ripple-effect" for="upload">อัพโหลดรูปภาพ</label>
                    <span class="profileButton-file-name"></span>
                </div>
                <div class="text">Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</div>
            </div>
        </div>    
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <button type="submit" class="default-btn">บันทึก <i class="flaticon-send"></i></button>
            </div>
        </div>
    </form>
</div>

<div class="blog-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>รูปภาพโฆษณา AD 4</h2>
            <div class="bar m-auto"></div>
            @if (count($imgshowup['data']) == 0)
                <p class="m-auto">ไม่พบรูปภาพ! คุณสามารถเริ่มอัพโหลดภาพแรกของคุณได้เลยตอนนี้</p>
            @endif            
        </div>
        <div class="row pt-45 justify-content-center">
            @if (count($imgshowup['data']) > 0)             
                @foreach ($imgshowup['data'] as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="blog-card">
                        <div class="blog-img" style="hw">
                            <a href="#">
                                <img src="{{ asset($item->banner_path) }}" alt="Blog Images" onerror="this.onerror=null;this.src='{{ asset('assets/images/image_web_1-01.jpg') }}';">
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
                </div>
                @endforeach
            @else
                
            @endif
            <div class="col-lg-12 col-md-12 text-center">
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
@endsection


@section('js-content')
    <script src="{{ asset('assets/js-external/jobth/jobth-ad-4.js') }}"></script>
@endsection
