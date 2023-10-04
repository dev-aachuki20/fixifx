@php $header = $section->where('section_no', 1)->first() @endphp

@if($header)
<div class="section-title">
    <div class="uk-grid uk-grid-small" data-uk-grid="">
        <div class="uk-width-expand uk-first-column">
            <h2 class="">{{ $header->{config('app.locale').'_title'} }}</h2>
            <div class="title_divider_dot"></div>
        </div>
        {{--
        <div class="uk-width-auto">
            <!-- <i class="fas fa-money-bill-wave fa-lg in-icon-wrap circle medium primary-color uk-margin-right"></i> -->
            <a href="javascript:;"><img src="img/window1.png" width="40" class="" alt="" loading="lazy"></a>
        </div>
        --}}
        <span id="main_sub_sec" class="uk-grid-margin uk-width">{!! $header->{config('app.locale').'_desc'} !!}</span>
    </div>
</div>
@endif