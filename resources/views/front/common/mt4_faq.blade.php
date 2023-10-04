@php $faqs = App\Models\Faq::where('page_id', 1)->get() @endphp 
<div class="uk-margin-medium-bottom">
    <h3 class="">FAQ:</h3>
    <div class="title_divider_dot"></div>
    <ul class="in-faq-5 uk-list-divider" uk-accordion>
        @foreach($faqs as $faq)
        <li>
            <span class="uk-accordion-title">{{ $faq->{config('app.locale').'_question'} }}</span>
            <div class="uk-accordion-content">
                {!! $faq->{config('app.locale').'_answer'} !!}
                <div class="ss-box ss-circle" data-ss-content="false"></div>
            </div>
        </li>
        @endforeach
    </ul>
</div>