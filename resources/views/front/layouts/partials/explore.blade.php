@php
$section3 = $common->where('section_no', 3)->where('status', 1)->first();
$sectionEnLink3 = $section3 ? json_decode($section3->en_link) : null;
$sectionJaLink3 = $section3 ? json_decode($section3->ja_link) : null;
@endphp
@if($section3)
<section class="OpenAPI-wrapper padding-tb-120 mspace-bottom-100 explorecls" style="background-image: url({{$section3->image ? $section3->image : asset('fixifx/images/OpenAPI-bg.png') }});">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-sm-12">
                <div class="section-head text-center">
                    <h2 class="max-w-427">{{ $section3->{config('app.locale').'_title'} }}</h2>
                    <div class="discription">
                        <p>{!! $section3->{config('app.locale').'_desc'} !!}</p>
                    </div>
                    <div class="openAi-btn d-flex align-items-center justify-content-center">

                        @if(config('app.locale') == 'en')
                        <a href="{{ isset($sectionEnLink3[0]) ? $sectionEnLink3[0] : '#' }}" target="_blank" class="custom-btn fill-btn-1">{{__('message.go_to_the_developer_portal_btn')}}</a>
                        @else
                        <a href="{{ isset($sectionJaLink3[0]) ? $sectionJaLink3[0] : '#' }}" target="_blank" class="custom-btn fill-btn-1">{{__('message.go_to_the_developer_portal_btn')}}</a>
                        @endif


                        <a href="{{ route('page', [config('app.locale'), 'contact-us']) }}" target="_blank" class="custom-btn fill-btn">{{__('message.talk_to_our_specialist_btn')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif