@php
    // dd($download);
@endphp
@extends('layouts.app')

@section('css-content')
@endsection

@section('content')
    <div class="dashboard-fun-fact-area">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <a href="/smethai/counter/view">
                        <div class="icon-box">
                            <i class="ri-eye-line"></i>
                        </div>
                        <span class="sub-title">ยอดเข้าชมเว็บ</span>
                        <h3>{{ $counter != null ? number_format($counter->counter,0) : "0"  }}</h3>
                    </a>
                </div>
            </div>
            {{-- 
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <a href="/smethai/counter/download">
                        <div class="icon-box">
                            <i class="ri-arrow-down-circle-line"></i>
                        </div>
                        <span class="sub-title">ยอดดาวน์โหลด</span>
                        <h3>{{ $download != null ? number_format($download->counter,0) : "0" }}</h3>
                    </a>
                </div>
            </div>
             --}}
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <a href="/smethai/company/logo">
                        <div class="icon-box">
                            <i class="ri-building-line"></i>
                        </div>
                        <span class="sub-title">บริษัทที่ใช้งาน</span>
                        <h3>{{ number_format($company_logo,0)  }}</h3>
                    </a>
                </div>
            </div>
            {{-- 
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <a href="/smethai/article">
                        <div class="icon-box">
                            <i class="ri-bookmark-line"></i>
                        </div>
                        <span class="sub-title">กิจกรรมและข่าวสาร</span>
                        <h3>0</h3>
                    </a>
                </div>
            </div>
             --}}
        </div>
    </div>
@endsection

@section('js-content')
@endsection
