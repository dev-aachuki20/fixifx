@php
    if(config('app.locale') == 'ja'){
        $description_jp = 'FiXi FX（フィクシー）は業界最狭水準に狭いスプレッドが魅力のFX海外口座。NDD方式（A-book）でcTraderを採用。';
        $keywords_jp = 'FX,海外口座,スプレッド,狭い';
        $home_title_ja = 'FiXi FX（フィクシー）｜スプレッドが狭いFX海外口座';
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

    @include('front.layouts.partials.home_hero')

    @include('front.layouts.partials.trading_wrapper')
    
    @include('front.layouts.partials.about_fixifx')
    
    @include('front.layouts.partials.global_financial')
    
    @include('front.layouts.partials.forex_trading_platforms')
    
    @include('front.layouts.partials.trading_benefits')

    @include('front.layouts.partials.get_started')
    
    @include('front.layouts.partials.login_popup')
    
@endsection

@section('javascript')
@parent
<script>
$(document).ready(function () {
    $(".showDetails-more").click(function () {
      var $wrapper =$('.showMore-wrapper');
      if($wrapper.hasClass("showDetails-height")) {
        $(".showDetails-more").text("{{__('message.show_less')}}");
      } else {
        $(".showDetails-more").text("{{__('message.show_more')}}");
      }
      $wrapper.toggleClass("showDetails-height");
    });
});
</script>


@endsection