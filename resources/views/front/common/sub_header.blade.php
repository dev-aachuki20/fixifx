@php $header = $section->where('section_no', 1)->first() @endphp
@if($header)
<div class="col-12 col-md-12 col-sm-12 text-center">
    <h1>{{ $header->{config('app.locale').'_title'} }}</h1>
    <div class="section-head">
        <div class="discription">
            <p>
                {!! $header->{config('app.locale').'_desc'} !!}
            </p>
        </div>
    </div>
    <div class="openAi-btn d-flex align-items-center justify-content-center">
        <a href="javascript:void();" class="custom-btn fill-btn-1">{{__('message.preview_platform_btn')}}</a>
        <a href="{{ getSettingValue('live_link') }}" target="_blank" class="custom-btn fill-btn">{{__('message.open_account_btn')}}</a>
    </div>
</div>

<!--  main image  -->
<div class="col-12 col-md-12 col-sm-12 text-center">
    <div class="imgbox">
        <a href="javascript:void(0);">
            <img class="img-fluid" src="{{$header && $header->image ? $header->image : asset('fixifx/images/Platforms-01.png')}}" alt="{{ config('app.locale') == 'ja' ? 'Meta Trader 5 (MT5) Windows版 - FiXi FX（フィクシー）' : 'Meta Trader 5 (MT5) Windows - FiXi FX' }}">
        </a>
    </div>
</div>
@endif



{{-- @php $header = $section->where('section_no', 1)->first() @endphp

@if($header)
<div class="col-lg-6 col-sm-12">
    <div class="section-head">
        <h2 class="max-w-427">{{ $header->{config('app.locale').'_title'} }}</h2>
<div class="discription">
    {!! $header->{config('app.locale').'_desc'} !!}
</div>
</div>
</div>
@endif --}}