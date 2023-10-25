@php $faqs = App\Models\Faq::where('page_id', 1)->get() @endphp
<div class="row  frequently-row-box justify-content-center pat-50">
    <div class="col-lg-12 col-md-12 col-sm-12 justify-content-center text-center">
        <div class="text-center justify-content-center d-flex">
            <h2 class="max-w-427 text-center">{{__('message.faq')}}</h2>
        </div>
    </div>

    <div class="col-12 frequently-faq-list">
        <div class="expert-content">
            <div class="accordion" id="accordionfrequently">
                @foreach($faqs as $index => $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#expert{{$index}}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="expert{{ $index }}">
                            {{ $faq->{config('app.locale').'_question'} }}
                        </button>
                    </h2>
                    <div id="expert{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#accordionfrequently">
                        <div class="accordion-body">
                            <div class="expert-inner-content">
                                <div class="discription">
                                    {!! $faq->{config('app.locale').'_answer'} !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>


{{-- <div class="uk-margin-medium-bottom">
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
</div> --}}