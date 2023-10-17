@php $header = $section->where('section_no', 1)->first() @endphp

@if($header)
<div class="col-lg-6 col-sm-12">
    <div class="section-head">
        <h2 class="max-w-427">{{ $header->{config('app.locale').'_title'} }}</h2>
        <div class="discription">
            {!! $header->{config('app.locale').'_desc'} !!}
        </div>
    </div>
</div>
@endif