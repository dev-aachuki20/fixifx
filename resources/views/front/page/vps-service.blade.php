@php
$keywords_jp = 'FX、サポート、サービス、vps サービス';
$description_jp = 'FiXi FX（フィクシー）が提供するcTrader(Android版)に関するページです。';
@endphp

@extends('front.layouts.base')

@section('content')
<!-- Hero section  -->
<section class="vps-services-wrapper whsection-text padding-tb-180 pb-0 d-flex flex-wrap align-items-center space-bottom-100">
    <div class="container">

        @php $section1 = $section->where('section_no', 1)->where('status', 1)->first() @endphp
        @if($section1)
        <div class="reward-wrapper-herobox border-bottom-0">
            <div class="row align-items-center">
                <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="other-banner-text">
                        <h1>{{ $section1->{config('app.locale').'_title'} }}</h1>
                        <div class="section-head">
                            <div class="discription">
                                <p>{!! $section1->{config('app.locale').'_desc'} !!}</p>
                            </div>
                        </div>
                        <div class="openAi-btn d-flex align-items-center justify-content-start">
                            <a href="{{ getSettingValue('live_link') }}" class="custom-btn fill-btn-1">{{__('message.open_account_btn')}}</a>
                            <a href="{{ getSettingValue('live_link') }}" class="custom-btn fill-btn">{{ getSettingValue('foot_live_link_btn_'.config('app.locale')) }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-12  col-xl-6 col-lg-6 col-md-6 col-sm-12 text-center">
                    <div class="imgbox">
                        <img class="img-fluid" src="{{$section1 && $section1->image ? $section1->image : asset('fixifx/images/vps-services01.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- end  -->

        @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
        @if($section2)
        <div class="vps-automate ptop-50">
            <div class="automate-trade">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="leftcontent-wrap">
                            <div class="title">
                                <h2>
                                    {{ $section2->{config('app.locale').'_title'} }}
                                </h2>
                            </div>
                            {!! $section2->{config('app.locale').'_desc'} !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 text-center">
                        <div class="imgbox ptop-30">
                            <img class="img-fluid" src="{{$section2 && $section2->image ? $section2->image : asset('fixifx/images/vps-services02.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end  -->

        <div class="award-listing-inner pb-0">
            @foreach($section2->subSection as $sub_sec_index => $sub_sec)
            @if($sub_sec->status == 1)
            <div class="awrad-items">
                <div class="iconbox">
                    <img class="img-fluid" src="{{$sub_sec && $sub_sec->image ? $sub_sec->image : asset('fixifx/images/award-listing01.svg')}}" alt="">
                </div>
                <div class="title">
                    <h6>
                        {{ $sub_sec->{config('app.locale').'_title'} }}
                    </h6>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @endif
    </div>
</section>
<!-- end  -->

<!-- we trade -->
@php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
@if($section3)
<section class="we-trade-wrapper bg-white padding-top-120 padding-bottom-240 mb-120 ptop-50 vps-service-trade" style="background-image:url('{{ asset('fixifx/images/bg-glob-1.svg')}}');background-repeat: no-repeat; background-position: bottom left;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-xl-5">
                <div class="leftProudly_box">
                    <div class="title">
                        <h2>
                            {{ $section3->{config('app.locale').'_title'} }}
                        </h2>
                    </div>
                    <div class="discription">
                        <p>{!! $section3->{config('app.locale').'_desc'} !!}</p>
                    </div>
                    <div class="button-group">
                        <a href="{{ getSettingValue('live_link') }}" class="custom-btn fill-btn">{{__('message.open_account_btn')}}</a>
                        <a href="{{ getSettingValue('live_link') }}" class="custom-btn fill-btn-1">{{ getSettingValue('foot_live_link_btn_'.config('app.locale')) }}</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-7">
                <div class="imgbox ptop-30">
                    <img class="img-fluid" src="{{$section3 && $section3->image ? $section3->image : asset('fixifx/images/vps-services03.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- end we trade -->

<section class="handling-vps-wrapper padding-tb-120 bg-snow-drift">
    <div class="container">
        <div class="row">

            @php $section4 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
            @if($section4)
            <div class="col-12 col-md-6 space-bottom-100">
                <div class="handling-grid-boxs mb-0">
                    <div class="title">
                        <h2>
                            {{ $section4->{config('app.locale').'_title'} }}
                        </h2>
                    </div>
                    <div class="discription">
                        <p> {!! $section4->{config('app.locale').'_desc'} !!}</p>
                    </div>
                    <div class="download_btn">
                        <a href="{{$section4->image}}" target="_blank" class="custom-btn">
                            <div class="icon-pdf">
                                <img class="img-fluid" src="{{asset('fixifx/images/icon-pdf.svg')}}" alt="">
                            </div>
                            <span>
                                {{__('message.downloadpdf')}}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            @php $section5 = $section->where('section_no', 5)->where('status', 1)->first() @endphp
            @if($section5)
            <div class="col-12 col-md-6 space-bottom-100">
                <div class="handling-grid-boxs mb-0">
                    <div class="title">
                        <h2>
                            {{ $section5->{config('app.locale').'_title'} }}
                        </h2>
                    </div>
                    <div class="discription">
                        <p>{!! $section5->{config('app.locale').'_desc'} !!}</p>
                    </div>
                    <div class="find-more">
                        <a href="{{ route('page', [config('app.locale'), 'mt5-client-desktop']) }}" class="custom-btn fill-btn-1 text-white">
                            {{__('message.findmore')}}
                        </a>
                    </div>
                </div>
            </div>
            @endif
        </div>

        @php $section6 = $section->where('section_no', 6)->where('status', 1)->first() @endphp
        @if($section6)
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <div class="imgbox">
                    <img class="img-fluid" src="{{$section6 && $section6->image ? $section6->image : asset('fixifx/images/faxpro.svg')}}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="leftProudly_box">
                    <div class="title">
                        <h2>
                            {{ $section6->{config('app.locale').'_title'} }}
                        </h2>
                    </div>
                    <div class="discription">
                        <p> {!! $section6->{config('app.locale').'_desc'} !!}</p>
                    </div>

                    <!-- vps service form -->
                    <div class="fxpro-form vps-service-fxpro">
                        <form id="vps_enquiry" method="post">
                            @csrf

                            <div class="grid-outer row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group position-relative">
                                        <div class="input-icon-new"><img class="" src="{{asset('fixifx/images/form-icon/user.svg')}}" alt="user"></div>
                                        <input type="text" placeholder="{{__('message.first_name')}}" class="form-control" name="fname" id="fname">
                                        @if($errors->has('fname'))
                                        <span style="color: red;">{{ $errors->first('fname') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group position-relative">
                                        <div class="input-icon-new"><img class="" src="{{asset('fixifx/images/form-icon/user.svg')}}" alt="user"></div>
                                        <input type="text" placeholder="{{__('message.last_name')}}" class="form-control" name="lname" id="lname">
                                        @if($errors->has('lname'))
                                        <span style="color: red;">{{ $errors->first('lname') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group position-relative">
                                        <div class="input-icon-new"><img class="" src="{{asset('fixifx/images/form-icon/email.svg')}}" alt="email"></div>
                                        <input type="email" placeholder="{{__('message.enter_email')}}" class="form-control" name="email" id="email">
                                        @if($errors->has('email'))
                                        <span style="color: red;">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group position-relative">
                                        <input type="number" placeholder="{{__('message.phone')}}" name="phone_number" id="phone2">
                                    </div>
                                </div>
                            </div>
                            <div class="form-footer button-group">
                                <div class="submit-form">
                                    <input type="submit" class="custom-btn fill-btn-1" value="{{__('message.send_request')}}">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        $('#vps_enquiry').validate({
            errorClass: 'invalid-feedback animated fadeInDown error',
            errorElement: 'div',
            rules: {
                'fname': {
                    required: true,
                    minlength: 3,
                    maxlength: 20,
                    // pattern: /^[A-Za-z\s]+$/,
                },
                'lname': {
                    required: true,
                    minlength: 3,
                    maxlength: 40
                },
                'email': {
                    required: true,
                    email: true,
                },
                'phone_number': {
                    required: true,
                },
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
                $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                $(element).parents(".error").removeClass(errorClass).addClass(validClass);
            },
            submitHandler: function(form) {
                $('.error').html("");
                var formData = new FormData(form);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('vps_enquiry') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {

                        if (data) {
                            success = msg = "";
                            if ('{{config("app.locale")}}' == 'en') {
                                msg = 'Request sent successfully';
                                success = 'Success';
                            } else {
                                msg = 'お問い合わせは正常に送信されました';
                                success = '成功';
                            }
                            swal(
                                success,
                                msg,
                                'success'
                            );
                            $('#vps_enquiry').trigger("reset");

                        }
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors.errors, function(key, value) {
                            $('#vps_enquiry').find('input[name=' + key + ']').after('<span class="error" style="color: red;">' + value + '</span>');
                        });

                    }
                });
            },
        });
    });
</script>
@endsection