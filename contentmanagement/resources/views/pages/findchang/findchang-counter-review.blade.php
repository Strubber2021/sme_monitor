@extends('layouts.app')

@section('css-content')
<style>
    .counter-custom {
        font-family: "Helvetica Neue",sans-serif;
        line-height: 1.1em;
        font-size: 45px !important;
        font-weight: 500;
    }
</style>
@endsection

@section('content')
<div class="my-profile-box">
    <h3>Form upload</h3>
    <div class="bar"></div>
    
    <form id="frm-counter" method="post" class="needs-validation" novalidate>
        @csrf
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-12 col-md-12">
                <div class="form-group">
                    <label>ระบุคะแนนรีวิว <span class="text-danger">*</span> </label>
                    <input type="number" class="form-control" name="counter" placeholder="" min="0" step="1" value="{{ $counter != null ? $counter->counter : '' }}" required>
                    <input type="hidden" id="counter_id" name="counter_id" value="{{ $counter != null ? $counter->id : '' }}">
                </div>
            </div>
            
            <div class="col-xl-6 col-lg-12 col-md-12">
                <div class="form-group">
                    <div class="text-center">
                    <h3><span class="counter-custom">{{ number_format($counter != null ? $counter->counter : 0,0) }}</span></h3>
                        <div class="bar m-auto"></div>
                        <p style="margin-bottom: 0; margin-top: 10px;">คะแนนรีวิว Review</p></div>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <button type="submit" class="default-btn">บันทึก <i class="flaticon-send"></i></button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js-content')
    <script src="{{ asset('assets/js-external/findchang/findchang-counter-review.js') }}"></script>
@endsection




