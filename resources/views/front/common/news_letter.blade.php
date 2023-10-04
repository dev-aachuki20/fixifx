<div class="uk-card uk-card-primary uk-card-body uk-border-rounded uk-background-bottom-left uk-background-cover" style="background-image: url('{{ asset('front/img/fixi_fx-news_letter.webp') }}');"
 loading="lazy">
    <div class="uk-flex uk-flex-center">
        <div class="uk-text-center">
            <h3 class="mt-0 mb-3">{{ getSettingValue('newsletter_title_'.config('app.locale')) }}</h3>
            <p class="m-0 mb-4">{{ getSettingValue('newsletter_detail_'.config('app.locale')) }}</p>
            <form class="uk-search uk-search-default uk-width-1-1 uk-margin-bottom uk-inline" id="news_form">
                @csrf
                <div class="position-relative">
                   <input class="uk-search-input uk-border-pill" type="text" placeholder="{{__('message.email_placeholder')}}" name="email">
                   <span class="uk-form-icon uk-form-icon-absolute fas fa-envelope " style="display: block;position: absolute;top: 44%;left: 20px;transform: translateY(-50%);"></span>
                </div>
                @if($errors->has('email'))
                <span style="color: red;">{{ $errors->first('email') }}</span>
                @endif
                <div id="email_error"></div>
               <button id="news_submit" class="uk-button uk-button-primary uk-border-rounded uk-text-white mt-3" type="submit">{{__('message.submit')}}</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{asset('assets/libs/jquery/jquery.validate.min.js')}}"></script>
<script>
    $('#news_form').validate({
        errorClass: 'invalid-feedback animated fadeInDown error',
        errorElement: 'div',
        rules: {
            email: {
                required: true,
            }
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        },
        submitHandler: function(form) {
            $('.error').html("");
            $.ajax({
                type: 'POST',
                url: "{{ route('newsletter') }}",
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function(data) {

                    if (data) {
                        success = msg = "";
                        if ('{{config("app.locale")}}' == 'en') {
                            msg = 'You have successfully subscribed to our newsletter.';
                            success = 'Success';
                        } else {
                            msg = 'ニュースレターの購読に成功しました。';
                            success = '成功';
                        }
                        swal(
                            success,
                            msg,
                            'success'
                        );
                        $('#news_form').trigger("reset");

                    }
                },
                error: function(data) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors.errors, function(key, value) {
                        $('#news_form').find('input[name=' + key + ']').after('<span class="error" style="color: red;">' + value + '</span>');
                    });

                }
            });
        },
    });



    // 
</script>
@endpush