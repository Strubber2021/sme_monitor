@extends('layouts.app')

@section('css-content')
@endsection

@section('content')
    <div class="dashboard-fun-fact-area">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <a href="/bukkhon/ads/1">
                        <div class="icon-box">
                            <i class="ri-image-line"></i>
                        </div>
                        <span class="sub-title">รูปภาพในหัวข้อ AD1</span>
                        <h3>{{ number_format($ad1,0)  }}</h3>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <a href="/bukkhon/ads/2">
                        <div class="icon-box">
                            <i class="ri-image-line"></i>
                        </div>
                        <span class="sub-title">รูปภาพในหัวข้อ AD2</span>
                        <h3>{{ number_format($ad2,0)  }}</h3>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <a href="/bukkhon/ads/3">
                        <div class="icon-box">
                            <i class="ri-image-line"></i>
                        </div>
                        <span class="sub-title">รูปภาพในหัวข้อ AD3</span>
                        <h3>{{ number_format($ad3,0)  }}</h3>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <a href="/bukkhon/vdo/1">
                        <div class="icon-box">
                            <i class="ri-movie-fill"></i>
                        </div>
                        <span class="sub-title">วิดีโอในหัวข้อ Video 1</span>
                        <h3>{{ number_format($vdo1,0)  }}</h3>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <a href="/bukkhon/company/logo">
                        <div class="icon-box">
                            <i class="ri-building-line"></i>
                        </div>
                        <span class="sub-title">บริษัทที่ใช้งาน</span>
                        <h3>{{ number_format($company_logo,0)  }}</h3>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <a href="/bukkhon/counter/download">
                        <div class="icon-box">
                            <i class="ri-arrow-down-circle-line"></i>
                        </div>
                        <span class="sub-title">ยอดดาวน์โหลด</span>
                        <h3>{{ $download != null ? number_format($download->counter,0) : "0" }}</h3>
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js-content')
@endsection
