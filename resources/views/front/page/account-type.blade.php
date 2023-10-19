@php
$keywords_jp = 'FiXi FX,フィクシー,口座タイプ,口座開設ボーナス';
$description_jp = 'FiXi FX（フィクシー）では、お客様のニーズに合わせて４種類の口座タイプから選択可能。登録ボーナスもご用意しています。';
@endphp

@extends('front.layouts.base')

@section('content')

@include('front.layouts.partials.common_hero')
<!-- account type sub section -->
@php
$ids =['116','117','118','119'];
$subsection = App\Models\SubSection::where('section_id', 305)->whereIn('id', $ids)->where('page_id', 0)->where('status', 1)->get();
@endphp

@if($subsection)
<section class="saxo-offering-sec bg-white padding-tb-120">
    <div class="container">
        <div class="row row-gap-24">
            @foreach($subsection as $key => $value)
            <div class="col-lg-3 col-md-6 col-12">
                <div class="saxo-offering-box">
                    <div class="saxo-offering-icon bg-light-gray">
                        <img src="{{ $value->image ? asset($value->image) : asset('fixifx/images/broker-slide.png') }}" alt="icon-1">
                    </div>
                    <div class="saxo-offering-text text-center">
                        <h6>{{ ucfirst($value->{config('app.locale').'_title'}) }}</h6>
                        <div class="saxo-offering-dis">
                            <p>{!! ucfirst($value->{config('app.locale').'_desc'}) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@include('front.layouts.partials.trading_wrapper')

<section class="accountFunding">
    <div class="container text-center">
        <div class="title">
            <h2>
                {{ __('message.accountFunding_msg') }}
            </h2>
        </div>
        <div class="accountFunding-btn d-flex align-items-center justify-content-center">
            <a href="{{ getSettingValue('live_link') }}" target="_blank" class="custom-btn fill-btn-1">{{ getSettingValue('foot_live_link_btn_'.config('app.locale')) }}</a>
            <a href="{{ getSettingValue('demo_link') }}" target="_blank" class="custom-btn fill-btn">{{ getSettingValue('demo_link_btn_'.config('app.locale')) }}</a>
        </div>
    </div>
</section>

<section class="auto-fix-wrapper padding-tb-120 bg-snow-drift">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="auto-fixi-img-box">
                    <img src="{{asset('fixifx/images/auto-fixi.png')}}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="auto-content">
                    <div class="auto-fixi-title">
                        <h2>
                            {{ __('message.move_between_tiers') }}
                        </h2>
                    </div>
                    <div class="auto-fixi-text">
                        <p>{{ __('message.move_between_tiers_para1') }}</p>
                        <p>{{ __('message.move_between_tiers_para2') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="expert-support-wrapper tradingBenefits-wrapper tradingBenefits-bg side-by-side padding-tb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="side-by-side-img">
                    <img src="{{asset('fixifx/images/expert-support01.png')}}" alt="tradergo">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                @php $header = $section->where('section_no', 1)->first() @endphp
                @if($header)
                <div class="expert-support-head">
                    <h2 class="max-w-427">{{ $header->{config('app.locale').'_title'} }}</h2>
                    <div class="discription">
                        <p> {!! $header->{config('app.locale').'_desc'} !!}</p>
                    </div>
                </div>
                @endif
                <div class="expert-content">
                    <div class="accordion" id="accordionexpert">
                        @if(isset($faqs[""]) && count($faqs[""]))
                        @foreach($faqs[""] as $key => $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button @if($key != 0){{ 'collapsed' }}@endif" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{$key}}" aria-expanded="{{ $key == 0 ? 'true' : 'false' }}" aria-controls="faq{{$key}}">
                                    {{ $faq->{config('app.locale').'_question'} }}
                                </button>
                            </h2>
                            <div id="faq{{$key}}" class="accordion-collapse collapse @if($key == 0){{ 'show' }}@endif" data-bs-parent="#accordionexpert">
                                <div class="accordion-body">
                                    {!! $faq->{config('app.locale').'_answer'} !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-gradient-dark side-by-side padding-tb-120 fiXiTrader_box2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="side-by-side-img">
                    <img src="{{asset('fixifx/images/tradergo.png')}}" alt="laptop">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="section-head text-white">
                    <h2 class="max-w-427 text-white"> {{ __('message.fixi_account_title') }}</h2>
                    <div class="discription">
                        <p> {{ __('message.fixi_account_desc') }}</p>
                    </div>
                    <div class="button-group">
                        <a href="{{ getSettingValue('demo_link') }}" class="custom-btn fill-btn text-white">{{ __('message.create_account') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- faq-sub-page  -->
<section class="faq-sub-page padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-xl-7 align-items-center justify-content-center text-center pb-5">
                @php
                $sectionData = App\Models\Section::where('id', 31)->where('status', 1)->first();
                @endphp
                @if($sectionData)
                <div class="title">
                    <h2>
                        {{ $sectionData->{config('app.locale').'_title'} }}
                    </h2>
                </div>
                <div class="description">
                    {!! $sectionData->{config('app.locale').'_desc'} !!}
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="faqTab-content p-0">
                    @php
                    $faqData = App\Models\Faq::where('section_id', 31)->where('section_no', 3)->get();
                    @endphp
                    @if($faqData)
                    <div class="accordion faqAccordion" id="accordionExample">
                        @foreach($faqData as $index => $faqItem)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                    <img class="img-fluid" src="{{asset('fixifx/images/faq-q.svg')}}" alt="">
                                    {{ $faqItem->{config('app.locale').'_question'} }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="description">
                                        {!! $faqItem->{config('app.locale').'_answer'} !!}
                                    </div>
                                    @include('front.layouts.partials.social_share')
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end faq-sub-page  -->
@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        $(".showDetails-more").click(function() {
            var $wrapper = $('.showMore-wrapper');
            if ($wrapper.hasClass("showDetails-height")) {
                $(".showDetails-more").text("{{__('message.show_less')}}");
            } else {
                $(".showDetails-more").text("{{__('message.show_more')}}");
            }
            $wrapper.toggleClass("showDetails-height");
        });
    });
</script>


<!-- <script>
    setTimeout(function() {
        $('.section_table table').addClass('uk-table uk-table-striped uk-text-center');
        $('#acc_small_table').addClass('uk-table uk-table-middle uk-table-striped uk-table-small mb-0');
    }, 100)
</script> -->
@endsection