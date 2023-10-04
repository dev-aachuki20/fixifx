    <!-- auto fix  -->
    @php $section2 = $section->where('section_no', 2)->first() @endphp 
    @if($section2)
    <section class="auto-fix-wrapper padding-tb-120">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-6">
            <div class="auto-fixi-img-box">
              <img @if($section2->image && $section2->image != null) src="{{ asset($section2->image) }}" @else src="{{ asset('fixifx/images/auto-fixi.png') }}" @endif class="img-fluid" {{ config('app.locale') == 'ja' ? 'FiXi FX（フィクシー）について - スプレッドが狭いFX海外口座' : 'About FiXi FX' }}>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="auto-content">
              <div class="auto-fixi-title">
                <h2>
                  {{ $section2->{config('app.locale').'_title'} }}
                </h2>
              </div>
              <div class="auto-fixi-text">
                   {!! $section2->{config('app.locale').'_desc'} !!}
              </div>
              <div class="read-more-btn">
                <a href="../../en/companys-profile" class="custom-btn fill-btn-1">{{__('message.read_more')}}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif
    <!-- end  -->