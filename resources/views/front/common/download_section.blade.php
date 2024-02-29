@if($slug == 'ctrader-android' || $slug == 'ctrader-desktop' || $slug == 'ctrader-ios' || $slug == 'ctrader-web')
@php
$section5 = $common->where('section_no', 5)->first();
$sectionEnLink5 = $section5 ? json_decode($section5->en_link) : null;
$sectionJaLink5 = $section5 ? json_decode($section5->ja_link) : null;
@endphp
@if($section5)
<div class="col-12">
    <div class="download-social-trade">
        <div class="title">
            <h5>
                {{ $section5->{config('app.locale').'_title'} }}
            </h5>
        </div>
        <div class="social-platform">
            <ul>
                @if(config('app.locale') == 'en')
                <li>
                    <a href="{{ isset($sectionEnLink5[1]) ? $sectionEnLink5[1] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/windows.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - Windowsデスクトップ版' : 'Meta Trader 5 (MT5) - Windows Desktop' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ isset($sectionEnLink5[2]) ? $sectionEnLink5[2] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/play-store.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - Android版' : 'Meta Trader 5 (MT5) - Android' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ isset($sectionEnLink5[3]) ? $sectionEnLink5[3] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/safari.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - iOS版' : 'Meta Trader 5 (MT5) - iOS' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ isset($sectionEnLink5[4]) ? $sectionEnLink5[4] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/web.svg')}}" alt="">
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ isset($sectionJaLink5[1]) ? $sectionJaLink5[1] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/windows.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - Windowsデスクトップ版' : 'Meta Trader 5 (MT5) - Windows Desktop' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ isset($sectionJaLink5[2]) ? $sectionJaLink5[2] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/play-store.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - Android版' : 'Meta Trader 5 (MT5) - Android' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ isset($sectionJaLink5[3]) ? $sectionJaLink5[3] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/safari.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - iOS版' : 'Meta Trader 5 (MT5) - iOS' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ isset($sectionJaLink5[4]) ? $sectionJaLink5[4] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/web.svg')}}" alt="">
                    </a>
                </li>
                @endif
            </ul>
        </div>

        <div class="download-platform">
            @if(config('app.locale') == 'en')
            <a href="{{ isset($sectionEnLink5[0]) ? $sectionEnLink5[0] : '#' }}" target="_blank" class="custom-btn fill-btn">{{__('message.download_platform_guide', [], config('app.locale'))}}</a>
            @else
            <a href="{{ isset($sectionJaLink5[0]) ? $sectionJaLink5[0] : '#' }}" target="_blank" class="custom-btn fill-btn">{{__('message.download_platform_guide', [], config('app.locale'))}}</a>
            @endif
        </div>


        <div class="subtext">
            <span>
                {!! $section5->{config('app.locale').'_desc'} !!}
            </span>
        </div>
    </div>
</div>
@endif
@endif

@if($slug == 'mt5-client-desktop' || $slug == 'mt5-mac-os-trader' || $slug == 'mt5-iphone-trader' || $slug == 'mt5-android-trader')
@php
$section6 = $common->where('section_no', 6)->first();
$sectionEnLink6 = $section6 ? json_decode($section6->en_link) : null;
$sectionJaLink6 = $section6 ? json_decode($section6->ja_link) : null;
@endphp
@if($section6)
<div class="col-12">
    <div class="download-social-trade">
        <div class="title">
            <h5>
                {{ $section6->{config('app.locale').'_title'} }}
            </h5>
        </div>
        <div class="social-platform">
            <ul>
                @if(config('app.locale') == 'en')
                <li>
                    <a href="{{ isset($sectionEnLink6[1]) ? $sectionEnLink6[1] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/windows.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - Windowsデスクトップ版' : 'Meta Trader 5 (MT5) - Windows Desktop' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ isset($sectionEnLink6[2]) ? $sectionEnLink6[2] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/play-store.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - Android版' : 'Meta Trader 5 (MT5) - Android' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ isset($sectionEnLink6[3]) ? $sectionEnLink6[3] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/safari.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - iOS版' : 'Meta Trader 5 (MT5) - iOS' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ isset($sectionEnLink6[4]) ? $sectionEnLink6[4] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/web.svg')}}" alt="">
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ isset($sectionJaLink6[1]) ? $sectionJaLink6[1] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/windows.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - Windowsデスクトップ版' : 'Meta Trader 5 (MT5) - Windows Desktop' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ isset($sectionJaLink6[2]) ? $sectionJaLink6[2] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/play-store.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - Android版' : 'Meta Trader 5 (MT5) - Android' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ isset($sectionJaLink6[3]) ? $sectionJaLink6[3] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/safari.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - iOS版' : 'Meta Trader 5 (MT5) - iOS' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ isset($sectionJaLink6[4]) ? $sectionJaLink6[4] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/web.svg')}}" alt="">
                    </a>
                </li>
                @endif
            </ul>
        </div>

        <div class="download-platform">
            @if(config('app.locale') == 'en')
            <a href="{{ isset($sectionEnLink6[0]) ? $sectionEnLink6[0] : '#' }}" target="_blank" class="custom-btn fill-btn">{{__('message.download_platform_guide', [], config('app.locale'))}}</a>
            @else
            <a href="{{ isset($sectionJaLink6[0]) ? $sectionJaLink6[0] : '#' }}" target="_blank" class="custom-btn fill-btn">{{__('message.download_platform_guide', [], config('app.locale'))}}</a>
            @endif
        </div>


        <div class="subtext">
            <span>
                {!! $section6->{config('app.locale').'_desc'} !!}
            </span>
        </div>
    </div>
</div>
@endif
@endif


@if($slug == 'advan-trade')
@php
$section7 = $common->where('section_no', 7)->first();
$sectionEnLink7 = $section7 ? json_decode($section7->en_link) : null;
$sectionJaLink7 = $section7 ? json_decode($section7->ja_link) : null;
@endphp
@if($section7)
<div class="col-12">
    <div class="download-social-trade">
        <div class="title">
            <h5>
                {{ $section7->{config('app.locale').'_title'} }}
            </h5>
        </div>
        <div class="social-platform">
            <ul>
                @if(config('app.locale') == 'en')
                <li>
                    <a href="{{ isset($sectionEnLink7[1]) ? $sectionEnLink7[1] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/windows.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - Windowsデスクトップ版' : 'Meta Trader 5 (MT5) - Windows Desktop' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ isset($sectionEnLink7[2]) ? $sectionEnLink7[2] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/play-store.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - Android版' : 'Meta Trader 5 (MT5) - Android' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ isset($sectionEnLink7[3]) ? $sectionEnLink7[3] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/safari.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - iOS版' : 'Meta Trader 5 (MT5) - iOS' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ isset($sectionEnLink7[4]) ? $sectionEnLink7[4] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/web.svg')}}" alt="">
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ isset($sectionJaLink7[1]) ? $sectionJaLink7[1] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/windows.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - Windowsデスクトップ版' : 'Meta Trader 5 (MT5) - Windows Desktop' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ isset($sectionJaLink7[2]) ? $sectionJaLink7[2] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/play-store.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - Android版' : 'Meta Trader 5 (MT5) - Android' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ isset($sectionJaLink7[3]) ? $sectionJaLink7[3] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/safari.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - iOS版' : 'Meta Trader 5 (MT5) - iOS' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ isset($sectionJaLink7[4]) ? $sectionJaLink7[4] : '#' }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/web.svg')}}" alt="">
                    </a>
                </li>
                @endif
            </ul>
        </div>

        <div class="download-platform">
            @if(config('app.locale') == 'en')
            <a href="{{ isset($sectionEnLink7[0]) ? $sectionEnLink7[0] : '#' }}" target="_blank" class="custom-btn fill-btn">{{__('message.download_platform_guide', [], config('app.locale'))}}</a>
            @else
            <a href="{{ isset($sectionJaLink7[0]) ? $sectionJaLink7[0] : '#' }}" target="_blank" class="custom-btn fill-btn">{{__('message.download_platform_guide', [], config('app.locale'))}}</a>
            @endif
        </div>


        <div class="subtext">
            <span>
                {!! $section7->{config('app.locale').'_desc'} !!}
            </span>
        </div>
    </div>
</div>
@endif
@endif


























































{{--<div class="uk-flex uk-flex-middle uk-flex-between flex-wrap uk-margin-medium-bottom uk-background-muted p-3 uk-border-rounded">
    <div class="platform-download-icon">
        <a href="{{ route('page', [config('app.locale'), 'mt5-client-desktop']) }}"> <img loading="lazy" src="{{asset('front/img/window_svg_.svg')}}" class="" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - Windowsデスクトップ版' : 'Meta Trader 5 (MT5) - Windows Desktop' }}" loading="lazy"></a>



<a href="{{ route('page', [config('app.locale'), 'mt5-mac-os-trader']) }}"><img src="{{asset('front/img/apple_svg_.svg')}}" class="ml-2 ml-xl-3" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - macOS版' : 'Meta Trader 5 (MT5) - macOS' }}" loading="lazy"></a>

<a href="{{ route('page', [config('app.locale'), 'mt5-iphone-trader']) }}"><img src="{{asset('front/img/ios_svg_.svg')}}" class="ml-2 ml-xl-3" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - iOS版' : 'Meta Trader 5 (MT5) - iOS' }}" loading="lazy"></a>




<a href="{{ route('page', [config('app.locale'), 'mt5-android-trader']) }}"><img src="{{asset('front/img/android_svg_.svg')}}" class="ml-2 ml-xl-3" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - Android版' : 'Meta Trader 5 (MT5) - Android' }}" loading="lazy"></a>
</div>
<a href="#" class="uk-button uk-button-dark uk-border-rounded mt-2 mt-sm-0">{{__('message.download', [], config('app.locale'))}}</a>
</div> --}}