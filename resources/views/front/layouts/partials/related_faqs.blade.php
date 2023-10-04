

<ul class="search-listing-box @if($relatedFaqs->count() == 0 || $relatedFaqs->count() <= 3)) minimal-data @endif">
@if(!$relatedFaqs->isEmpty())
@foreach ($relatedFaqs as $key => $faq)
<li class="search-item">
    <a href="#ques_{{ $faq->id }}"class="faq-suggestion" data-section-id="{{ $faq->section_id }}" data-faq-id="{{ $faq->id }}">
        <div class="title">{{ $faq->{config('app.locale').'_question'} }}</div>
    </a>
    {{--
    <div class="subtitle" data-section-id="{{ $faq->section_id }}"><span>{{ $faq->menuPage->{config('app.locale').'_name'} }}  >  {{ $faq->section->{config('app.locale').'_title'} }}</span></div>
    --}}
</li>
@endforeach
@else
<li class="search-item" >{{__('message.no_record_found')}}</li>
@endif
</ul>