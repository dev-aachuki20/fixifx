@php

$section30 = $common->where('section_no', 30)->first();

@endphp

@if($section30)

@php $menu_page = App\Models\MenuPage::where('menu_id', 2)->get(); @endphp

<div class="discover-platform-box ptb-50">

  <div class="row justify-content-center">

    <div class="col-lg-12 col-md-12 col-sm-12 justify-content-center text-center">

      <div class="text-center justify-content-center d-flex">

        <h2 class="max-w-427 text-center">{{ $section30->{config('app.locale').'_title'} }}</h2>

      </div>

    </div>

  </div>

  @if(count($section30->subSection))

  <div class="row mt-md-5 pt-3">

    @foreach($section30->subSection->where('status', 1)->where('page_id', -1) as $key => $value)

    <div class="col-12 col-md-6 col-lg-6">

      <div class="platforms-box">

        <div class="title">

          <h5>

            {{ $value->{config('app.locale').'_title'} }}

          </h5>

        </div>

        <div class="imgbox">

          <img class="img-fluid" src="{{$value->image ? $value->image : asset('fixifx/images/platforms01.png')}}" alt="{{ config('app.locale') == 'ja' ? 'プラットフォーム' : 'Platforms' }}">

        </div>

        @if(config('app.locale') == 'en')

        <div class="readmore-btn">

          <a href="{{isset($value->en_link) ? $value->en_link : '#'}}" class="custom-btn fill-btn text-white">{{__('message.learn_more_btn')}}</a>

        </div>

        @else

        <div class="readmore-btn">

          <a href="{{isset($value->ja_link) ? $value->ja_link : '#'}}" class="custom-btn fill-btn text-white">{{__('message.learn_more_btn')}}</a>

        </div>

        @endif

      </div>

    </div>

    @endforeach

  </div>

  @endif

</div>

@endif

<!-- end  -->