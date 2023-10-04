@php
    $keywords_jp = 'FiXi FX,フィクシー,よくある質問,FAQ,Q&A';
    $description_jp = 'FiXi FX（フィクシー）のFAQページ。よくある質問に対してQ&A方式で回答しています。';
@endphp

@extends('front.layouts.base')

@section('content')    
    
@include('front.layouts.partials.common_hero') 
    
<!-- faqBox  -->
<section class="faqBox-wrapper">
    <div class="faqBox-inner">  
        <div class="leftFaq-content">
            <ul class="nav nav-tabs" id="faqTab" role="tablist">
                @for($i=2; $i<=7; $i++)
                @php $data = $section->where('section_no', $i)->where('status', 1)->first(); @endphp
                @if($data && isset($faqs[$i]) && count($faqs[$i]))
                 <li class="nav-item" role="presentation">
                <button class="nav-link  {{ $i == 2 ? 'active' : ''}}" id="tab-{{ $data->id }}" data-bs-toggle="tab" data-bs-target="#{{ $data->id }}-pane" type="button" role="tab" aria-controls="{{ $data->id }}-pane" aria-selected="false">{{ $data->{config('app.locale').'_title'} }}</button>
                </li>
                @endif
                @endfor
            </ul>
        </div>
        <div class="rightFaq-content">
            <div class="tab-content" id="myTabContent">
                @for($i=2; $i<=7; $i++)
                @php $data = $section->where('section_no', $i)->where('status', 1)->first();   @endphp
                @if($data && isset($faqs[$i]) && count($faqs[$i]))
                <div class="tab-pane fade {{ $i == 2 ? 'show active' : ''}}" id="{{ $data->id }}-pane" role="tabpanel" aria-labelledby="{{ $data->id }}-pane" tabindex="0">
                    <div class="faqTab-content">
                        @php $header = $section->where('section_no', 1)->first(); @endphp
                        @if($header)
                        <div class="title">
                            <h2>
                                {{ $header->{config('app.locale').'_title'} }}
                            </h2>
                        </div>
                        <div class="description">
                                {!! $header->{config('app.locale').'_desc'} !!}
                        </div>
                        @endif
                        <div class="accordion faqAccordion" id="accordiondata{{ $data->id }}">
                            @foreach($faqs[$i] as $faq)
                            <div class="accordion-item" id="ques_{{ $faq->id}}">
                              <h2 class="accordion-header">
                                <button class="accordion-button {{ $loop->iteration != 1 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{ $faq->id }}" aria-expanded="true" aria-controls="collapse_{{ $faq->id }}">
                                    <img class="img-fluid" src="{{ asset('fixifx/images/faq-q.svg') }}" alt="">
                                    {{ $faq->{config('app.locale').'_question'} }}
                                </button>
                              </h2>
                              <div id="collapse_{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->iteration == 1 ? 'show': '' }}" data-bs-parent="#accordiondata{{ $data->id }}">
                                <div class="accordion-body">
                                    <div class="description">
                                        {!! $faq->{config('app.locale').'_answer'} !!}
                                    </div>
                                    @include('front.layouts.partials.social_share')
                                </div>
                              </div>
                            </div>
                          @endforeach
                          </div>
                    </div>
                </div>
                @endif
                @endfor
                
            </div>
        </div>
    </div>
</section>
<!-- faqBox end -->
@endsection    

@section('javascript')
<script>
$(document).on('click', '.ss-btn-share', function(e) {
     e.preventDefault();
     	if(navigator.share) {
			navigator.share({
				url: this.getAttribute("data-ss-link")
			}).then(() => {
				console.log('Thanks for sharing!');
			})
			.catch(console.error);
		}
		else
		{
			console.log('This brownser dont support native web share!');
		}
});


// $(document).ready(function() {
//   $('#faq-searchbox').on('input', function(e) {
//     console.log(`Input value: "${e.currentTarget.value}"`);
//   });
// });


function showFaqResults(e) {
    let keyword = e.value.trimStart();
        keyword.trimEnd();

    console.log('keyword', keyword);
    $('.faq-results').html('');
    if (keyword == '' || keyword.length < 3) {
        
        $('.faq-results').html('');
      return false;
    }

    $('#faq-searchbox').val(keyword);
    let list = '';

    fetch('/search-faqs?keyword=' + keyword).then(
      function (response) {
        return response.json();
      }).then(function (data) {
            $('.faq-results').html(data.relatedFaqsHtml);
          return true;
      }).catch(function (err) {
        console.warn('Something went wrong.', err);
        return false;
      });
  }

$(document).on('click', '.faq-suggestion', function(e) {
    let sectionId = $(this).attr("data-section-id");
    let faqId = $(this).attr("data-faq-id");
    console.log($(this).find('.title').text());
    
    $("#faq-searchbox").val($(this).find('.title').text());
    $("#tab-"+sectionId).trigger("click");
    $("#collapse_"+faqId).collapse('show');
    
    // var access = document.getElementById("ques_"+faqId);
    // console.log('access', access);
    // access.scrollIntoView({behavior: 'smooth'}, true);
});


// jQuery(document).ready(function(){
//   jQuery('a[href^="#"]').on('click', function (e) {
//       e.preventDefault();
//       var target = this.hash;
//       var $target = jQuery(target)
// ;
//       jQuery('html, body').stop().animate({
//          'scrollTop': $target.offset().top + 140
//       }, 900, 'swing', function () {
//          // window.location.hash = target;
//       });
//   });
// });

</script>
@endsection    