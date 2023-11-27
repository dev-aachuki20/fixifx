@php
$keywords_jp = 'FX,FiXi,フィクシー,アカウント,申請フォーム';
$description_jp = 'FiXi FX（フィクシー）の口座間振替、サブアカウント申請フォーム、パスワードの変更、出金依頼などの各種リクエスト受付フォームです。';
@endphp

@extends('front.layouts.base')

@section('content')

@include('front.layouts.partials.common_hero')


<!-- FiXi Manuals  -->
<section class="fixiManuals-wrapper padding-tb-120">
    <div class="container">
        @php $header = $section->where('section_no', 1)->first() @endphp
        @if($header)
        <div class="row justify-content-center">
            <div class="col-lg-9 col-sm-12">
                <div class="section-head text-center">
                    <h2 class="max-w-427">{{ $header->{config('app.locale').'_title'} }}</h2>
                    <div class="discription">
                        <p>{!! $header->{config('app.locale').'_desc'} !!}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- ctrader and fixi -->
        @php $section=$section->where('section_no', '!=', 1) @endphp
        @if($section)
        <div class="row">
            <div class="col-12">
                <div class="manual-listing">
                    <ul class="manual-listing-wrap">
                        <li class="manual-listing-wrap-link">
                            <div class="manual-listing-box">
                                <a class="d-flex justify-content-between align-items-center manual-listing-box-title" data-bs-toggle="collapse" href="#cTrader" role="button" aria-expanded="true" aria-controls="cTrader">
                                    <h4>{{__('message.fixi')}}</h4>
                                    <svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L9 9L17 1" stroke="#1E1F1F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <div class="collapse manual-listing-content show" id="cTrader">
                                    <div class="manual-listing-content-inner">
                                        <ul class="manual-download-listing">
                                            @foreach($section as $key => $sec)
                                            <li class="manual-download-link">
                                                <div class="title">
                                                    <h6>{{ $sec->{config('app.locale').'_title'} }}</h6>
                                                </div>
                                                <div class="download-btn">
                                                    <a href="{{ asset(str_contains($sec->getRawOriginal('image'), 'http') ? $sec->getRawOriginal('image') : $sec->image) }}" target="_blank" class="d-flex align-items-center">
                                                        <svg width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M20.125 6H15.3782C14.6946 6 14.125 5.42675 14.125 4.73885V0L20.125 6Z" fill="#2EEECE" />
                                                            <path d="M11.125 16.9452V21.0548C11.125 21.589 10.7377 22 10.2342 22H0.899648C0.473592 22 0.125 21.6301 0.125 21.1781V16.8219C0.125 16.3699 0.473592 16 0.899648 16H10.2729C10.7377 16 11.125 16.4521 11.125 16.9452Z" fill="#2EEECE" />
                                                            <path d="M3.125 16V22H1.02052C0.527985 22 0.125 21.6301 0.125 21.1781V16.8219C0.125 16.3699 0.527985 16 1.02052 16H3.125Z" fill="#2EEECE" />
                                                            <path d="M7.74044 10C8.16354 10 8.5097 10.1212 8.77894 10.3232C9.00972 10.5253 9.12511 10.8485 9.12511 11.2929C9.12511 11.697 9.00972 12.0202 8.77894 12.2626C8.54817 12.4646 8.202 12.5859 7.74044 12.5859H6.8558V13.8384C6.8558 13.8788 6.8558 13.9192 6.81733 13.9596C6.77887 14 6.74041 14 6.70194 14H6.27885C6.24039 14 6.20193 14 6.16346 13.9596C6.125 13.9192 6.125 13.8788 6.125 13.8384V10.1616C6.125 10.1212 6.125 10.0808 6.16346 10.0404C6.20193 10 6.24039 10 6.27885 10H7.74044ZM6.8558 11.8586H7.70198C7.8943 11.8586 8.08661 11.8182 8.202 11.7374C8.31739 11.6566 8.39431 11.4949 8.39431 11.2929C8.39431 11.0909 8.31739 10.9293 8.202 10.8485C8.04815 10.7677 7.8943 10.7273 7.70198 10.7273H6.8558V11.8586Z" fill="#2EEECE" />
                                                            <path d="M11.5884 10C11.8445 10 12.064 10.0404 12.247 10.1212C12.4299 10.202 12.5762 10.2828 12.7226 10.4444C12.8323 10.5657 12.9421 10.7273 13.0152 10.9293C13.0884 11.1313 13.125 11.3333 13.125 11.5758V12.4242C13.125 12.6667 13.0884 12.8687 13.0152 13.0707C12.9421 13.2727 12.8689 13.4343 12.7226 13.5556C12.6128 13.6768 12.4299 13.798 12.247 13.8788C12.064 13.9596 11.8445 14 11.5884 14H10.2713C10.2348 14 10.1982 14 10.1616 13.9596C10.125 13.9192 10.125 13.8788 10.125 13.8384V10.1616C10.125 10.1212 10.125 10.0808 10.1616 10.0404C10.1982 10 10.2348 10 10.2713 10H11.5884ZM12.4299 11.5758C12.4299 11.4545 12.3933 11.3333 12.3567 11.2525C12.3201 11.1313 12.2835 11.0505 12.2104 10.9697C12.1372 10.8889 12.064 10.8485 11.9543 10.7677C11.8079 10.7273 11.6982 10.7273 11.5518 10.7273H10.8567V13.2727H11.5884C11.7348 13.2727 11.8445 13.2323 11.9543 13.1919C12.064 13.1515 12.1372 13.0707 12.2104 13.0303C12.2835 12.9495 12.3201 12.8687 12.3567 12.7475C12.3933 12.6263 12.4299 12.5455 12.4299 12.4242C12.4299 12.1414 12.4299 11.8586 12.4299 11.5758Z" fill="#2EEECE" />
                                                            <path d="M15.9485 10C15.9926 10 16.0368 10 16.0809 10.0404C16.125 10.0808 16.125 10.1212 16.125 10.1616V10.5657C16.125 10.6061 16.125 10.6465 16.0809 10.6869C16.0368 10.7273 15.9926 10.7273 15.9485 10.7273H13.9632V11.8182H15.8162C15.8603 11.8182 15.9044 11.8182 15.9485 11.8586C15.9926 11.899 15.9926 11.9394 15.9926 11.9798V12.3838C15.9926 12.4242 15.9926 12.4646 15.9485 12.5051C15.9044 12.5455 15.8603 12.5455 15.8162 12.5455H13.9632V13.8384C13.9632 13.8788 13.9632 13.9192 13.9191 13.9596C13.875 14 13.8309 14 13.7868 14H13.3015C13.2574 14 13.2132 14 13.1691 13.9596C13.125 13.9192 13.125 13.8788 13.125 13.8384V10.1616C13.125 10.1212 13.125 10.0808 13.1691 10.0404C13.2132 10 13.2574 10 13.3015 10H15.9485Z" fill="#2EEECE" />
                                                            <path d="M7.7342 10C8.17417 10 8.51581 10.1087 8.75974 10.3258C9.00303 10.5429 9.125 10.8611 9.125 11.2799C9.125 11.6991 9.00303 12.0192 8.75974 12.24C8.5158 12.4612 8.17417 12.5716 7.7342 12.5716H6.86127V13.8458C6.86127 13.8876 6.84722 13.9237 6.81784 13.9542C6.78847 13.9849 6.75398 14 6.7144 14H6.27251C6.23228 14 6.19779 13.9849 6.16906 13.9542C6.13969 13.9237 6.125 13.8876 6.125 13.8458V10.1542C6.125 10.1124 6.13969 10.0763 6.16906 10.0458C6.1978 10.0154 6.23228 10 6.27251 10L7.7342 10ZM6.86127 11.8573H7.70674C7.91427 11.8573 8.07966 11.8142 8.20291 11.7285C8.32679 11.6429 8.38873 11.4934 8.38873 11.2799C8.38873 11.0668 8.32679 10.9193 8.20291 10.837C8.07966 10.7554 7.91427 10.7142 7.70674 10.7142H6.86127V11.8573Z" fill="#2EEECE" />
                                                            <path d="M11.555 10C11.8121 10 12.0357 10.0371 12.2251 10.1114C12.4144 10.1857 12.5726 10.2914 12.6997 10.4285C12.8268 10.5657 12.9239 10.7313 12.9923 10.9257C13.0601 11.12 13.1004 11.3371 13.1145 11.5773C13.1285 11.859 13.1285 12.141 13.1145 12.423C13.1004 12.6629 13.0601 12.88 12.9923 13.0743C12.9239 13.2687 12.8274 13.4343 12.7028 13.5715C12.5775 13.7086 12.4218 13.8143 12.2355 13.8886C12.0492 13.9629 11.8311 14 11.5806 14H10.2661C10.2276 14 10.1946 13.9849 10.1671 13.9542C10.139 13.9237 10.125 13.8876 10.125 13.8458V10.1542C10.125 10.1124 10.139 10.0763 10.1671 10.0458C10.1946 10.0154 10.2276 10 10.2661 10L11.555 10ZM12.4102 11.5773C12.4034 11.4552 12.3815 11.3421 12.3448 11.2371C12.3088 11.1324 12.2544 11.0411 12.1835 10.9628C12.1121 10.8848 12.0223 10.8239 11.9148 10.7801C11.8067 10.7363 11.6784 10.7142 11.5287 10.7142H10.8293V13.2858H11.555C11.6973 13.2858 11.8207 13.2637 11.9252 13.2199C12.0296 13.1764 12.1164 13.1162 12.186 13.0399C12.2556 12.9639 12.3088 12.8723 12.3448 12.7656C12.3815 12.6592 12.4035 12.5448 12.4102 12.423C12.4242 12.141 12.4242 11.859 12.4102 11.5773Z" fill="#2EEECE" />
                                                            <path d="M15.9563 10C16.0023 10 16.0417 10.0154 16.0753 10.0458C16.1082 10.0763 16.125 10.1124 16.125 10.1542V10.56C16.125 10.6018 16.1082 10.6383 16.0753 10.6687C16.0417 10.6992 16.0023 10.7142 15.9563 10.7142H13.967V11.8229H15.8321C15.8774 11.8229 15.9169 11.8383 15.9505 11.8687C15.9833 11.8991 16.0001 11.9353 16.0001 11.9771V12.3829C16.0001 12.4247 15.9833 12.4612 15.9505 12.4916C15.9169 12.522 15.8774 12.5371 15.8321 12.5371H13.967V13.8458C13.967 13.8876 13.9502 13.9237 13.9174 13.9542C13.8838 13.9849 13.8443 14 13.7983 14H13.2937C13.2477 14 13.2083 13.9849 13.1747 13.9542C13.1418 13.9237 13.125 13.8876 13.125 13.8458V10.1542C13.125 10.1124 13.1418 10.0763 13.1747 10.0458C13.2083 10.0154 13.2477 10 13.2937 10L15.9563 10Z" fill="#2EEECE" />
                                                            <path d="M21.7945 6.5C21.7543 6.45937 15.5187 0.1625 15.4382 0.08125C15.3578 0.040625 15.2773 0 15.2371 0H4.01293C3.12787 0 2.40374 0.73125 2.40374 1.625V15.9656H2.00144C1.39799 15.9656 0.875 16.4531 0.875 17.1031V21.4094C0.875 22.0188 1.35776 22.5469 2.00144 22.5469H2.40374V24.375C2.40374 25.2688 3.12787 26 4.01293 26H20.2658C21.1509 26 21.875 25.2688 21.875 24.375V6.70312C21.875 6.6625 21.8348 6.58125 21.7945 6.5ZM15.5187 1.05625L20.829 6.41875H16.5244C15.9612 6.41875 15.5187 5.97188 15.5187 5.40312V1.05625ZM1.47845 21.4094V17.0625C1.47845 16.7781 1.71983 16.5344 2.00144 16.5344H11.7371C12.0991 16.5344 12.3807 16.8188 12.3807 17.1844V21.2469C12.3807 21.6125 12.0991 21.8969 11.7371 21.8969C8.43822 21.8969 6.70833 21.8969 2.00144 21.8969C1.71983 21.8969 1.47845 21.6938 1.47845 21.4094ZM21.2716 24.375C21.2716 24.9438 20.829 25.3906 20.2658 25.3906H4.01293C3.44971 25.3906 3.00718 24.9438 3.00718 24.375V22.5063H11.6968C12.3807 22.5063 12.944 21.9375 12.944 21.2469V17.1844C12.944 16.4937 12.3807 15.925 11.6968 15.925H3.00718V1.625C3.00718 1.05625 3.44971 0.609375 4.01293 0.609375H14.9152V5.40312C14.9152 6.29688 15.6394 7.02812 16.5244 7.02812H21.2716V24.375Z" fill="#1E1F1F" />
                                                            <path d="M4.0728 18C4.36611 18 4.59387 18.0544 4.75649 18.1629C4.91869 18.2715 5 18.4305 5 18.64C5 18.8495 4.91869 19.0096 4.75649 19.12C4.59387 19.2306 4.36611 19.2858 4.0728 19.2858H3.49085V19.9229C3.49085 19.9438 3.48148 19.9619 3.4619 19.9771C3.44231 19.9925 3.41932 20 3.39293 20H3.09834C3.07152 20 3.04853 19.9925 3.02937 19.9771C3.00979 19.9619 3 19.9438 3 19.9229V18.0771C3 18.0562 3.00979 18.0381 3.02937 18.0229C3.04853 18.0077 3.07152 18 3.09834 18L4.0728 18ZM3.49085 18.9287H4.05449C4.19285 18.9287 4.30311 18.9071 4.38527 18.8643C4.46786 18.8214 4.50915 18.7467 4.50915 18.64C4.50915 18.5334 4.46786 18.4596 4.38527 18.4185C4.30311 18.3777 4.19285 18.3571 4.05449 18.3571H3.49085V18.9287Z" fill="#1E1F1F" />
                                                            <path d="M5.95332 18C6.12476 18 6.27381 18.0186 6.40005 18.0557C6.5263 18.0928 6.63176 18.1457 6.71647 18.2143C6.80118 18.2828 6.86592 18.3656 6.91153 18.4628C6.95673 18.56 6.98361 18.6686 6.99298 18.7887C7.00234 18.9295 7.00234 19.0705 6.99298 19.2115C6.98361 19.3314 6.95673 19.44 6.91153 19.5372C6.86592 19.6344 6.80158 19.7172 6.7185 19.7857C6.63502 19.8543 6.53118 19.9072 6.40697 19.9443C6.28277 19.9814 6.13739 20 5.97042 20H5.09407C5.06841 20 5.04642 19.9925 5.0281 19.9771C5.00937 19.9619 5 19.9438 5 19.9229V18.0771C5 18.0562 5.00937 18.0381 5.0281 18.0229C5.04642 18.0077 5.06841 18 5.09407 18L5.95332 18ZM6.52344 18.7887C6.51897 18.7276 6.5043 18.6711 6.47987 18.6185C6.45584 18.5662 6.4196 18.5205 6.37236 18.4814C6.32472 18.4424 6.26486 18.412 6.19318 18.3901C6.1211 18.3682 6.03558 18.3571 5.93581 18.3571H5.46954V19.6429H5.95333C6.04821 19.6429 6.13047 19.6318 6.20011 19.6099C6.26974 19.5882 6.32757 19.5581 6.37399 19.5199C6.42042 19.482 6.45585 19.4361 6.47987 19.3828C6.50431 19.3296 6.51897 19.2724 6.52345 19.2115C6.53281 19.0705 6.53281 18.9295 6.52344 18.7887Z" fill="#1E1F1F" />
                                                            <path d="M8.88753 18C8.9182 18 8.9445 18.0077 8.96689 18.0229C8.9888 18.0381 9 18.0562 9 18.0771V18.28C9 18.3009 8.9888 18.3191 8.96689 18.3344C8.9445 18.3496 8.9182 18.3571 8.88753 18.3571H7.56134V18.9114H8.80477C8.83495 18.9114 8.86124 18.9191 8.88364 18.9343C8.90555 18.9496 8.91674 18.9676 8.91674 18.9885V19.1914C8.91674 19.2123 8.90555 19.2306 8.88364 19.2458C8.86124 19.261 8.83495 19.2685 8.80477 19.2685H7.56134V19.9229C7.56134 19.9438 7.55014 19.9619 7.52823 19.9771C7.50584 19.9925 7.47954 20 7.44887 20H7.11247C7.0818 20 7.0555 19.9925 7.03311 19.9771C7.0112 19.9619 7 19.9438 7 19.9229V18.0771C7 18.0562 7.0112 18.0381 7.03311 18.0229C7.0555 18.0077 7.0818 18 7.11247 18L8.88753 18Z" fill="#1E1F1F" />
                                                        </svg>
                                                        <span>{{__('message.download_now')}}</span>
                                                    </a>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- end  -->

                    </ul>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- end  -->

<!-- Fixi’s OpenAPI  -->
@php
$section3 = $common->where('section_no', 3)->where('status', 1)->first();
$sectionEnLink3 = $section3 ? json_decode($section3->en_link) : null;
$sectionJaLink3 = $section3 ? json_decode($section3->ja_link) : null;
@endphp
@if($section3)
<section class="OpenAPI-wrapper padding-tb-120 mspace-bottom-100 explorecls" style="background-image: url({{$section3->image ? $section3->image : asset('fixifx/images/OpenAPI-bg.png') }});">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-sm-12">
                <div class="section-head text-center">
                    <h2 class="max-w-427">{{ $section3->{config('app.locale').'_title'} }}</h2>
                    <div class="discription">
                        <p>{!! $section3->{config('app.locale').'_desc'} !!}</p>
                    </div>
                    <div class="openAi-btn d-flex align-items-center justify-content-center">

                        @if(config('app.locale') == 'en')
                        <a href="{{ isset($sectionEnLink3[0]) ? $sectionEnLink3[0] : '#' }}" target="_blank" class="custom-btn fill-btn-1">{{__('message.go_to_the_developer_portal_btn')}}</a>
                        @else
                        <a href="{{ isset($sectionJaLink3[0]) ? $sectionJaLink3[0] : '#' }}" target="_blank" class="custom-btn fill-btn-1">{{__('message.go_to_the_developer_portal_btn')}}</a>
                        @endif


                        <a href="{{ route('page', [config('app.locale'), 'contact-us']) }}" target="_blank" class="custom-btn fill-btn">{{__('message.talk_to_our_specialist_btn')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('front.layouts.partials.explore') --}}

</section>
@endif
<!-- end  -->

<!-- Get Started  -->
@include('front.layouts.partials.get_started')

<!-- End  -->

@endsection