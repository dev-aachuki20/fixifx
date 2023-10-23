    <!-- Instant account  -->
    <section>
      @if(request()->route()->parameters['slug'] != 'mt5-client-desktop' &&
      request()->route()->parameters['slug'] != 'mt5-mac-os-trader' &&
      request()->route()->parameters['slug'] != 'mt5-iphone-trader' &&
      request()->route()->parameters['slug'] != 'mt5-android-trader' &&
      request()->route()->parameters['slug'] != 'ctrader-ios' &&
      request()->route()->parameters['slug'] != 'ctrader-android' &&
      request()->route()->parameters['slug'] != 'ctrader-web')
      <div class="container">
        <div class="row"> 
          <div class="col-lg-12 col-sm-12">
            <div class="instant-account-outer text-white instant-account-text-editor">
              {!! getSettingValue('footer_common_'.config('app.locale')) !!}
              <div class="button-group">
                <a href="{{ getSettingValue('live_link') }}" target="_blank" class="custom-btn fill-btn-1 text-white">{{ getSettingValue('foot_live_link_btn_'.config('app.locale')) }}</a>
                <a href="{{ getSettingValue('demo_link') }}" target="_blank" class="custom-btn fill-btn text-white">{{ getSettingValue('demo_link_btn_'.config('app.locale')) }}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
    </section>
    <!-- end  -->