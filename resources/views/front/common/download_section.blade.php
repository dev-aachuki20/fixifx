<div class="col-12">
    <div class="download-social-trade">
        <div class="title">
            <h5>
                {{__('message.download', [], config('app.locale'))}}
            </h5>
        </div>
        <div class="social-platform">
            <ul>
                <li>
                    <a href="{{ route('page', [config('app.locale'), 'mt5-client-desktop']) }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/windows.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - Windowsデスクトップ版' : 'Meta Trader 5 (MT5) - Windows Desktop' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ route('page', [config('app.locale'), 'mt5-android-trader']) }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/play-store.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - Android版' : 'Meta Trader 5 (MT5) - Android' }}">
                    </a>
                </li>
                <li>
                    <a href="{{ route('page', [config('app.locale'), 'mt5-iphone-trader']) }}">
                        <img class="img-fluid" src="{{asset('fixifx/images/safari.svg')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - iOS版' : 'Meta Trader 5 (MT5) - iOS' }}">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img class="img-fluid" src="{{asset('fixifx/images/web.svg')}}" alt="">
                    </a>
                </li>
            </ul>
        </div>

        @if($slug == "advan-trade")
        <div class="download-platform">
            <a href="javascript:void();" class="custom-btn fill-btn">{{__('message.download_platform_guide', [], config('app.locale'))}}</a>
        </div>
        <div class="subtext">
            <span>
                {{__('message.support_six_screen', [], config('app.locale'))}}
            </span>
        </div>
        @endif
    </div>
</div>

{{--<div class="uk-flex uk-flex-middle uk-flex-between flex-wrap uk-margin-medium-bottom uk-background-muted p-3 uk-border-rounded">
    <div class="platform-download-icon">
        <a href="{{ route('page', [config('app.locale'), 'mt5-client-desktop']) }}"> <img loading="lazy" src="{{asset('front/img/window_svg_.svg')}}" class="" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - Windowsデスクトップ版' : 'Meta Trader 5 (MT5) - Windows Desktop' }}" loading="lazy"></a>



<a href="{{ route('page', [config('app.locale'), 'mt5-mac-os-trader']) }}"><img src="{{asset('front/img/apple_svg_.svg')}}" class="ml-2 ml-xl-3" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - macOS版' : 'Meta Trader 5 (MT5) - macOS' }}" loading="lazy"></a>

<a href="{{ route('page', [config('app.locale'), 'mt5-iphone-trader']) }}"><img src="{{asset('front/img/ios_svg_.svg')}}" class="ml-2 ml-xl-3" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - iOS版' : 'Meta Trader 5 (MT5) - iOS' }}" loading="lazy"></a>




<a href="{{ route('page', [config('app.locale'), 'mt5-android-trader']) }}"><img src="{{asset('front/img/android_svg_.svg')}}" class="ml-2 ml-xl-3" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) - Android版' : 'Meta Trader 5 (MT5) - Android' }}" loading="lazy"></a>
</div>
<a href="#" class="uk-button uk-button-dark uk-border-rounded mt-2 mt-sm-0">{{__('message.download', [], config('app.locale'))}}</a>
</div> --}}