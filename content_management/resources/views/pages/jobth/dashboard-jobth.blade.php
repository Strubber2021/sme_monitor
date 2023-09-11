@extends('layouts.app')

@section('css-content')
@endsection

@section('content')
    <div class="dashboard-fun-fact-area">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <a href="/jobth/ads/1">
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
                    <a href="/jobth/ads/2">
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
                    <a href="/jobth/top/company">
                        <div class="icon-box">
                            <i class="ri-building-line"></i>
                        </div>
                        <span class="sub-title">Top Company AD3</span>
                        <h3>{{ number_format($ad3,0)  }}</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <a href="/jobth/ads/4">
                        <div class="icon-box">
                            <i class="ri-image-line"></i>
                        </div>
                        <span class="sub-title">รูปภาพในหัวข้อ AD4</span>
                        <h3>{{ number_format($ad4,0)  }}</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-content')
@endsection
