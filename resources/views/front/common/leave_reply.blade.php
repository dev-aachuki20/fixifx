<div class="uk-margin-medium-top uk-margin-medium-bottom">
    <h2 class="uk-margin-bottom">{{__('message.leave_reply')}}</h2>
    <form class="uk-form uk-grid-small" data-uk-grid id="reply" method="post">
        @csrf

        <div class="uk-width-1-2@s">
            <input class="uk-input uk-border-rounded" id="name" name="name" type="text" placeholder="{{__('message.full_name_placeholder')}}">
            @if($errors->has('name'))
            <span style="color: red;">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="uk-width-1-2@s">
            <input class="uk-input uk-border-rounded" id="email" name="email" type="text" placeholder="{{__('message.email_placeholder')}}">
            @if($errors->has('email'))
            <span style="color: red;">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="uk-width-1-1">
            <input class="uk-input uk-border-rounded" id="url" name="url" type="url" placeholder="{{__('message.website_placeholder')}}">
            @if($errors->has('url'))
            <span style="color: red;">{{ $errors->first('url') }}</span>
            @endif
        </div>
        <div class="uk-width-1-1">
            <textarea class="uk-textarea uk-border-rounded" id="message" name="message" rows="6" placeholder="{{__('message.comment_placeholder')}}"></textarea>
            @if($errors->has('message'))
            <span style="color: red;">{{ $errors->first('message') }}</span>
            @endif
        </div>
        <div class="uk-width-1-3@s">
            <button class="uk-width-1-1 uk-button uk-button-primary uk-border-rounded" type="submit">{{__('message.post_comment')}}</button>
        </div>
    </form>
</div>

@push('scripts')
<script src="{{asset('assets/libs/jquery/jquery.validate.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#reply').validate({
            errorClass: 'invalid-feedback animated fadeInDown error',
            errorElement: 'div',
            rules: {
                'name': {
                    required: true,
                },
                'url': {
                    required: true,
                },
                'email': {
                    required: true,
                },
                'message': {
                    required: true,
                },
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
                    url: "{{ route('post_comment') }}",
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    success: function(data) {

                        if (data) {
                            success = msg = "";
                            if ('{{config("app.locale")}}' == 'en') {
                                msg = 'You have successfully replied.';
                                success = 'Success';
                            } else {
                                msg = '正常に返信されました。';
                                success = '成功';
                            }
                            swal(
                                success,
                                msg,
                                'success'
                            );
                            $('#reply').trigger("reset");

                        }
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors.errors, function(key, value) {
                            $('#reply').find('input[name=' + key + ']').after('<span class="error" style="color: red;">' + value + '</span>');
                        });

                    }
                });
            },
        });
    });
</script>
@endpush