@php
$section3 = $common->where('section_no', 3)->where('status', 1)->first();
@endphp
@if($section3)
@php $menu_page = App\Models\MenuPage::where('menu_id', 2)->get(); @endphp
<!-- Fixi’s OpenAPI  -->
<!-- @php $section3 = $section->where('section_no', 3)->where('status', 1)->first() @endphp
@if($section3) -->
<section class="OpenAPI-wrapper padding-tb-120 mspace-bottom-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-sm-12">
                <div class="section-head text-center">
                    <h2 class="max-w-427">{{ $section3->{config('app.locale').'_title'} }}</h2>
                    <div class="discription">
                        <p>{!! $section3->{config('app.locale').'_desc'} !!}</p>
                    </div>
                    <div class="openAi-btn d-flex align-items-center justify-content-center">
                        <a href="#" class="custom-btn fill-btn-1">Go to the developer portal</a>
                        <a href="{{ route('page', [config('app.locale'), 'contact-us']) }}" class="custom-btn fill-btn">{{__('message.talk_to_our_specialist_btn')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- @endif -->
<!-- end  -->
@endif
<!-- end  -->