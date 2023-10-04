@if(isset($common))
@php $section1 = $common->where('section_no', 1)->first() @endphp
@if($section1 && $section1->{config('app.locale').'_title'})
<div class="uk-section uk-padding-large uk-padding-remove-top in-padding-large-vertical@s">
    <div class="uk-container">
        <div class="" data-uk-grid>
            <div class="uk-width-1-1@m uk-text-center">
                <h2>{{ $section1->{config('app.locale').'_title'} }}</h2>
                <div class="title_divider_dot mx-auto"></div>
                <p>{!! $section1->{config('app.locale').'_desc'} !!}</p>
                <!-- <i class="fas fa-chevron-down uk-text-primary"></i> -->
            </div>
            @if(count($section1->subSection))
            <div class="uk-grid-divider uk-child-width-1-3@m uk-child-width-1-2@s trading_start_guide" data-uk-grid>
                @foreach($section1->subSection as $k => $sub_sec)
                    @php
                        $common_section_icon_alt = '';
                        if($k == 0){
                            if(config('app.locale') == 'ja'){
                                $common_section_icon_alt = 'スプレッドが狭いFX海外口座 - FiXi FX（フィクシー）';
                            }else{
                                $common_section_icon_alt = 'start trading on FiXi FX';
                            }
                        }else if($k == 1){
                            if(config('app.locale') == 'ja'){
                                $common_section_icon_alt = 'NDD方式(A-book)の海外口座 - FiXi FX（フィクシー）';
                            }else{
                                $common_section_icon_alt = 'NDD(A-book) - FiXi FX';
                            }
                        }else if($k == 2){
                            if(config('app.locale') == 'ja'){
                                $common_section_icon_alt = 'cTraderでコピー取引 - FiXi FX（フィクシー）';
                            }else{
                                $common_section_icon_alt = 'copy trading widh cTrader - FiXi FX';
                            }
                        }
                    @endphp
                    @if($sub_sec->{config('app.locale').'_title'})
                    <div class="step_info_box">
                        <div class="step_info_count">{{ ($k + 1) }}</div>
                        <div class="info_icon_bg ml-0 icon_sm"><img src="{{ asset('front/img/icons/page-icon/MT4-Client-Desktop/'.$sub_sec->icon) }}" class="page_icon" alt="{{$common_section_icon_alt}}" loading="lazy"></div>
                        <h3 class="uk-margin-top  mt-4">{{ $sub_sec->{config('app.locale').'_title'} }}</h3>
                        <p>{!! $sub_sec->{config('app.locale').'_desc'} !!}</p>
                    </div>   
                    @endif 
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
@endif
@endif

<!--<div class="uk-text-center" style="margin: 2rem;">-->
<!--    <div class="in-slideshow-button">-->
<!--        <a href="{{ getSettingValue('live_link') }}" class="uk-button uk-button-primary uk-border-rounded uk-margin-small-right my-1">{{ getSettingValue('live_link_btn_'.config('app.locale')) }}</a>-->
<!--        <a href="{{ getSettingValue('demo_link') }}" class="uk-button uk-button-default uk-border-rounded my-1">{{ getSettingValue('demo_link_btn_'.config('app.locale')) }}</a>-->
<!--    </div>-->
<!--</div>-->