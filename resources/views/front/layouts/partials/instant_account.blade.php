    <!-- Instant account  -->
    <section>
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
    </section>
    <!-- end  -->

    <!-- <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-sm-12">
            <div class="instant-account-outer text-white">
              <h2 class="text-white">Instant account opening & funding</h2>
              <div class="discription">
                <p>Trade within minutes!</p>
              </div>
              <div class="button-group">
                <a href="javascript:void(0);" class="custom-btn fill-btn-1 text-white">Live account</a>
                <a href="javascript:void(0);" class="custom-btn fill-btn text-white">Demo Account</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->