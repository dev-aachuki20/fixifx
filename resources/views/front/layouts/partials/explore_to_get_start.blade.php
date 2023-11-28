@php
$section4 = $common->where('section_no', 4)->where('status', 1)->first();
@endphp
@if($section4)
<section class="OpenAPI-wrapper padding-tb-120" style="background-image: url({{$section4->image ? $section4->image : asset('fixifx/images/OpenAPI-bg.png') }});">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-sm-12">
                <div class="section-head text-center">
                    <h2 class="max-w-427">{{ $section4->{config('app.locale').'_title'} }}</h2>
                    <div class="discription">
                        <p>{!! $section4->{config('app.locale').'_desc'} !!}</p>
                    </div>
                    <div class="openAi-btn d-flex align-items-center justify-content-center">
                        <a href="{{ getSettingValue('live_link') }}" target="_blank" class="custom-btn fill-btn">{{__('message.open_account_btn')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif