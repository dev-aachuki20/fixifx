@php
    $keywords_jp = 'FX,外国為替,経済カレンダー,FXカレンダー';
    $description_jp = '外国為替経済カレンダーは、FXトレーダーが市場を動かす可能性のある重要なイベントを追跡するための便利なツールです。';
@endphp

@extends('front.layouts.master')

@section('content') 
    
        @include('front.common.page_header')
        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid">
                    @include('front.common.side_section')
                    <div class="uk-width-2-3@m">
                        <div class="inner-content">
                            @include('front.common.sub_header')
                            <!-- <hr class="my-4"> -->
                            @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                            <div class="inner-features-wrap">
                                @if($section2)
                                {!! $section2->{config('app.locale').'_desc'} !!}
                                @endif
                                <div class="uk-card economic-calendar uk-card-default uk-card-body uk-border-rounded p-2 mb-4">
                                    <!--<iframe src="https://www.tradays.com/{{config('app.locale')}}/economic-calendar/widget?dateFormat=&utm_source=demo.imagetowebpage.com" allowfullscreen uk-responsive uk-video="automute: true" frameborder="0" title="{{ config('app.locale') == 'ja' ? '経済カレンダー - FiXi FX（フィクシー）' : 'economic calendar - FiXi FX' }}"></iframe>-->
                                        
                                        @php
                                        $loc = Config::get('app.locale');
                                        $key = 'N1X9fwc70lir5rBSd0g1ND9N';
                                        $baseURL = "https://site.recognia.com/fixi/serve.shtml?tkn=";
                                        $token = "page=economic_calendar";
                                        $token .= "&usi=testUser";
                                        $token .= "&aci=" . gmdate("YmdHis");
                                        $token .= "&lang=$loc";
                                        if ($m = strlen($token)%8)
                                           $token .= str_repeat("\x00",  8 - $m);
                                           $url = $baseURL . urlencode(openssl_encrypt($token, "DES-EDE3", $key, OPENSSL_ZERO_PADDING));
                                        @endphp

                                        <iframe style="width:100%" id="tradingcentral" src="@php echo $url; @endphp"></iframe>
                                        <script language="javascript">iFrameResize();</script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection