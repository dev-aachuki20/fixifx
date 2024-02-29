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

@include('front.layouts.partials.get_started')

@endsection


@section('javascript')
@parent
<script>
    $(document).on('click', '.ss-btn-share', function(e) {
        e.preventDefault();
        if (navigator.share) {
            navigator.share({
                    url: this.getAttribute("data-ss-link")
                }).then(() => {
                    console.log('Thanks for sharing!');
                })
                .catch(console.error);
        } else {
            console.log('This brownser dont support native web share!');
        }
    });
</script>
@endsection