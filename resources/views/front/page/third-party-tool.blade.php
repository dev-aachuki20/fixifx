@php
$keywords_jp = 'FX、サポート、サービス、vps サービス';
$description_jp = 'FiXi FX（フィクシー）が提供するcTrader(Android版)に関するページです。';
@endphp

@extends('front.layouts.base')

@section('content')

<!-- Hero section  -->
@php $section1 = $section->where('section_no', 1)->where('status', 1)->first() @endphp
@if($section1)
<section class="tailor-environment whsection-text padding-tb-180 d-flex flex-wrap align-items-center pbottom-50" style="background-image: url({{$section1 && $section1->image ? $section1->image : asset('fixifx/images/tailor-environment-bg.png')}});background-size: cover;
    background-position: bottom;">
    <div class="container">
        <div class="tailor-wrapper-herobox">
            <div class="row">
                <div class="col-12 col-xl-6 col-lg-6 col-md-8 col-sm-12">
                    <div class="other-banner-text">
                        <h1>{{ $section1->{config('app.locale').'_title'} }}</h1>
                        <div class="section-head mbd-20">
                            <div class="discription">
                                <p>{!! $section1->{config('app.locale').'_desc'} !!}</p>
                            </div>
                        </div>
                        <div class="openAi-btn d-flex align-items-center justify-content-start">
                            <a href="{{ getSettingValue('live_link') }}" class="custom-btn fill-btn-1">{{__('message.open_account_btn')}}</a>
                            <a href="{{ route('page', [config('app.locale'), 'contact-us']) }}" class="custom-btn fill-btn">{{__('message.talk_to_our_specialist_btn')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end  -->
    </div>
</section>
@endif
<!-- end  -->

<!-- Through FiXi Account -->
@php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
@if($section2)
<section class="connect-account-wrapper  padding-tb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-sm-12">
                <div class="section-head text-center mbd-20">
                    <h2 class="max-w-427">{{ $section2->{config('app.locale').'_title'} }}</h2>
                    <div class="discription">
                        <p>{!! $section2->{config('app.locale').'_desc'} !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- subsection -->
        <div class="connect-gridBox">
            <div class="row justify-content-center">
                @foreach($section2->subSection as $sub_sec_index => $sub_sec)
                @if($sub_sec->status == 1)
                <div class="col-12 col-md-6 col-sm-6 col-lg-4">
                    <div class="gridBox-inner">
                        <div class="logobox">
                            <img class="img-fluid" src="{{$sub_sec && $sub_sec->image ? $sub_sec->image : asset('fixifx/images/connect-account-logo01.svg')}}" alt="">
                        </div>
                        <div class="title">
                            <h5>
                                {{ $sub_sec->{config('app.locale').'_title'} }}
                            </h5>
                        </div>
                        <div class="discription">
                            <p>{!! $sub_sec->{config('app.locale').'_desc'} !!}</p>
                        </div>
                        <div class="instrumentsbox">
                            {!! $sub_sec->{config('app.locale').'_short_text'} !!}
                        </div>
                        <div class="learcmore-box">
                            @if(config('app.locale') == 'en')
                            <a href="{{isset($sub_sec->en_link) ? $sub_sec->en_link : '#'}}" target="_blank" class="custom-btn fill-btn">{{__('message.learn_more_btn')}}</a>
                            @else
                            <a href="{{isset($sub_sec->ja_link) ? $sub_sec->ja_link : '#'}}" target="_blank" class="custom-btn fill-btn">{{__('message.learn_more_btn')}}</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <!-- endsubsection -->
    </div>
</section>
@endif

<!-- End Through FiXi Account -->

<!-- Fixi’s OpenAPI  explore-->
@include('front.layouts.partials.explore')
<!-- end  -->

<!-- faq-sub-page  -->
@php $faqs = App\Models\Faq::where('page_id', 51)->get() @endphp
@if($faqs->count() > 0)
@php $section4 = $section->where('section_no', 4)->where('status', 1)->first() @endphp
@if($section4)
<section class="faq-sub-page space-bottom-100 third-par-faqinner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-xl-7 align-items-center justify-content-center text-center pb-md-5">
                <div class="title">
                    <h2>
                        {{ $section4->{config('app.locale').'_title'} }}
                    </h2>
                </div>
                <div class="description">
                    <p>
                        {!! $section4->{config('app.locale').'_desc'} !!}</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="faqTab-content p-0">

                    <div class="accordion faqAccordion" id="accordionExample">
                        @foreach($faqs as $index => $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button {{ $loop->iteration != 1 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$index}}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                    <img class="img-fluid" src="{{asset('fixifx/images/faq-q.svg')}}" alt="">
                                    {{ $faq->{config('app.locale').'_question'} }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="description">
                                        {!! $faq->{config('app.locale').'_answer'} !!}
                                    </div>
                                    @include('front.layouts.partials.social_share')
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endif
@endif



<!-- <section class="faq-sub-page padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-xl-7 align-items-center justify-content-center text-center pb-5">
                <div class="title">
                    <h2>
                        Frequently asked questions
                    </h2>
                </div>
                <div class="description">
                    <p>
                        We support clients in more than 180 countries from offices in major financial hubs. Find contact details for
                        all our offices below.</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="faqTab-content p-0">

                    <div class="accordion faqAccordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <img class="img-fluid" src="images/faq-q.svg" alt="">
                                    How do I join Fixi Rewards?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="description">
                                        <p>
                                            FiXi Group Limited, the operator of FiXi, is an international online forex company founded by a team of Japanese and British executives who worked as forex traders in the Hong Kong offices of major U.S. financial institutions.
                                        </p>
                                        <p>
                                            FiXi Group Limited is the holding company of Prex Markets (Bahamas) Limited, Prex Markets Limited, Prex Markets Securities Co., Ltd., and PrexMarkets Financial Markets Co. PrexMarkets Financial Markets. FiXi Group Limited is the holding company of Prex Markets (Bahamas) Limited, Prex Markets Limited, Prex Markets Securities Co., Ltd., and PrexMarkets Financial Markets Co. PrexMarkets Financial Markets.
                                        </p>
                                    </div>
                                    <div class="socialBox_ChatBox_wrap ">
                                        <div class="socialMedia-box">
                                            <ul>
                                                <li class="socialMedia-box-link shrae_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.3242 9.64013C10.4635 9.64013 9.70512 10.0635 9.22874 10.7074L5.11013 8.59842C5.17851 8.36535 5.22656 8.12379 5.22656 7.86891C5.22656 7.5232 5.15568 7.19454 5.03324 6.89224L9.34355 4.29847C9.82324 4.86143 10.5283 5.22659 11.3242 5.22659C12.7653 5.22659 13.9375 4.05436 13.9375 2.61331C13.9375 1.17226 12.7653 3.05176e-05 11.3242 3.05176e-05C9.88317 3.05176e-05 8.71094 1.17226 8.71094 2.61331C8.71094 2.9454 8.77932 3.26042 8.89276 3.55287L4.56961 6.15425C4.09034 5.60802 3.39544 5.25563 2.61328 5.25563C1.17223 5.25563 0 6.42786 0 7.86891C0 9.30996 1.17223 10.4822 2.61328 10.4822C3.48815 10.4822 4.25939 10.0464 4.73396 9.38444L8.83902 11.4865C8.76341 11.7306 8.71094 11.9848 8.71094 12.2534C8.71094 13.6945 9.88317 14.8667 11.3242 14.8667C12.7653 14.8667 13.9375 13.6945 13.9375 12.2534C13.9375 10.8124 12.7653 9.64013 11.3242 9.64013Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link whatsapp_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0.351562 17.6872L1.575 13.2259C0.819141 11.9216 0.421875 10.438 0.421875 8.92275C0.425391 4.17314 4.28906 0.312988 9.03516 0.312988C11.3379 0.312988 13.5035 1.20947 15.1277 2.83721C16.7555 4.46494 17.652 6.62705 17.6484 8.92979C17.6449 13.6759 13.7812 17.5396 9.03516 17.5396H9.03164C7.59023 17.5396 6.17344 17.1774 4.91484 16.4919L0.351562 17.6872Z" fill="url(#paint0_linear_197_2740)"></path>
                                                            <path d="M0.0385742 18L1.3042 13.377C0.52373 12.027 0.115918 10.4906 0.115918 8.91914C0.115918 4.00078 4.12021 0 9.03857 0C11.4257 0 13.6651 0.931641 15.3491 2.61563C17.0331 4.30312 17.9612 6.54258 17.9612 8.92617C17.9577 13.8445 13.9569 17.8453 9.03857 17.8453H9.03506C7.54092 17.8453 6.0749 17.4691 4.77061 16.759L0.0385742 18ZM4.98857 15.1453L5.25928 15.307C6.39834 15.982 7.70264 16.3406 9.03506 16.3406H9.03857C13.1272 16.3406 16.453 13.0148 16.453 8.92617C16.453 6.94687 15.6831 5.08359 14.2839 3.68086C12.8847 2.27812 11.0214 1.5082 9.04209 1.5082C4.9499 1.5082 1.62412 4.83398 1.62412 8.92266C1.62412 10.3219 2.01436 11.6859 2.75615 12.8672L2.93193 13.1484L2.18311 15.8836L4.98857 15.1453Z" fill="url(#paint1_linear_197_2740)"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.80625 5.18896C6.6375 4.81631 6.46172 4.80928 6.30352 4.80225C6.17344 4.79521 6.02578 4.79873 5.87461 4.79873C5.72695 4.79873 5.48437 4.85498 5.28047 5.07646C5.07656 5.29795 4.5 5.83936 4.5 6.93623C4.5 8.03311 5.29805 9.09482 5.41055 9.24248C5.52305 9.39014 6.95391 11.714 9.21797 12.6069C11.1023 13.3487 11.4855 13.2011 11.8934 13.1659C12.3012 13.1308 13.2117 12.628 13.398 12.1077C13.5844 11.5874 13.5844 11.1409 13.5281 11.0495C13.4719 10.9581 13.3242 10.9019 13.0992 10.7894C12.8777 10.6769 11.7809 10.139 11.577 10.0651C11.373 9.99131 11.2254 9.95264 11.0742 10.1776C10.9266 10.3991 10.4977 10.9019 10.3676 11.0495C10.2375 11.1972 10.1074 11.2183 9.88594 11.1058C9.66445 10.9933 8.94375 10.7577 8.09297 9.99834C7.42852 9.40771 6.98203 8.67646 6.85195 8.45498C6.72187 8.2335 6.83789 8.11045 6.95039 8.00146C7.04883 7.90303 7.17188 7.74131 7.28437 7.61123C7.39687 7.48115 7.43203 7.38975 7.50586 7.23857C7.57969 7.09092 7.54453 6.96084 7.48828 6.84834C7.43906 6.73232 7.00664 5.63193 6.80625 5.18896Z" fill="white"></path>
                                                            <defs>
                                                                <linearGradient id="paint0_linear_197_2740" x1="8.99993" y1="17.6886" x2="8.99993" y2="0.311793" gradientUnits="userSpaceOnUse">
                                                                    <stop stop-color="#20B038"></stop>
                                                                    <stop offset="1" stop-color="#60D66A"></stop>
                                                                </linearGradient>
                                                                <linearGradient id="paint1_linear_197_2740" x1="8.9999" y1="18" x2="8.9999" y2="0" gradientUnits="userSpaceOnUse">
                                                                    <stop stop-color="#F9F9F9"></stop>
                                                                    <stop offset="1" stop-color="white"></stop>
                                                                </linearGradient>
                                                            </defs>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link telegram_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.35659 8.89745L6.08862 12.6666C6.47202 12.6666 6.63807 12.5019 6.83719 12.3042L8.63472 10.5863L12.3594 13.314C13.0425 13.6947 13.5237 13.4942 13.708 12.6855L16.1529 1.22945L16.1535 1.22877C16.3702 0.218974 15.7884 -0.175901 15.1228 0.0718237L0.75207 5.57375C-0.228705 5.95445 -0.213855 6.5012 0.585345 6.74892L4.25937 7.8917L12.7934 2.55177C13.195 2.28582 13.5602 2.43297 13.2598 2.69892L6.35659 8.89745Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link linkedin_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.9959 16L15.9999 15.9993V10.1312C15.9999 7.26055 15.3819 5.04919 12.0259 5.04919C10.4125 5.04919 9.32986 5.93454 8.88785 6.77388H8.84119V5.3172H5.65918V15.9993H8.97252V10.7099C8.97252 9.31723 9.23652 7.97056 10.9612 7.97056C12.6605 7.97056 12.6859 9.5599 12.6859 10.7992V16H15.9959Z" fill="white"></path>
                                                            <path d="M0.26416 5.31848H3.5815V16.0006H0.26416V5.31848Z" fill="white"></path>
                                                            <path d="M1.92134 0C0.860669 0 0 0.860675 0 1.92135C0 2.98203 0.860669 3.8607 1.92134 3.8607C2.98201 3.8607 3.84268 2.98203 3.84268 1.92135C3.84201 0.860675 2.98134 0 1.92134 0Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link twitter_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16.2308 1.5612C15.6272 1.82596 14.984 2.00146 14.3135 2.08667C15.0033 1.67481 15.5298 1.02761 15.7773 0.247519C15.1342 0.630971 14.4241 0.901822 13.6673 1.05297C13.0566 0.402726 12.1863 0 11.2368 0C9.39457 0 7.91149 1.49526 7.91149 3.32832C7.91149 3.59207 7.9338 3.84568 7.98858 4.08711C5.22225 3.95219 2.77445 2.62634 1.13007 0.606625C0.842986 1.10471 0.674591 1.67481 0.674591 2.28854C0.674591 3.44092 1.26803 4.46245 2.15261 5.05386C1.618 5.04371 1.09355 4.8885 0.649231 4.64403C0.649231 4.65417 0.649231 4.66736 0.649231 4.68055C0.649231 6.29754 1.80263 7.64064 3.31513 7.95003C3.04428 8.02409 2.74909 8.05959 2.44273 8.05959C2.2297 8.05959 2.01464 8.04742 1.81277 8.00278C2.2439 9.32052 3.4673 10.2893 4.92198 10.3207C3.78989 11.2063 2.35245 11.7399 0.796322 11.7399C0.523442 11.7399 0.261721 11.7277 0 11.6943C1.47396 12.6448 3.22079 13.1875 5.10458 13.1875C11.2276 13.1875 14.5752 8.11539 14.5752 3.71888C14.5752 3.57178 14.5702 3.42976 14.5631 3.28876C15.2234 2.8201 15.7783 2.23477 16.2308 1.5612Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link facebook_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M2.67746 9.03332C2.60776 9.03332 1.14572 9.03372 0.471415 9.03312C0.124273 9.03292 0.000420254 8.92052 0.000420254 8.60572C-2.36628e-05 7.79712 -0.000245621 6.98852 0.000420254 6.17992C0.000642212 5.86912 0.131598 5.75052 0.474301 5.75032C1.14861 5.74992 2.60266 5.75012 2.67746 5.75012C2.67746 5.69472 2.67724 4.52732 2.67746 3.98972C2.6779 3.19492 2.83527 2.43412 3.2834 1.73752C3.74219 1.02452 4.40984 0.536123 5.26549 0.253723C5.8135 0.0727233 6.38238 0.000523409 6.96391 0.00012341C7.69149 -0.00027659 8.41907 0.000323403 9.14687 0.0015234C9.45961 0.0019234 9.59834 0.126523 9.599 0.410323C9.60033 1.17092 9.60033 1.93152 9.599 2.69192C9.59856 2.97872 9.4656 3.09392 9.14576 3.09712C8.54936 3.10292 7.95252 3.09932 7.35678 3.12092C6.75505 3.12092 6.43854 3.38572 6.43854 3.94692C6.42411 4.54052 6.43255 5.13472 6.43255 5.74992C6.48892 5.74992 8.20133 5.74972 9.00171 5.74992C9.36528 5.74992 9.48958 5.86252 9.48958 6.19192C9.48958 6.99612 9.48935 7.80052 9.48869 8.60472C9.48847 8.92932 9.37171 9.03292 9.00593 9.03312C8.20555 9.03352 6.4998 9.03332 6.42522 9.03332V15.5423C6.42522 15.8893 6.30403 15.9999 5.92404 15.9999C4.99759 15.9999 4.07091 16.0001 3.14446 15.9999C2.80863 15.9999 2.67768 15.8823 2.67768 15.5797C2.67746 13.4599 2.67746 9.10772 2.67746 9.03332Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <img class="img-fluid" src="images/faq-q.svg" alt="">
                                    How do I upgrade my account tier?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="description">
                                        <p>
                                            FiXi Group Limited, the operator of FiXi, is an international online forex company founded by a team of Japanese and British executives who worked as forex traders in the Hong Kong offices of major U.S. financial institutions.
                                        </p>
                                        <p>
                                            FiXi Group Limited is the holding company of Prex Markets (Bahamas) Limited, Prex Markets Limited, Prex Markets Securities Co., Ltd., and PrexMarkets Financial Markets Co. PrexMarkets Financial Markets. FiXi Group Limited is the holding company of Prex Markets (Bahamas) Limited, Prex Markets Limited, Prex Markets Securities Co., Ltd., and PrexMarkets Financial Markets Co. PrexMarkets Financial Markets.
                                        </p>
                                    </div>
                                    <div class="socialBox_ChatBox_wrap ">
                                        <div class="socialMedia-box">
                                            <ul>
                                                <li class="socialMedia-box-link shrae_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.3242 9.64013C10.4635 9.64013 9.70512 10.0635 9.22874 10.7074L5.11013 8.59842C5.17851 8.36535 5.22656 8.12379 5.22656 7.86891C5.22656 7.5232 5.15568 7.19454 5.03324 6.89224L9.34355 4.29847C9.82324 4.86143 10.5283 5.22659 11.3242 5.22659C12.7653 5.22659 13.9375 4.05436 13.9375 2.61331C13.9375 1.17226 12.7653 3.05176e-05 11.3242 3.05176e-05C9.88317 3.05176e-05 8.71094 1.17226 8.71094 2.61331C8.71094 2.9454 8.77932 3.26042 8.89276 3.55287L4.56961 6.15425C4.09034 5.60802 3.39544 5.25563 2.61328 5.25563C1.17223 5.25563 0 6.42786 0 7.86891C0 9.30996 1.17223 10.4822 2.61328 10.4822C3.48815 10.4822 4.25939 10.0464 4.73396 9.38444L8.83902 11.4865C8.76341 11.7306 8.71094 11.9848 8.71094 12.2534C8.71094 13.6945 9.88317 14.8667 11.3242 14.8667C12.7653 14.8667 13.9375 13.6945 13.9375 12.2534C13.9375 10.8124 12.7653 9.64013 11.3242 9.64013Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link whatsapp_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0.351562 17.6872L1.575 13.2259C0.819141 11.9216 0.421875 10.438 0.421875 8.92275C0.425391 4.17314 4.28906 0.312988 9.03516 0.312988C11.3379 0.312988 13.5035 1.20947 15.1277 2.83721C16.7555 4.46494 17.652 6.62705 17.6484 8.92979C17.6449 13.6759 13.7812 17.5396 9.03516 17.5396H9.03164C7.59023 17.5396 6.17344 17.1774 4.91484 16.4919L0.351562 17.6872Z" fill="url(#paint0_linear_197_2740)"></path>
                                                            <path d="M0.0385742 18L1.3042 13.377C0.52373 12.027 0.115918 10.4906 0.115918 8.91914C0.115918 4.00078 4.12021 0 9.03857 0C11.4257 0 13.6651 0.931641 15.3491 2.61563C17.0331 4.30312 17.9612 6.54258 17.9612 8.92617C17.9577 13.8445 13.9569 17.8453 9.03857 17.8453H9.03506C7.54092 17.8453 6.0749 17.4691 4.77061 16.759L0.0385742 18ZM4.98857 15.1453L5.25928 15.307C6.39834 15.982 7.70264 16.3406 9.03506 16.3406H9.03857C13.1272 16.3406 16.453 13.0148 16.453 8.92617C16.453 6.94687 15.6831 5.08359 14.2839 3.68086C12.8847 2.27812 11.0214 1.5082 9.04209 1.5082C4.9499 1.5082 1.62412 4.83398 1.62412 8.92266C1.62412 10.3219 2.01436 11.6859 2.75615 12.8672L2.93193 13.1484L2.18311 15.8836L4.98857 15.1453Z" fill="url(#paint1_linear_197_2740)"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.80625 5.18896C6.6375 4.81631 6.46172 4.80928 6.30352 4.80225C6.17344 4.79521 6.02578 4.79873 5.87461 4.79873C5.72695 4.79873 5.48437 4.85498 5.28047 5.07646C5.07656 5.29795 4.5 5.83936 4.5 6.93623C4.5 8.03311 5.29805 9.09482 5.41055 9.24248C5.52305 9.39014 6.95391 11.714 9.21797 12.6069C11.1023 13.3487 11.4855 13.2011 11.8934 13.1659C12.3012 13.1308 13.2117 12.628 13.398 12.1077C13.5844 11.5874 13.5844 11.1409 13.5281 11.0495C13.4719 10.9581 13.3242 10.9019 13.0992 10.7894C12.8777 10.6769 11.7809 10.139 11.577 10.0651C11.373 9.99131 11.2254 9.95264 11.0742 10.1776C10.9266 10.3991 10.4977 10.9019 10.3676 11.0495C10.2375 11.1972 10.1074 11.2183 9.88594 11.1058C9.66445 10.9933 8.94375 10.7577 8.09297 9.99834C7.42852 9.40771 6.98203 8.67646 6.85195 8.45498C6.72187 8.2335 6.83789 8.11045 6.95039 8.00146C7.04883 7.90303 7.17188 7.74131 7.28437 7.61123C7.39687 7.48115 7.43203 7.38975 7.50586 7.23857C7.57969 7.09092 7.54453 6.96084 7.48828 6.84834C7.43906 6.73232 7.00664 5.63193 6.80625 5.18896Z" fill="white"></path>
                                                            <defs>
                                                                <linearGradient id="paint0_linear_197_2740" x1="8.99993" y1="17.6886" x2="8.99993" y2="0.311793" gradientUnits="userSpaceOnUse">
                                                                    <stop stop-color="#20B038"></stop>
                                                                    <stop offset="1" stop-color="#60D66A"></stop>
                                                                </linearGradient>
                                                                <linearGradient id="paint1_linear_197_2740" x1="8.9999" y1="18" x2="8.9999" y2="0" gradientUnits="userSpaceOnUse">
                                                                    <stop stop-color="#F9F9F9"></stop>
                                                                    <stop offset="1" stop-color="white"></stop>
                                                                </linearGradient>
                                                            </defs>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link telegram_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.35659 8.89745L6.08862 12.6666C6.47202 12.6666 6.63807 12.5019 6.83719 12.3042L8.63472 10.5863L12.3594 13.314C13.0425 13.6947 13.5237 13.4942 13.708 12.6855L16.1529 1.22945L16.1535 1.22877C16.3702 0.218974 15.7884 -0.175901 15.1228 0.0718237L0.75207 5.57375C-0.228705 5.95445 -0.213855 6.5012 0.585345 6.74892L4.25937 7.8917L12.7934 2.55177C13.195 2.28582 13.5602 2.43297 13.2598 2.69892L6.35659 8.89745Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link linkedin_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.9959 16L15.9999 15.9993V10.1312C15.9999 7.26055 15.3819 5.04919 12.0259 5.04919C10.4125 5.04919 9.32986 5.93454 8.88785 6.77388H8.84119V5.3172H5.65918V15.9993H8.97252V10.7099C8.97252 9.31723 9.23652 7.97056 10.9612 7.97056C12.6605 7.97056 12.6859 9.5599 12.6859 10.7992V16H15.9959Z" fill="white"></path>
                                                            <path d="M0.26416 5.31848H3.5815V16.0006H0.26416V5.31848Z" fill="white"></path>
                                                            <path d="M1.92134 0C0.860669 0 0 0.860675 0 1.92135C0 2.98203 0.860669 3.8607 1.92134 3.8607C2.98201 3.8607 3.84268 2.98203 3.84268 1.92135C3.84201 0.860675 2.98134 0 1.92134 0Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link twitter_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16.2308 1.5612C15.6272 1.82596 14.984 2.00146 14.3135 2.08667C15.0033 1.67481 15.5298 1.02761 15.7773 0.247519C15.1342 0.630971 14.4241 0.901822 13.6673 1.05297C13.0566 0.402726 12.1863 0 11.2368 0C9.39457 0 7.91149 1.49526 7.91149 3.32832C7.91149 3.59207 7.9338 3.84568 7.98858 4.08711C5.22225 3.95219 2.77445 2.62634 1.13007 0.606625C0.842986 1.10471 0.674591 1.67481 0.674591 2.28854C0.674591 3.44092 1.26803 4.46245 2.15261 5.05386C1.618 5.04371 1.09355 4.8885 0.649231 4.64403C0.649231 4.65417 0.649231 4.66736 0.649231 4.68055C0.649231 6.29754 1.80263 7.64064 3.31513 7.95003C3.04428 8.02409 2.74909 8.05959 2.44273 8.05959C2.2297 8.05959 2.01464 8.04742 1.81277 8.00278C2.2439 9.32052 3.4673 10.2893 4.92198 10.3207C3.78989 11.2063 2.35245 11.7399 0.796322 11.7399C0.523442 11.7399 0.261721 11.7277 0 11.6943C1.47396 12.6448 3.22079 13.1875 5.10458 13.1875C11.2276 13.1875 14.5752 8.11539 14.5752 3.71888C14.5752 3.57178 14.5702 3.42976 14.5631 3.28876C15.2234 2.8201 15.7783 2.23477 16.2308 1.5612Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link facebook_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M2.67746 9.03332C2.60776 9.03332 1.14572 9.03372 0.471415 9.03312C0.124273 9.03292 0.000420254 8.92052 0.000420254 8.60572C-2.36628e-05 7.79712 -0.000245621 6.98852 0.000420254 6.17992C0.000642212 5.86912 0.131598 5.75052 0.474301 5.75032C1.14861 5.74992 2.60266 5.75012 2.67746 5.75012C2.67746 5.69472 2.67724 4.52732 2.67746 3.98972C2.6779 3.19492 2.83527 2.43412 3.2834 1.73752C3.74219 1.02452 4.40984 0.536123 5.26549 0.253723C5.8135 0.0727233 6.38238 0.000523409 6.96391 0.00012341C7.69149 -0.00027659 8.41907 0.000323403 9.14687 0.0015234C9.45961 0.0019234 9.59834 0.126523 9.599 0.410323C9.60033 1.17092 9.60033 1.93152 9.599 2.69192C9.59856 2.97872 9.4656 3.09392 9.14576 3.09712C8.54936 3.10292 7.95252 3.09932 7.35678 3.12092C6.75505 3.12092 6.43854 3.38572 6.43854 3.94692C6.42411 4.54052 6.43255 5.13472 6.43255 5.74992C6.48892 5.74992 8.20133 5.74972 9.00171 5.74992C9.36528 5.74992 9.48958 5.86252 9.48958 6.19192C9.48958 6.99612 9.48935 7.80052 9.48869 8.60472C9.48847 8.92932 9.37171 9.03292 9.00593 9.03312C8.20555 9.03352 6.4998 9.03332 6.42522 9.03332V15.5423C6.42522 15.8893 6.30403 15.9999 5.92404 15.9999C4.99759 15.9999 4.07091 16.0001 3.14446 15.9999C2.80863 15.9999 2.67768 15.8823 2.67768 15.5797C2.67746 13.4599 2.67746 9.10772 2.67746 9.03332Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <img class="img-fluid" src="images/faq-q.svg" alt="">
                                    How long will I stay in my account tier?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="description">
                                        <p>
                                            FiXi Group Limited, the operator of FiXi, is an international online forex company founded by a team of Japanese and British executives who worked as forex traders in the Hong Kong offices of major U.S. financial institutions.
                                        </p>
                                        <p>
                                            FiXi Group Limited is the holding company of Prex Markets (Bahamas) Limited, Prex Markets Limited, Prex Markets Securities Co., Ltd., and PrexMarkets Financial Markets Co. PrexMarkets Financial Markets. FiXi Group Limited is the holding company of Prex Markets (Bahamas) Limited, Prex Markets Limited, Prex Markets Securities Co., Ltd., and PrexMarkets Financial Markets Co. PrexMarkets Financial Markets.
                                        </p>
                                    </div>
                                    <div class="socialBox_ChatBox_wrap ">
                                        <div class="socialMedia-box">
                                            <ul>
                                                <li class="socialMedia-box-link shrae_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.3242 9.64013C10.4635 9.64013 9.70512 10.0635 9.22874 10.7074L5.11013 8.59842C5.17851 8.36535 5.22656 8.12379 5.22656 7.86891C5.22656 7.5232 5.15568 7.19454 5.03324 6.89224L9.34355 4.29847C9.82324 4.86143 10.5283 5.22659 11.3242 5.22659C12.7653 5.22659 13.9375 4.05436 13.9375 2.61331C13.9375 1.17226 12.7653 3.05176e-05 11.3242 3.05176e-05C9.88317 3.05176e-05 8.71094 1.17226 8.71094 2.61331C8.71094 2.9454 8.77932 3.26042 8.89276 3.55287L4.56961 6.15425C4.09034 5.60802 3.39544 5.25563 2.61328 5.25563C1.17223 5.25563 0 6.42786 0 7.86891C0 9.30996 1.17223 10.4822 2.61328 10.4822C3.48815 10.4822 4.25939 10.0464 4.73396 9.38444L8.83902 11.4865C8.76341 11.7306 8.71094 11.9848 8.71094 12.2534C8.71094 13.6945 9.88317 14.8667 11.3242 14.8667C12.7653 14.8667 13.9375 13.6945 13.9375 12.2534C13.9375 10.8124 12.7653 9.64013 11.3242 9.64013Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link whatsapp_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0.351562 17.6872L1.575 13.2259C0.819141 11.9216 0.421875 10.438 0.421875 8.92275C0.425391 4.17314 4.28906 0.312988 9.03516 0.312988C11.3379 0.312988 13.5035 1.20947 15.1277 2.83721C16.7555 4.46494 17.652 6.62705 17.6484 8.92979C17.6449 13.6759 13.7812 17.5396 9.03516 17.5396H9.03164C7.59023 17.5396 6.17344 17.1774 4.91484 16.4919L0.351562 17.6872Z" fill="url(#paint0_linear_197_2740)"></path>
                                                            <path d="M0.0385742 18L1.3042 13.377C0.52373 12.027 0.115918 10.4906 0.115918 8.91914C0.115918 4.00078 4.12021 0 9.03857 0C11.4257 0 13.6651 0.931641 15.3491 2.61563C17.0331 4.30312 17.9612 6.54258 17.9612 8.92617C17.9577 13.8445 13.9569 17.8453 9.03857 17.8453H9.03506C7.54092 17.8453 6.0749 17.4691 4.77061 16.759L0.0385742 18ZM4.98857 15.1453L5.25928 15.307C6.39834 15.982 7.70264 16.3406 9.03506 16.3406H9.03857C13.1272 16.3406 16.453 13.0148 16.453 8.92617C16.453 6.94687 15.6831 5.08359 14.2839 3.68086C12.8847 2.27812 11.0214 1.5082 9.04209 1.5082C4.9499 1.5082 1.62412 4.83398 1.62412 8.92266C1.62412 10.3219 2.01436 11.6859 2.75615 12.8672L2.93193 13.1484L2.18311 15.8836L4.98857 15.1453Z" fill="url(#paint1_linear_197_2740)"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.80625 5.18896C6.6375 4.81631 6.46172 4.80928 6.30352 4.80225C6.17344 4.79521 6.02578 4.79873 5.87461 4.79873C5.72695 4.79873 5.48437 4.85498 5.28047 5.07646C5.07656 5.29795 4.5 5.83936 4.5 6.93623C4.5 8.03311 5.29805 9.09482 5.41055 9.24248C5.52305 9.39014 6.95391 11.714 9.21797 12.6069C11.1023 13.3487 11.4855 13.2011 11.8934 13.1659C12.3012 13.1308 13.2117 12.628 13.398 12.1077C13.5844 11.5874 13.5844 11.1409 13.5281 11.0495C13.4719 10.9581 13.3242 10.9019 13.0992 10.7894C12.8777 10.6769 11.7809 10.139 11.577 10.0651C11.373 9.99131 11.2254 9.95264 11.0742 10.1776C10.9266 10.3991 10.4977 10.9019 10.3676 11.0495C10.2375 11.1972 10.1074 11.2183 9.88594 11.1058C9.66445 10.9933 8.94375 10.7577 8.09297 9.99834C7.42852 9.40771 6.98203 8.67646 6.85195 8.45498C6.72187 8.2335 6.83789 8.11045 6.95039 8.00146C7.04883 7.90303 7.17188 7.74131 7.28437 7.61123C7.39687 7.48115 7.43203 7.38975 7.50586 7.23857C7.57969 7.09092 7.54453 6.96084 7.48828 6.84834C7.43906 6.73232 7.00664 5.63193 6.80625 5.18896Z" fill="white"></path>
                                                            <defs>
                                                                <linearGradient id="paint0_linear_197_2740" x1="8.99993" y1="17.6886" x2="8.99993" y2="0.311793" gradientUnits="userSpaceOnUse">
                                                                    <stop stop-color="#20B038"></stop>
                                                                    <stop offset="1" stop-color="#60D66A"></stop>
                                                                </linearGradient>
                                                                <linearGradient id="paint1_linear_197_2740" x1="8.9999" y1="18" x2="8.9999" y2="0" gradientUnits="userSpaceOnUse">
                                                                    <stop stop-color="#F9F9F9"></stop>
                                                                    <stop offset="1" stop-color="white"></stop>
                                                                </linearGradient>
                                                            </defs>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link telegram_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.35659 8.89745L6.08862 12.6666C6.47202 12.6666 6.63807 12.5019 6.83719 12.3042L8.63472 10.5863L12.3594 13.314C13.0425 13.6947 13.5237 13.4942 13.708 12.6855L16.1529 1.22945L16.1535 1.22877C16.3702 0.218974 15.7884 -0.175901 15.1228 0.0718237L0.75207 5.57375C-0.228705 5.95445 -0.213855 6.5012 0.585345 6.74892L4.25937 7.8917L12.7934 2.55177C13.195 2.28582 13.5602 2.43297 13.2598 2.69892L6.35659 8.89745Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link linkedin_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.9959 16L15.9999 15.9993V10.1312C15.9999 7.26055 15.3819 5.04919 12.0259 5.04919C10.4125 5.04919 9.32986 5.93454 8.88785 6.77388H8.84119V5.3172H5.65918V15.9993H8.97252V10.7099C8.97252 9.31723 9.23652 7.97056 10.9612 7.97056C12.6605 7.97056 12.6859 9.5599 12.6859 10.7992V16H15.9959Z" fill="white"></path>
                                                            <path d="M0.26416 5.31848H3.5815V16.0006H0.26416V5.31848Z" fill="white"></path>
                                                            <path d="M1.92134 0C0.860669 0 0 0.860675 0 1.92135C0 2.98203 0.860669 3.8607 1.92134 3.8607C2.98201 3.8607 3.84268 2.98203 3.84268 1.92135C3.84201 0.860675 2.98134 0 1.92134 0Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link twitter_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16.2308 1.5612C15.6272 1.82596 14.984 2.00146 14.3135 2.08667C15.0033 1.67481 15.5298 1.02761 15.7773 0.247519C15.1342 0.630971 14.4241 0.901822 13.6673 1.05297C13.0566 0.402726 12.1863 0 11.2368 0C9.39457 0 7.91149 1.49526 7.91149 3.32832C7.91149 3.59207 7.9338 3.84568 7.98858 4.08711C5.22225 3.95219 2.77445 2.62634 1.13007 0.606625C0.842986 1.10471 0.674591 1.67481 0.674591 2.28854C0.674591 3.44092 1.26803 4.46245 2.15261 5.05386C1.618 5.04371 1.09355 4.8885 0.649231 4.64403C0.649231 4.65417 0.649231 4.66736 0.649231 4.68055C0.649231 6.29754 1.80263 7.64064 3.31513 7.95003C3.04428 8.02409 2.74909 8.05959 2.44273 8.05959C2.2297 8.05959 2.01464 8.04742 1.81277 8.00278C2.2439 9.32052 3.4673 10.2893 4.92198 10.3207C3.78989 11.2063 2.35245 11.7399 0.796322 11.7399C0.523442 11.7399 0.261721 11.7277 0 11.6943C1.47396 12.6448 3.22079 13.1875 5.10458 13.1875C11.2276 13.1875 14.5752 8.11539 14.5752 3.71888C14.5752 3.57178 14.5702 3.42976 14.5631 3.28876C15.2234 2.8201 15.7783 2.23477 16.2308 1.5612Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link facebook_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M2.67746 9.03332C2.60776 9.03332 1.14572 9.03372 0.471415 9.03312C0.124273 9.03292 0.000420254 8.92052 0.000420254 8.60572C-2.36628e-05 7.79712 -0.000245621 6.98852 0.000420254 6.17992C0.000642212 5.86912 0.131598 5.75052 0.474301 5.75032C1.14861 5.74992 2.60266 5.75012 2.67746 5.75012C2.67746 5.69472 2.67724 4.52732 2.67746 3.98972C2.6779 3.19492 2.83527 2.43412 3.2834 1.73752C3.74219 1.02452 4.40984 0.536123 5.26549 0.253723C5.8135 0.0727233 6.38238 0.000523409 6.96391 0.00012341C7.69149 -0.00027659 8.41907 0.000323403 9.14687 0.0015234C9.45961 0.0019234 9.59834 0.126523 9.599 0.410323C9.60033 1.17092 9.60033 1.93152 9.599 2.69192C9.59856 2.97872 9.4656 3.09392 9.14576 3.09712C8.54936 3.10292 7.95252 3.09932 7.35678 3.12092C6.75505 3.12092 6.43854 3.38572 6.43854 3.94692C6.42411 4.54052 6.43255 5.13472 6.43255 5.74992C6.48892 5.74992 8.20133 5.74972 9.00171 5.74992C9.36528 5.74992 9.48958 5.86252 9.48958 6.19192C9.48958 6.99612 9.48935 7.80052 9.48869 8.60472C9.48847 8.92932 9.37171 9.03292 9.00593 9.03312C8.20555 9.03352 6.4998 9.03332 6.42522 9.03332V15.5423C6.42522 15.8893 6.30403 15.9999 5.92404 15.9999C4.99759 15.9999 4.07091 16.0001 3.14446 15.9999C2.80863 15.9999 2.67768 15.8823 2.67768 15.5797C2.67746 13.4599 2.67746 9.10772 2.67746 9.03332Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <img class="img-fluid" src="images/faq-q.svg" alt="">
                                    How will I earn points for account funding?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="description">
                                        <p>
                                            FiXi Group Limited, the operator of FiXi, is an international online forex company founded by a team of Japanese and British executives who worked as forex traders in the Hong Kong offices of major U.S. financial institutions.
                                        </p>
                                        <p>
                                            FiXi Group Limited is the holding company of Prex Markets (Bahamas) Limited, Prex Markets Limited, Prex Markets Securities Co., Ltd., and PrexMarkets Financial Markets Co. PrexMarkets Financial Markets. FiXi Group Limited is the holding company of Prex Markets (Bahamas) Limited, Prex Markets Limited, Prex Markets Securities Co., Ltd., and PrexMarkets Financial Markets Co. PrexMarkets Financial Markets.
                                        </p>
                                    </div>
                                    <div class="socialBox_ChatBox_wrap ">
                                        <div class="socialMedia-box">
                                            <ul>
                                                <li class="socialMedia-box-link shrae_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.3242 9.64013C10.4635 9.64013 9.70512 10.0635 9.22874 10.7074L5.11013 8.59842C5.17851 8.36535 5.22656 8.12379 5.22656 7.86891C5.22656 7.5232 5.15568 7.19454 5.03324 6.89224L9.34355 4.29847C9.82324 4.86143 10.5283 5.22659 11.3242 5.22659C12.7653 5.22659 13.9375 4.05436 13.9375 2.61331C13.9375 1.17226 12.7653 3.05176e-05 11.3242 3.05176e-05C9.88317 3.05176e-05 8.71094 1.17226 8.71094 2.61331C8.71094 2.9454 8.77932 3.26042 8.89276 3.55287L4.56961 6.15425C4.09034 5.60802 3.39544 5.25563 2.61328 5.25563C1.17223 5.25563 0 6.42786 0 7.86891C0 9.30996 1.17223 10.4822 2.61328 10.4822C3.48815 10.4822 4.25939 10.0464 4.73396 9.38444L8.83902 11.4865C8.76341 11.7306 8.71094 11.9848 8.71094 12.2534C8.71094 13.6945 9.88317 14.8667 11.3242 14.8667C12.7653 14.8667 13.9375 13.6945 13.9375 12.2534C13.9375 10.8124 12.7653 9.64013 11.3242 9.64013Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link whatsapp_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0.351562 17.6872L1.575 13.2259C0.819141 11.9216 0.421875 10.438 0.421875 8.92275C0.425391 4.17314 4.28906 0.312988 9.03516 0.312988C11.3379 0.312988 13.5035 1.20947 15.1277 2.83721C16.7555 4.46494 17.652 6.62705 17.6484 8.92979C17.6449 13.6759 13.7812 17.5396 9.03516 17.5396H9.03164C7.59023 17.5396 6.17344 17.1774 4.91484 16.4919L0.351562 17.6872Z" fill="url(#paint0_linear_197_2740)"></path>
                                                            <path d="M0.0385742 18L1.3042 13.377C0.52373 12.027 0.115918 10.4906 0.115918 8.91914C0.115918 4.00078 4.12021 0 9.03857 0C11.4257 0 13.6651 0.931641 15.3491 2.61563C17.0331 4.30312 17.9612 6.54258 17.9612 8.92617C17.9577 13.8445 13.9569 17.8453 9.03857 17.8453H9.03506C7.54092 17.8453 6.0749 17.4691 4.77061 16.759L0.0385742 18ZM4.98857 15.1453L5.25928 15.307C6.39834 15.982 7.70264 16.3406 9.03506 16.3406H9.03857C13.1272 16.3406 16.453 13.0148 16.453 8.92617C16.453 6.94687 15.6831 5.08359 14.2839 3.68086C12.8847 2.27812 11.0214 1.5082 9.04209 1.5082C4.9499 1.5082 1.62412 4.83398 1.62412 8.92266C1.62412 10.3219 2.01436 11.6859 2.75615 12.8672L2.93193 13.1484L2.18311 15.8836L4.98857 15.1453Z" fill="url(#paint1_linear_197_2740)"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.80625 5.18896C6.6375 4.81631 6.46172 4.80928 6.30352 4.80225C6.17344 4.79521 6.02578 4.79873 5.87461 4.79873C5.72695 4.79873 5.48437 4.85498 5.28047 5.07646C5.07656 5.29795 4.5 5.83936 4.5 6.93623C4.5 8.03311 5.29805 9.09482 5.41055 9.24248C5.52305 9.39014 6.95391 11.714 9.21797 12.6069C11.1023 13.3487 11.4855 13.2011 11.8934 13.1659C12.3012 13.1308 13.2117 12.628 13.398 12.1077C13.5844 11.5874 13.5844 11.1409 13.5281 11.0495C13.4719 10.9581 13.3242 10.9019 13.0992 10.7894C12.8777 10.6769 11.7809 10.139 11.577 10.0651C11.373 9.99131 11.2254 9.95264 11.0742 10.1776C10.9266 10.3991 10.4977 10.9019 10.3676 11.0495C10.2375 11.1972 10.1074 11.2183 9.88594 11.1058C9.66445 10.9933 8.94375 10.7577 8.09297 9.99834C7.42852 9.40771 6.98203 8.67646 6.85195 8.45498C6.72187 8.2335 6.83789 8.11045 6.95039 8.00146C7.04883 7.90303 7.17188 7.74131 7.28437 7.61123C7.39687 7.48115 7.43203 7.38975 7.50586 7.23857C7.57969 7.09092 7.54453 6.96084 7.48828 6.84834C7.43906 6.73232 7.00664 5.63193 6.80625 5.18896Z" fill="white"></path>
                                                            <defs>
                                                                <linearGradient id="paint0_linear_197_2740" x1="8.99993" y1="17.6886" x2="8.99993" y2="0.311793" gradientUnits="userSpaceOnUse">
                                                                    <stop stop-color="#20B038"></stop>
                                                                    <stop offset="1" stop-color="#60D66A"></stop>
                                                                </linearGradient>
                                                                <linearGradient id="paint1_linear_197_2740" x1="8.9999" y1="18" x2="8.9999" y2="0" gradientUnits="userSpaceOnUse">
                                                                    <stop stop-color="#F9F9F9"></stop>
                                                                    <stop offset="1" stop-color="white"></stop>
                                                                </linearGradient>
                                                            </defs>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link telegram_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.35659 8.89745L6.08862 12.6666C6.47202 12.6666 6.63807 12.5019 6.83719 12.3042L8.63472 10.5863L12.3594 13.314C13.0425 13.6947 13.5237 13.4942 13.708 12.6855L16.1529 1.22945L16.1535 1.22877C16.3702 0.218974 15.7884 -0.175901 15.1228 0.0718237L0.75207 5.57375C-0.228705 5.95445 -0.213855 6.5012 0.585345 6.74892L4.25937 7.8917L12.7934 2.55177C13.195 2.28582 13.5602 2.43297 13.2598 2.69892L6.35659 8.89745Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link linkedin_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.9959 16L15.9999 15.9993V10.1312C15.9999 7.26055 15.3819 5.04919 12.0259 5.04919C10.4125 5.04919 9.32986 5.93454 8.88785 6.77388H8.84119V5.3172H5.65918V15.9993H8.97252V10.7099C8.97252 9.31723 9.23652 7.97056 10.9612 7.97056C12.6605 7.97056 12.6859 9.5599 12.6859 10.7992V16H15.9959Z" fill="white"></path>
                                                            <path d="M0.26416 5.31848H3.5815V16.0006H0.26416V5.31848Z" fill="white"></path>
                                                            <path d="M1.92134 0C0.860669 0 0 0.860675 0 1.92135C0 2.98203 0.860669 3.8607 1.92134 3.8607C2.98201 3.8607 3.84268 2.98203 3.84268 1.92135C3.84201 0.860675 2.98134 0 1.92134 0Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link twitter_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16.2308 1.5612C15.6272 1.82596 14.984 2.00146 14.3135 2.08667C15.0033 1.67481 15.5298 1.02761 15.7773 0.247519C15.1342 0.630971 14.4241 0.901822 13.6673 1.05297C13.0566 0.402726 12.1863 0 11.2368 0C9.39457 0 7.91149 1.49526 7.91149 3.32832C7.91149 3.59207 7.9338 3.84568 7.98858 4.08711C5.22225 3.95219 2.77445 2.62634 1.13007 0.606625C0.842986 1.10471 0.674591 1.67481 0.674591 2.28854C0.674591 3.44092 1.26803 4.46245 2.15261 5.05386C1.618 5.04371 1.09355 4.8885 0.649231 4.64403C0.649231 4.65417 0.649231 4.66736 0.649231 4.68055C0.649231 6.29754 1.80263 7.64064 3.31513 7.95003C3.04428 8.02409 2.74909 8.05959 2.44273 8.05959C2.2297 8.05959 2.01464 8.04742 1.81277 8.00278C2.2439 9.32052 3.4673 10.2893 4.92198 10.3207C3.78989 11.2063 2.35245 11.7399 0.796322 11.7399C0.523442 11.7399 0.261721 11.7277 0 11.6943C1.47396 12.6448 3.22079 13.1875 5.10458 13.1875C11.2276 13.1875 14.5752 8.11539 14.5752 3.71888C14.5752 3.57178 14.5702 3.42976 14.5631 3.28876C15.2234 2.8201 15.7783 2.23477 16.2308 1.5612Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link facebook_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M2.67746 9.03332C2.60776 9.03332 1.14572 9.03372 0.471415 9.03312C0.124273 9.03292 0.000420254 8.92052 0.000420254 8.60572C-2.36628e-05 7.79712 -0.000245621 6.98852 0.000420254 6.17992C0.000642212 5.86912 0.131598 5.75052 0.474301 5.75032C1.14861 5.74992 2.60266 5.75012 2.67746 5.75012C2.67746 5.69472 2.67724 4.52732 2.67746 3.98972C2.6779 3.19492 2.83527 2.43412 3.2834 1.73752C3.74219 1.02452 4.40984 0.536123 5.26549 0.253723C5.8135 0.0727233 6.38238 0.000523409 6.96391 0.00012341C7.69149 -0.00027659 8.41907 0.000323403 9.14687 0.0015234C9.45961 0.0019234 9.59834 0.126523 9.599 0.410323C9.60033 1.17092 9.60033 1.93152 9.599 2.69192C9.59856 2.97872 9.4656 3.09392 9.14576 3.09712C8.54936 3.10292 7.95252 3.09932 7.35678 3.12092C6.75505 3.12092 6.43854 3.38572 6.43854 3.94692C6.42411 4.54052 6.43255 5.13472 6.43255 5.74992C6.48892 5.74992 8.20133 5.74972 9.00171 5.74992C9.36528 5.74992 9.48958 5.86252 9.48958 6.19192C9.48958 6.99612 9.48935 7.80052 9.48869 8.60472C9.48847 8.92932 9.37171 9.03292 9.00593 9.03312C8.20555 9.03352 6.4998 9.03332 6.42522 9.03332V15.5423C6.42522 15.8893 6.30403 15.9999 5.92404 15.9999C4.99759 15.9999 4.07091 16.0001 3.14446 15.9999C2.80863 15.9999 2.67768 15.8823 2.67768 15.5797C2.67746 13.4599 2.67746 9.10772 2.67746 9.03332Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <img class="img-fluid" src="images/faq-q.svg" alt="">
                                    What is the grace period?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="description">
                                        <p>
                                            FiXi Group Limited, the operator of FiXi, is an international online forex company founded by a team of Japanese and British executives who worked as forex traders in the Hong Kong offices of major U.S. financial institutions.
                                        </p>
                                        <p>
                                            FiXi Group Limited is the holding company of Prex Markets (Bahamas) Limited, Prex Markets Limited, Prex Markets Securities Co., Ltd., and PrexMarkets Financial Markets Co. PrexMarkets Financial Markets. FiXi Group Limited is the holding company of Prex Markets (Bahamas) Limited, Prex Markets Limited, Prex Markets Securities Co., Ltd., and PrexMarkets Financial Markets Co. PrexMarkets Financial Markets.
                                        </p>
                                    </div>
                                    <div class="socialBox_ChatBox_wrap ">
                                        <div class="socialMedia-box">
                                            <ul>
                                                <li class="socialMedia-box-link shrae_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.3242 9.64013C10.4635 9.64013 9.70512 10.0635 9.22874 10.7074L5.11013 8.59842C5.17851 8.36535 5.22656 8.12379 5.22656 7.86891C5.22656 7.5232 5.15568 7.19454 5.03324 6.89224L9.34355 4.29847C9.82324 4.86143 10.5283 5.22659 11.3242 5.22659C12.7653 5.22659 13.9375 4.05436 13.9375 2.61331C13.9375 1.17226 12.7653 3.05176e-05 11.3242 3.05176e-05C9.88317 3.05176e-05 8.71094 1.17226 8.71094 2.61331C8.71094 2.9454 8.77932 3.26042 8.89276 3.55287L4.56961 6.15425C4.09034 5.60802 3.39544 5.25563 2.61328 5.25563C1.17223 5.25563 0 6.42786 0 7.86891C0 9.30996 1.17223 10.4822 2.61328 10.4822C3.48815 10.4822 4.25939 10.0464 4.73396 9.38444L8.83902 11.4865C8.76341 11.7306 8.71094 11.9848 8.71094 12.2534C8.71094 13.6945 9.88317 14.8667 11.3242 14.8667C12.7653 14.8667 13.9375 13.6945 13.9375 12.2534C13.9375 10.8124 12.7653 9.64013 11.3242 9.64013Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link whatsapp_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0.351562 17.6872L1.575 13.2259C0.819141 11.9216 0.421875 10.438 0.421875 8.92275C0.425391 4.17314 4.28906 0.312988 9.03516 0.312988C11.3379 0.312988 13.5035 1.20947 15.1277 2.83721C16.7555 4.46494 17.652 6.62705 17.6484 8.92979C17.6449 13.6759 13.7812 17.5396 9.03516 17.5396H9.03164C7.59023 17.5396 6.17344 17.1774 4.91484 16.4919L0.351562 17.6872Z" fill="url(#paint0_linear_197_2740)"></path>
                                                            <path d="M0.0385742 18L1.3042 13.377C0.52373 12.027 0.115918 10.4906 0.115918 8.91914C0.115918 4.00078 4.12021 0 9.03857 0C11.4257 0 13.6651 0.931641 15.3491 2.61563C17.0331 4.30312 17.9612 6.54258 17.9612 8.92617C17.9577 13.8445 13.9569 17.8453 9.03857 17.8453H9.03506C7.54092 17.8453 6.0749 17.4691 4.77061 16.759L0.0385742 18ZM4.98857 15.1453L5.25928 15.307C6.39834 15.982 7.70264 16.3406 9.03506 16.3406H9.03857C13.1272 16.3406 16.453 13.0148 16.453 8.92617C16.453 6.94687 15.6831 5.08359 14.2839 3.68086C12.8847 2.27812 11.0214 1.5082 9.04209 1.5082C4.9499 1.5082 1.62412 4.83398 1.62412 8.92266C1.62412 10.3219 2.01436 11.6859 2.75615 12.8672L2.93193 13.1484L2.18311 15.8836L4.98857 15.1453Z" fill="url(#paint1_linear_197_2740)"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.80625 5.18896C6.6375 4.81631 6.46172 4.80928 6.30352 4.80225C6.17344 4.79521 6.02578 4.79873 5.87461 4.79873C5.72695 4.79873 5.48437 4.85498 5.28047 5.07646C5.07656 5.29795 4.5 5.83936 4.5 6.93623C4.5 8.03311 5.29805 9.09482 5.41055 9.24248C5.52305 9.39014 6.95391 11.714 9.21797 12.6069C11.1023 13.3487 11.4855 13.2011 11.8934 13.1659C12.3012 13.1308 13.2117 12.628 13.398 12.1077C13.5844 11.5874 13.5844 11.1409 13.5281 11.0495C13.4719 10.9581 13.3242 10.9019 13.0992 10.7894C12.8777 10.6769 11.7809 10.139 11.577 10.0651C11.373 9.99131 11.2254 9.95264 11.0742 10.1776C10.9266 10.3991 10.4977 10.9019 10.3676 11.0495C10.2375 11.1972 10.1074 11.2183 9.88594 11.1058C9.66445 10.9933 8.94375 10.7577 8.09297 9.99834C7.42852 9.40771 6.98203 8.67646 6.85195 8.45498C6.72187 8.2335 6.83789 8.11045 6.95039 8.00146C7.04883 7.90303 7.17188 7.74131 7.28437 7.61123C7.39687 7.48115 7.43203 7.38975 7.50586 7.23857C7.57969 7.09092 7.54453 6.96084 7.48828 6.84834C7.43906 6.73232 7.00664 5.63193 6.80625 5.18896Z" fill="white"></path>
                                                            <defs>
                                                                <linearGradient id="paint0_linear_197_2740" x1="8.99993" y1="17.6886" x2="8.99993" y2="0.311793" gradientUnits="userSpaceOnUse">
                                                                    <stop stop-color="#20B038"></stop>
                                                                    <stop offset="1" stop-color="#60D66A"></stop>
                                                                </linearGradient>
                                                                <linearGradient id="paint1_linear_197_2740" x1="8.9999" y1="18" x2="8.9999" y2="0" gradientUnits="userSpaceOnUse">
                                                                    <stop stop-color="#F9F9F9"></stop>
                                                                    <stop offset="1" stop-color="white"></stop>
                                                                </linearGradient>
                                                            </defs>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link telegram_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.35659 8.89745L6.08862 12.6666C6.47202 12.6666 6.63807 12.5019 6.83719 12.3042L8.63472 10.5863L12.3594 13.314C13.0425 13.6947 13.5237 13.4942 13.708 12.6855L16.1529 1.22945L16.1535 1.22877C16.3702 0.218974 15.7884 -0.175901 15.1228 0.0718237L0.75207 5.57375C-0.228705 5.95445 -0.213855 6.5012 0.585345 6.74892L4.25937 7.8917L12.7934 2.55177C13.195 2.28582 13.5602 2.43297 13.2598 2.69892L6.35659 8.89745Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link linkedin_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.9959 16L15.9999 15.9993V10.1312C15.9999 7.26055 15.3819 5.04919 12.0259 5.04919C10.4125 5.04919 9.32986 5.93454 8.88785 6.77388H8.84119V5.3172H5.65918V15.9993H8.97252V10.7099C8.97252 9.31723 9.23652 7.97056 10.9612 7.97056C12.6605 7.97056 12.6859 9.5599 12.6859 10.7992V16H15.9959Z" fill="white"></path>
                                                            <path d="M0.26416 5.31848H3.5815V16.0006H0.26416V5.31848Z" fill="white"></path>
                                                            <path d="M1.92134 0C0.860669 0 0 0.860675 0 1.92135C0 2.98203 0.860669 3.8607 1.92134 3.8607C2.98201 3.8607 3.84268 2.98203 3.84268 1.92135C3.84201 0.860675 2.98134 0 1.92134 0Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link twitter_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16.2308 1.5612C15.6272 1.82596 14.984 2.00146 14.3135 2.08667C15.0033 1.67481 15.5298 1.02761 15.7773 0.247519C15.1342 0.630971 14.4241 0.901822 13.6673 1.05297C13.0566 0.402726 12.1863 0 11.2368 0C9.39457 0 7.91149 1.49526 7.91149 3.32832C7.91149 3.59207 7.9338 3.84568 7.98858 4.08711C5.22225 3.95219 2.77445 2.62634 1.13007 0.606625C0.842986 1.10471 0.674591 1.67481 0.674591 2.28854C0.674591 3.44092 1.26803 4.46245 2.15261 5.05386C1.618 5.04371 1.09355 4.8885 0.649231 4.64403C0.649231 4.65417 0.649231 4.66736 0.649231 4.68055C0.649231 6.29754 1.80263 7.64064 3.31513 7.95003C3.04428 8.02409 2.74909 8.05959 2.44273 8.05959C2.2297 8.05959 2.01464 8.04742 1.81277 8.00278C2.2439 9.32052 3.4673 10.2893 4.92198 10.3207C3.78989 11.2063 2.35245 11.7399 0.796322 11.7399C0.523442 11.7399 0.261721 11.7277 0 11.6943C1.47396 12.6448 3.22079 13.1875 5.10458 13.1875C11.2276 13.1875 14.5752 8.11539 14.5752 3.71888C14.5752 3.57178 14.5702 3.42976 14.5631 3.28876C15.2234 2.8201 15.7783 2.23477 16.2308 1.5612Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link facebook_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M2.67746 9.03332C2.60776 9.03332 1.14572 9.03372 0.471415 9.03312C0.124273 9.03292 0.000420254 8.92052 0.000420254 8.60572C-2.36628e-05 7.79712 -0.000245621 6.98852 0.000420254 6.17992C0.000642212 5.86912 0.131598 5.75052 0.474301 5.75032C1.14861 5.74992 2.60266 5.75012 2.67746 5.75012C2.67746 5.69472 2.67724 4.52732 2.67746 3.98972C2.6779 3.19492 2.83527 2.43412 3.2834 1.73752C3.74219 1.02452 4.40984 0.536123 5.26549 0.253723C5.8135 0.0727233 6.38238 0.000523409 6.96391 0.00012341C7.69149 -0.00027659 8.41907 0.000323403 9.14687 0.0015234C9.45961 0.0019234 9.59834 0.126523 9.599 0.410323C9.60033 1.17092 9.60033 1.93152 9.599 2.69192C9.59856 2.97872 9.4656 3.09392 9.14576 3.09712C8.54936 3.10292 7.95252 3.09932 7.35678 3.12092C6.75505 3.12092 6.43854 3.38572 6.43854 3.94692C6.42411 4.54052 6.43255 5.13472 6.43255 5.74992C6.48892 5.74992 8.20133 5.74972 9.00171 5.74992C9.36528 5.74992 9.48958 5.86252 9.48958 6.19192C9.48958 6.99612 9.48935 7.80052 9.48869 8.60472C9.48847 8.92932 9.37171 9.03292 9.00593 9.03312C8.20555 9.03352 6.4998 9.03332 6.42522 9.03332V15.5423C6.42522 15.8893 6.30403 15.9999 5.92404 15.9999C4.99759 15.9999 4.07091 16.0001 3.14446 15.9999C2.80863 15.9999 2.67768 15.8823 2.67768 15.5797C2.67746 13.4599 2.67746 9.10772 2.67746 9.03332Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    <img class="img-fluid" src="images/faq-q.svg" alt="">
                                    General Terms and Conditions
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="description">
                                        <p>
                                            FiXi Group Limited, the operator of FiXi, is an international online forex company founded by a team of Japanese and British executives who worked as forex traders in the Hong Kong offices of major U.S. financial institutions.
                                        </p>
                                        <p>
                                            FiXi Group Limited is the holding company of Prex Markets (Bahamas) Limited, Prex Markets Limited, Prex Markets Securities Co., Ltd., and PrexMarkets Financial Markets Co. PrexMarkets Financial Markets. FiXi Group Limited is the holding company of Prex Markets (Bahamas) Limited, Prex Markets Limited, Prex Markets Securities Co., Ltd., and PrexMarkets Financial Markets Co. PrexMarkets Financial Markets.
                                        </p>
                                    </div>
                                    <div class="socialBox_ChatBox_wrap ">
                                        <div class="socialMedia-box">
                                            <ul>
                                                <li class="socialMedia-box-link shrae_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.3242 9.64013C10.4635 9.64013 9.70512 10.0635 9.22874 10.7074L5.11013 8.59842C5.17851 8.36535 5.22656 8.12379 5.22656 7.86891C5.22656 7.5232 5.15568 7.19454 5.03324 6.89224L9.34355 4.29847C9.82324 4.86143 10.5283 5.22659 11.3242 5.22659C12.7653 5.22659 13.9375 4.05436 13.9375 2.61331C13.9375 1.17226 12.7653 3.05176e-05 11.3242 3.05176e-05C9.88317 3.05176e-05 8.71094 1.17226 8.71094 2.61331C8.71094 2.9454 8.77932 3.26042 8.89276 3.55287L4.56961 6.15425C4.09034 5.60802 3.39544 5.25563 2.61328 5.25563C1.17223 5.25563 0 6.42786 0 7.86891C0 9.30996 1.17223 10.4822 2.61328 10.4822C3.48815 10.4822 4.25939 10.0464 4.73396 9.38444L8.83902 11.4865C8.76341 11.7306 8.71094 11.9848 8.71094 12.2534C8.71094 13.6945 9.88317 14.8667 11.3242 14.8667C12.7653 14.8667 13.9375 13.6945 13.9375 12.2534C13.9375 10.8124 12.7653 9.64013 11.3242 9.64013Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link whatsapp_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0.351562 17.6872L1.575 13.2259C0.819141 11.9216 0.421875 10.438 0.421875 8.92275C0.425391 4.17314 4.28906 0.312988 9.03516 0.312988C11.3379 0.312988 13.5035 1.20947 15.1277 2.83721C16.7555 4.46494 17.652 6.62705 17.6484 8.92979C17.6449 13.6759 13.7812 17.5396 9.03516 17.5396H9.03164C7.59023 17.5396 6.17344 17.1774 4.91484 16.4919L0.351562 17.6872Z" fill="url(#paint0_linear_197_2740)"></path>
                                                            <path d="M0.0385742 18L1.3042 13.377C0.52373 12.027 0.115918 10.4906 0.115918 8.91914C0.115918 4.00078 4.12021 0 9.03857 0C11.4257 0 13.6651 0.931641 15.3491 2.61563C17.0331 4.30312 17.9612 6.54258 17.9612 8.92617C17.9577 13.8445 13.9569 17.8453 9.03857 17.8453H9.03506C7.54092 17.8453 6.0749 17.4691 4.77061 16.759L0.0385742 18ZM4.98857 15.1453L5.25928 15.307C6.39834 15.982 7.70264 16.3406 9.03506 16.3406H9.03857C13.1272 16.3406 16.453 13.0148 16.453 8.92617C16.453 6.94687 15.6831 5.08359 14.2839 3.68086C12.8847 2.27812 11.0214 1.5082 9.04209 1.5082C4.9499 1.5082 1.62412 4.83398 1.62412 8.92266C1.62412 10.3219 2.01436 11.6859 2.75615 12.8672L2.93193 13.1484L2.18311 15.8836L4.98857 15.1453Z" fill="url(#paint1_linear_197_2740)"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.80625 5.18896C6.6375 4.81631 6.46172 4.80928 6.30352 4.80225C6.17344 4.79521 6.02578 4.79873 5.87461 4.79873C5.72695 4.79873 5.48437 4.85498 5.28047 5.07646C5.07656 5.29795 4.5 5.83936 4.5 6.93623C4.5 8.03311 5.29805 9.09482 5.41055 9.24248C5.52305 9.39014 6.95391 11.714 9.21797 12.6069C11.1023 13.3487 11.4855 13.2011 11.8934 13.1659C12.3012 13.1308 13.2117 12.628 13.398 12.1077C13.5844 11.5874 13.5844 11.1409 13.5281 11.0495C13.4719 10.9581 13.3242 10.9019 13.0992 10.7894C12.8777 10.6769 11.7809 10.139 11.577 10.0651C11.373 9.99131 11.2254 9.95264 11.0742 10.1776C10.9266 10.3991 10.4977 10.9019 10.3676 11.0495C10.2375 11.1972 10.1074 11.2183 9.88594 11.1058C9.66445 10.9933 8.94375 10.7577 8.09297 9.99834C7.42852 9.40771 6.98203 8.67646 6.85195 8.45498C6.72187 8.2335 6.83789 8.11045 6.95039 8.00146C7.04883 7.90303 7.17188 7.74131 7.28437 7.61123C7.39687 7.48115 7.43203 7.38975 7.50586 7.23857C7.57969 7.09092 7.54453 6.96084 7.48828 6.84834C7.43906 6.73232 7.00664 5.63193 6.80625 5.18896Z" fill="white"></path>
                                                            <defs>
                                                                <linearGradient id="paint0_linear_197_2740" x1="8.99993" y1="17.6886" x2="8.99993" y2="0.311793" gradientUnits="userSpaceOnUse">
                                                                    <stop stop-color="#20B038"></stop>
                                                                    <stop offset="1" stop-color="#60D66A"></stop>
                                                                </linearGradient>
                                                                <linearGradient id="paint1_linear_197_2740" x1="8.9999" y1="18" x2="8.9999" y2="0" gradientUnits="userSpaceOnUse">
                                                                    <stop stop-color="#F9F9F9"></stop>
                                                                    <stop offset="1" stop-color="white"></stop>
                                                                </linearGradient>
                                                            </defs>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link telegram_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.35659 8.89745L6.08862 12.6666C6.47202 12.6666 6.63807 12.5019 6.83719 12.3042L8.63472 10.5863L12.3594 13.314C13.0425 13.6947 13.5237 13.4942 13.708 12.6855L16.1529 1.22945L16.1535 1.22877C16.3702 0.218974 15.7884 -0.175901 15.1228 0.0718237L0.75207 5.57375C-0.228705 5.95445 -0.213855 6.5012 0.585345 6.74892L4.25937 7.8917L12.7934 2.55177C13.195 2.28582 13.5602 2.43297 13.2598 2.69892L6.35659 8.89745Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link linkedin_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.9959 16L15.9999 15.9993V10.1312C15.9999 7.26055 15.3819 5.04919 12.0259 5.04919C10.4125 5.04919 9.32986 5.93454 8.88785 6.77388H8.84119V5.3172H5.65918V15.9993H8.97252V10.7099C8.97252 9.31723 9.23652 7.97056 10.9612 7.97056C12.6605 7.97056 12.6859 9.5599 12.6859 10.7992V16H15.9959Z" fill="white"></path>
                                                            <path d="M0.26416 5.31848H3.5815V16.0006H0.26416V5.31848Z" fill="white"></path>
                                                            <path d="M1.92134 0C0.860669 0 0 0.860675 0 1.92135C0 2.98203 0.860669 3.8607 1.92134 3.8607C2.98201 3.8607 3.84268 2.98203 3.84268 1.92135C3.84201 0.860675 2.98134 0 1.92134 0Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link twitter_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16.2308 1.5612C15.6272 1.82596 14.984 2.00146 14.3135 2.08667C15.0033 1.67481 15.5298 1.02761 15.7773 0.247519C15.1342 0.630971 14.4241 0.901822 13.6673 1.05297C13.0566 0.402726 12.1863 0 11.2368 0C9.39457 0 7.91149 1.49526 7.91149 3.32832C7.91149 3.59207 7.9338 3.84568 7.98858 4.08711C5.22225 3.95219 2.77445 2.62634 1.13007 0.606625C0.842986 1.10471 0.674591 1.67481 0.674591 2.28854C0.674591 3.44092 1.26803 4.46245 2.15261 5.05386C1.618 5.04371 1.09355 4.8885 0.649231 4.64403C0.649231 4.65417 0.649231 4.66736 0.649231 4.68055C0.649231 6.29754 1.80263 7.64064 3.31513 7.95003C3.04428 8.02409 2.74909 8.05959 2.44273 8.05959C2.2297 8.05959 2.01464 8.04742 1.81277 8.00278C2.2439 9.32052 3.4673 10.2893 4.92198 10.3207C3.78989 11.2063 2.35245 11.7399 0.796322 11.7399C0.523442 11.7399 0.261721 11.7277 0 11.6943C1.47396 12.6448 3.22079 13.1875 5.10458 13.1875C11.2276 13.1875 14.5752 8.11539 14.5752 3.71888C14.5752 3.57178 14.5702 3.42976 14.5631 3.28876C15.2234 2.8201 15.7783 2.23477 16.2308 1.5612Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <li class="socialMedia-box-link facebook_icon">
                                                    <a href="javascript:void();">
                                                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M2.67746 9.03332C2.60776 9.03332 1.14572 9.03372 0.471415 9.03312C0.124273 9.03292 0.000420254 8.92052 0.000420254 8.60572C-2.36628e-05 7.79712 -0.000245621 6.98852 0.000420254 6.17992C0.000642212 5.86912 0.131598 5.75052 0.474301 5.75032C1.14861 5.74992 2.60266 5.75012 2.67746 5.75012C2.67746 5.69472 2.67724 4.52732 2.67746 3.98972C2.6779 3.19492 2.83527 2.43412 3.2834 1.73752C3.74219 1.02452 4.40984 0.536123 5.26549 0.253723C5.8135 0.0727233 6.38238 0.000523409 6.96391 0.00012341C7.69149 -0.00027659 8.41907 0.000323403 9.14687 0.0015234C9.45961 0.0019234 9.59834 0.126523 9.599 0.410323C9.60033 1.17092 9.60033 1.93152 9.599 2.69192C9.59856 2.97872 9.4656 3.09392 9.14576 3.09712C8.54936 3.10292 7.95252 3.09932 7.35678 3.12092C6.75505 3.12092 6.43854 3.38572 6.43854 3.94692C6.42411 4.54052 6.43255 5.13472 6.43255 5.74992C6.48892 5.74992 8.20133 5.74972 9.00171 5.74992C9.36528 5.74992 9.48958 5.86252 9.48958 6.19192C9.48958 6.99612 9.48935 7.80052 9.48869 8.60472C9.48847 8.92932 9.37171 9.03292 9.00593 9.03312C8.20555 9.03352 6.4998 9.03332 6.42522 9.03332V15.5423C6.42522 15.8893 6.30403 15.9999 5.92404 15.9999C4.99759 15.9999 4.07091 16.0001 3.14446 15.9999C2.80863 15.9999 2.67768 15.8823 2.67768 15.5797C2.67746 13.4599 2.67746 9.10772 2.67746 9.03332Z" fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section> -->

<!-- end faq-sub-page  -->

<!-- Get Started  -->
@include('front.layouts.partials.get_started')
<!-- End  -->

@endsection