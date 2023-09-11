@php
    // dd($imgshowup);
@endphp
@extends('layouts.app')

@section('css-content')
<style>
    .single-applicants-card {
        min-height: 111px;
    }
</style>
@endsection

@section('content')
<div class="my-profile-box">
    <h3>Form upload vdo</h3>
    <div class="bar"></div>
    <form id="frm-upload-vdo" method="post" class="needs-validation" novalidate>
        @csrf
        <div class="row align-items-center">
            <div class="col-xl-4 col-lg-12 col-md-12">
                <div class="form-group">
                    <label>Vdo name <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" name="vdo_name" placeholder="" required>
                </div>
            </div>
            
            <div class="col-xl-5 col-lg-12 col-md-12">
                <div class="form-group">
                    <label>vdo link <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="vdo_link" placeholder="" required>
                </div>
            </div>

            <div class="col-xl-3 col-lg-12 col-md-12">
                <div class="form-group">
                    <label>Vdo number <span class="text-muted small">( https://youtu.be/<span class="text-danger" title="เพื่อแสดงภาพหน้าปก VDO">j4rk0jDBXYc</span> )</span></label>
                    <input type="text" class="form-control" name="vdo_number" placeholder="">
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <button type="submit" class="default-btn">บันทึก <i class="flaticon-send"></i></button>
            </div>
        </div>
    </form>
</div>

<div class="blog-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>LINK VDO 2</h2>
            <div class="bar m-auto"></div>
            @if (count($vdoshowup['data']) == 0)
                <p class="m-auto">ไม่พบ Link Vdo! คุณสามารถเริ่มอัพโหลด VDO แรกของคุณได้เลยตอนนี้</p>
            @endif            
        </div>
        <div class="row pt-45 justify-content-center">
            @if (count($vdoshowup['data']) > 0) 
                @foreach ($vdoshowup['data'] as $item)
                <div class="col-lg-6 col-md-12">
                    <div class="single-applicants-card bg-white">
                        <div class="image">
                            <a href="{{ $item->vdo_link }}" target="_blank"><img src="{{ $item->vdo_number != null ? url('https://img.youtube.com/vi/'.$item->vdo_number.'/hqdefault.jpg') : '/assets/images/blog/blog-img4.jpg' }}" alt="image" /></a>
                        </div>

                        <div class="content">
                            <h3>
                                <a href="{{ $item->vdo_link }}" target="_blank">{{ $item->vdo_name }}</a>
                            </h3>
                            <span title="วันที่บันทึกข้อมูล">{{ date_format(date_create($item->created_at),"d/m/Y H:i:s") }}</span>
                            <div class="applicants-footer">
                                <ul class="option-list">
                                    <li>
                                        <button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $item->vdo_link }}" type="button"><i class="ri-links-line"></i></button>
                                    </li>
                                    <li>
                                        <button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="ลบข้อมูล" type="button" onclick="destroyVdo({{ $item->id }})"><i class="ri-delete-bin-line"></i></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach 
            @endif
            <div class="col-lg-12 col-md-12 text-center mt-5">
                @if (count($vdoshowup['data']) > 0)    
                    <div class="pagination-area">
                        @if ($vdoshowup['prev_page_url'] != null)                    
                            <a href="{{ $vdoshowup['prev_page_url'] }}" class="prev page-numbers">
                                <i class="ri-arrow-left-s-line"></i>
                            </a>
                        @endif
                        @foreach ($vdoshowup['page_number'] as $item)
                            <a href="{{ $item['url'] }}" class="page-numbers {{ $item['active'] == true ? 'current' : ''}}">{{ $item['label'] }}</a>
                        @endforeach
                        @if ($vdoshowup['last_page_url'] != null && $vdoshowup['next_page_url'] != null)    
                            <a href="{{ $vdoshowup['last_page_url'] }}" class="next page-numbers">
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
    <script src="{{ asset('assets/js-external/ninechang/ninechang-vdo-2.js') }}"></script>
@endsection
