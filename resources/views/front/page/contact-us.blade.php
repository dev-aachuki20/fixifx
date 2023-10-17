@php
if(config('app.locale') == 'ja'){
$description_jp = 'FiXi FX（フィクシー）のお問い合わせページ。各部門のチャットサポートやコンタクト･フォームにてお問い合わせいただけます。';
$keywords_jp = 'FiXi FX,フィクシー,お問い合わせ,コンタクト';
}

function flagTextJP($target){
if($target == 'USD'){
$target = 'アメリカドル';
}else if($target == 'JPY'){
$target = '日本円';
}else if($target == 'EUR'){
$target = 'ユーロ';
}else if($target == 'GBP'){
$target = 'ポンド';
}else if($target == 'AUD'){
$target = 'オーストラリア･ドル';
}else if($target == 'NZD'){
$target = 'ニュージーランド･ドル';
}else if($target == 'CAD'){
$target = 'カナダ･ドル';
}else if($target == 'CHF'){
$target = 'スイス･フラン';
}else if($target == 'CNY'){
$target = '中国人民元';
}else{
$target = '通貨国旗';
}
return $target;
}
@endphp

@extends('front.layouts.base')

@section('content')

@include('front.layouts.partials.common_hero')


<section class="padding-tb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="section-head text-center">
                    <h2>{{__('message.contact_details')}}</h2>
                    <div class="discription">
                        <p>{{__('message.contact_desc')}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-gap-24">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="contact-loaction">
                    <div class="loaction-flag">
                        <img src="{{asset('fixifx/images/flags/ba.png')}}" alt="ba">
                    </div>
                    <h6 class="text-center">Bahamas</h6>
                    <ul>
                        <li class="d-flex align-items-start">
                            <div class="icons-loaction">
                                <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.75 6.875C13.75 11.8333 7.375 16.0833 7.375 16.0833C7.375 16.0833 1 11.8333 1 6.875C1 5.18425 1.67165 3.56274 2.86719 2.36719C4.06274 1.17165 5.68424 0.5 7.375 0.5C9.06575 0.5 10.6873 1.17165 11.8828 2.36719C13.0783 3.56274 13.75 5.18425 13.75 6.875Z" stroke="#1E1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M7.375 8.75C8.5486 8.75 9.5 7.7986 9.5 6.625C9.5 5.45139 8.5486 4.5 7.375 4.5C6.20139 4.5 5.25 5.45139 5.25 6.625C5.25 7.7986 6.20139 8.75 7.375 8.75Z" stroke="#1E1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="loactiop-de">Fixi BankItaliëlei 124, box 10120 00 Antwerp, Bahamas</div>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="d-flex align-items-center">
                                <div class="icons-loaction">
                                    <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.41667 1H13.75C14.5292 1 15.1667 1.6375 15.1667 2.41667V10.9167C15.1667 11.6958 14.5292 12.3333 13.75 12.3333H2.41667C1.6375 12.3333 1 11.6958 1 10.9167V2.41667C1 1.6375 1.6375 1 2.41667 1Z" stroke="#1E1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M15.1667 2.41669L8.08333 7.37502L1 2.41669" stroke="#1E1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="loactiop-de">dummy@fixibank.com</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="contact-loaction">
                    <div class="loaction-flag">
                        <img src="{{asset('fixifx/images/flags/se.png')}}" alt="ba">
                    </div>
                    <h6 class="text-center">Seychelles</h6>
                    <ul>
                        <li class="d-flex align-items-start">
                            <div class="icons-loaction">
                                <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.75 6.875C13.75 11.8333 7.375 16.0833 7.375 16.0833C7.375 16.0833 1 11.8333 1 6.875C1 5.18425 1.67165 3.56274 2.86719 2.36719C4.06274 1.17165 5.68424 0.5 7.375 0.5C9.06575 0.5 10.6873 1.17165 11.8828 2.36719C13.0783 3.56274 13.75 5.18425 13.75 6.875Z" stroke="#1E1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M7.375 8.75C8.5486 8.75 9.5 7.7986 9.5 6.625C9.5 5.45139 8.5486 4.5 7.375 4.5C6.20139 4.5 5.25 5.45139 5.25 6.625C5.25 7.7986 6.20139 8.75 7.375 8.75Z" stroke="#1E1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="loactiop-de">Fixi BankItaliëlei 124, box 10120 00 Antwerp, Bahamas</div>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="d-flex align-items-center">
                                <div class="icons-loaction">
                                    <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.41667 1H13.75C14.5292 1 15.1667 1.6375 15.1667 2.41667V10.9167C15.1667 11.6958 14.5292 12.3333 13.75 12.3333H2.41667C1.6375 12.3333 1 11.6958 1 10.9167V2.41667C1 1.6375 1.6375 1 2.41667 1Z" stroke="#1E1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M15.1667 2.41669L8.08333 7.37502L1 2.41669" stroke="#1E1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="loactiop-de">dummy@fixibank.com</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="contact-loaction">
                    <div class="loaction-flag">
                        <img src="{{asset('fixifx/images/flags/vi.png')}}" alt="ba">
                    </div>
                    <h6 class="text-center">Vietnam</h6>
                    <ul>
                        <li class="d-flex align-items-start">
                            <div class="icons-loaction">
                                <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.75 6.875C13.75 11.8333 7.375 16.0833 7.375 16.0833C7.375 16.0833 1 11.8333 1 6.875C1 5.18425 1.67165 3.56274 2.86719 2.36719C4.06274 1.17165 5.68424 0.5 7.375 0.5C9.06575 0.5 10.6873 1.17165 11.8828 2.36719C13.0783 3.56274 13.75 5.18425 13.75 6.875Z" stroke="#1E1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M7.375 8.75C8.5486 8.75 9.5 7.7986 9.5 6.625C9.5 5.45139 8.5486 4.5 7.375 4.5C6.20139 4.5 5.25 5.45139 5.25 6.625C5.25 7.7986 6.20139 8.75 7.375 8.75Z" stroke="#1E1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="loactiop-de">Fixi BankItaliëlei 124, box 10120 00 Antwerp, Bahamas</div>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="d-flex align-items-center">
                                <div class="icons-loaction">
                                    <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.41667 1H13.75C14.5292 1 15.1667 1.6375 15.1667 2.41667V10.9167C15.1667 11.6958 14.5292 12.3333 13.75 12.3333H2.41667C1.6375 12.3333 1 11.6958 1 10.9167V2.41667C1 1.6375 1.6375 1 2.41667 1Z" stroke="#1E1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M15.1667 2.41669L8.08333 7.37502L1 2.41669" stroke="#1E1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="loactiop-de">dummy@fixibank.com</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="contact-loaction">
                    <div class="loaction-flag">
                        <img src="{{asset('fixifx/images/flags/can.png')}}" alt="ba">
                    </div>
                    <h6 class="text-center">Canada</h6>
                    <ul>
                        <li class="d-flex align-items-start">
                            <div class="icons-loaction">
                                <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.75 6.875C13.75 11.8333 7.375 16.0833 7.375 16.0833C7.375 16.0833 1 11.8333 1 6.875C1 5.18425 1.67165 3.56274 2.86719 2.36719C4.06274 1.17165 5.68424 0.5 7.375 0.5C9.06575 0.5 10.6873 1.17165 11.8828 2.36719C13.0783 3.56274 13.75 5.18425 13.75 6.875Z" stroke="#1E1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M7.375 8.75C8.5486 8.75 9.5 7.7986 9.5 6.625C9.5 5.45139 8.5486 4.5 7.375 4.5C6.20139 4.5 5.25 5.45139 5.25 6.625C5.25 7.7986 6.20139 8.75 7.375 8.75Z" stroke="#1E1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="loactiop-de">Fixi BankItaliëlei 124, box 10120 00 Antwerp, Bahamas</div>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="d-flex align-items-center">
                                <div class="icons-loaction">
                                    <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.41667 1H13.75C14.5292 1 15.1667 1.6375 15.1667 2.41667V10.9167C15.1667 11.6958 14.5292 12.3333 13.75 12.3333H2.41667C1.6375 12.3333 1 11.6958 1 10.9167V2.41667C1 1.6375 1.6375 1 2.41667 1Z" stroke="#1E1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M15.1667 2.41669L8.08333 7.37502L1 2.41669" stroke="#1E1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="loactiop-de">dummy@fixibank.com</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="padding-tb-120 bg-snow-drift" style="background-image:url({{asset('fixifx/images/bg-glob.png')}});background-repeat: no-repeat; background-position: bottom left;">
    <div class="container">
        <div class="bg-white contact-information-inner">
            <div class="contact-information-left">
                @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                @if($section2)
                <h4>{{ $section2->{config('app.locale').'_title'} }}</h4>
                <div class="contact-info-inner">
                    <ul>
                        <li>
                            <a href="tel:+01-1234567890" class="d-flex align-items-center">
                                <div class="icon-contact">
                                    <img src="{{asset('fixifx/images/icons/telephone.svg')}}" alt="telephone">
                                </div>
                                <div class="icon-info">
                                    <span class="d-block">{{__('message.call_us')}}</span>
                                    {{ getSettingValue('admin_contact') }}
                                </div>
                            </a>
                        </li>
                        @foreach($contacts as $contact)
                        <li>
                            <a href="mailto:support@prexmarkets.com" class="d-flex align-items-center">
                                <div class="icon-contact">
                                    <img src="{{asset('fixifx/images/icons/email.svg')}}" alt="eamil">
                                </div>
                                <div class="icon-info">
                                    <span class="d-block">{{ $contact->{config('app.locale').'_title'} }}</span>
                                    {{ $contact->value }}
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <!-- contact form -->
            @include('front.common.talk_to_us')
            <!-- end contact form -->

        </div>
    </div>
</section>


@include('front.layouts.partials.get_started')


@endsection


@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    //add alt-attr to <img> by captcha
    window.addEventListener('DOMContentLoaded', altToCaptcha);

    function altToCaptcha() {
        let captchaImgWrap = document.querySelectorAll('.captcha.ml-2')[0];
        let captchaImgTag = captchaImgWrap.getElementsByTagName('img')[0];
        captchaImgTag.setAttribute('alt', '{{ config("app.locale ") == "ja " ? " 認証用画像 " : "captcha - image " }}');
    }

    $(".refresh-cpatcha").click(function() {
        $.ajax({
            type: 'GET',
            url: "{{route('refresh_captcha')}}",
            success: function(data) {
                $(".captcha").html(data.captcha);
            }
        });
    });

    $('#contact_btn').on('click', function() {
        $('.error').html("");
        $.ajax({
            type: 'POST',
            url: "{{route('contact_us')}}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: $('#contact_form').serialize(),
            success: function(data) {
                if (data) {
                    success = msg = "";
                    if ('{{config("app.locale")}}' == 'en') {
                        msg = 'Your submission has been sent.';
                        success = 'Thank You !';
                    } else {
                        msg = '提出物が送信されました';
                        success = 'ありがとうございました';
                    }
                    swal(
                        success,
                        msg,
                        'success'
                    );
                    $('#contact_form').trigger("reset");
                    $('.error').remove();
                }
            },
            error: function(data) {
                if (data.status === 422) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors.errors, function(key, value) {
                        $('#contact_form').find('input[name=' + key + '], textarea[name=' + key + '], select[name=' + key + ']').after('<span class="error" style="color: red;">' + value + '</span>');
                    });
                }
            }
        });
    })
</script>
@endsection