<h3 class="">{{ __('message.talk_to_us') }}</h3>
<div class="title_divider_dot"></div>

<div class="registration_form mt-3">
    <form class="uk-form uk-grid-small uk-grid" data-uk-grid="" method="POST" id="contact_form">
        
        <div class="uk-width-1-2@s uk-first-column">
            <div class="uk-form-controls">
                <input class="uk-input uk-border-rounded"{{-- id="form-stacked-text" --}} type="text" placeholder="{{__('message.fname')}}" name="first_name" value="{{ old('first_name') }}">
            </div>
        </div>
        <div class="uk-width-1-2@s">
            <div class="uk-form-controls">
                <input class="uk-input uk-border-rounded"{{-- id="form-stacked-text" --}} type="text" placeholder="{{__('message.lname')}}" name="last_name" value="{{ old('last_name') }}">
            </div>
        </div>
        <div class="uk-width-1-2@s uk-first-column">
            <div class="uk-form-controls">
                <input class="uk-input uk-border-rounded"{{-- id="form-stacked-text" --}} type="text" placeholder="{{__('message.company_name')}}" name="company_name" value="{{ old('company_name') }}">
            </div>
        </div>
        <div class="uk-width-1-2@s">
            <div class="uk-form-controls">
                <input class="uk-input uk-border-rounded"{{-- id="form-stacked-text" --}} type="text" placeholder="{{__('message.email_placeholder')}}" name="email" value="{{ old('email') }}">
            </div>
        </div>
        <div class="uk-width-1-2@s uk-first-column">
            <div class="uk-form-controls">
                <select class="uk-select uk-border-rounded" name="already_customer">
                    <option value="" selected>{{__('message.do_you_have_acc')}}</option>
                    <option value="1">{{__('message.yes')}}</option>
                    <option value="0">{{__('message.no')}}</option>
                </select>
            </div>
        </div>
        <div class="uk-width-1-2@s">
            <div class="uk-form-controls">
                <input class="uk-input uk-border-rounded"{{-- id="form-stacked-text" --}} type="text" placeholder="{{__('message.prex_acc')}}" name="account_no" value="{{ old('account_no') }}">
            </div>
        </div>
        <div class="uk-width-1-2@s uk-first-column">
            <div class="uk-form-controls">
                <select class="uk-select uk-border-rounded" name="country">
                    <option value="" selected="selected">{{__('message.select_country')}}</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}" {{ (old('country') == $country->id) ? 'selected' : '' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="uk-width-1-2@s">
            <div class="uk-form-controls">
                <input class="uk-input uk-border-rounded"{{-- id="form-stacked-text" --}} type="number" placeholder="{{__('message.phone')}}" name="phone_no" value="{{ old('phone_no') }}">
            </div>
        </div>
        <div class="uk-width-1-1 uk-grid-margin">
            <div class="uk-form-controls">
                <select class="uk-select uk-border-rounded" name="question">
                    <option value="" selected="selected">{{__('message.select_qus')}}</option>
                    <option value="New Accounts" {{ (old('question') == 'New Accounts') ? 'selected' : ''}}>New Accounts</option>
                    <option value="Customer Service" {{ (old('question') == 'Customer Service') ? 'selected' : ''}}>Customer Service</option>
                    <option value="Payment" {{ (old('question') == 'Payment') ? 'selected' : ''}}>Payment</option>
                    <option value="Technical Support" {{ (old('question') == 'Technical Support') ? 'selected' : ''}}>Technical Support</option>
                    <option value="Partner Program" {{ (old('question') == 'Partner Program') ? 'selected' : ''}}>Partner Program</option>
                    <option value="Marketing" {{ (old('question') == 'Marketing') ? 'selected' : ''}}>Marketing</option>
                    <option value="Other" {{ (old('question') == 'Other') ? 'selected' : ''}}>Other</option>
                </select>
            </div>
        </div>
        <div class="uk-width-1-1 uk-grid-margin">
            <div class="uk-form-controls">
                <textarea class="uk-textarea uk-border-rounded" id="message" name="message" rows="4" placeholder="{{__('message.qus_comment')}}">{{ old('message') }}</textarea>
            </div>
        </div>
        <div class="uk-width-1-2@m uk-grid-margin">
            <div class="uk-flex">
                <div class="uk-form-controls">
                    <input class="uk-input uk-border-rounded"{{-- id="form-stacked-text" --}} name="captcha" type="text" placeholder="{{__('message.text_type')}}">
                </div> 
                <span class="captcha ml-2">{!! captcha_img() !!}</span>
                <a type="button" class="p-2 refresh-cpatcha"><i class="fas fa-redo"></i></a>
            </div>
        </div>
        <div class="uk-width-1-1 uk-grid-margin uk-text-right user-button-flex">
            <button class="uk-button uk-button-primary uk-border-rounded " id="contact_btn" type="button">{{__('message.submit')}}</button>
        </div>
    </form>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    //add alt-attr to <img> by captcha
    window.addEventListener('DOMContentLoaded', altToCaptcha);
    function altToCaptcha(){
        let captchaImgWrap = document.querySelectorAll('.captcha.ml-2')[0];
        let captchaImgTag = captchaImgWrap.getElementsByTagName('img')[0];
        captchaImgTag.setAttribute('alt', '{{ config('app.locale') == 'ja' ? '認証用画像' : 'captcha-image' }}');
    }

    $(".refresh-cpatcha").click(function() {
        $.ajax({
            type: 'GET',
            url: "{{route('refresh_captcha')}}",
            success: function(data) {
                $(".captcha").html(data.captcha);
            }
        });
    });

    $('#contact_btn').on('click', function(){
        $('.error').html("");
        $.ajax({
            type: 'POST',
            url: "{{route('contact_us')}}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data : $('#contact_form').serialize(),
            success: function(data) {
                if(data) {
                    success = msg = "";
                    if('{{config("app.locale")}}' == 'en') {
                        msg = 'Your submission has been sent.';
                        success = 'Thank You !';
                    } else {
                        msg = '提出物が送信されました';
                        success = 'ありがとうございました';
                    }
                    swal(
                        success,
                        msg,
                        'success'
                    );
                    $('#contact_form').trigger("reset");
                    $('.error').remove();
                } 
            },
            error: function(data) {
                if (data.status === 422) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors.errors, function(key, value) {
                        $('#contact_form').find('input[name=' + key + '], textarea[name=' + key + '], select[name=' + key + ']').after('<span class="error" style="color: red;">' + value + '</span>');
                    });
                }
            }
        });
    })
</script>
@endpush