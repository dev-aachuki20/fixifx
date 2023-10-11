<div class="col-12">
    <div class="postComment-box">
        <div class="title">
            <h4>
                {{__('message.post_your_comment')}}
            </h4>
        </div>
        <form id="reply" method="post">
            @csrf
            <input type="hidden" value="{{$article->id}}" id="article_id" name="article_id" type="text">

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group position-relative">
                        <img class="input-icon" src="{{asset('fixifx/images/form-icon/user.svg')}}" alt="user">
                        <input type="text" placeholder="{{__('message.first_name')}}" class="form-control" id="fname" name="fname" type="text">
                        @if($errors->has('fname'))
                        <span style="color: red;">{{ $errors->first('fname') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group position-relative">
                        <img class="input-icon" src="{{asset('fixifx/images/form-icon/user.svg')}}" alt="user">
                        <input type="text" placeholder="{{__('message.last_name')}}" class="form-control" id="lname" name="lname">
                        @if($errors->has('lname'))
                        <span style="color: red;">{{ $errors->first('lname') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group position-relative">
                        <img class="input-icon" src="{{asset('fixifx/images/form-icon/email.svg')}}" alt="email">
                        <input type="email" placeholder="{{__('message.enter_email')}}" class="form-control" name="email" id="email">
                        @if($errors->has('email'))
                        <span style="color: red;">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group position-relative">
                        <textarea placeholder="{{__('message.enter_comment')}}" class="form-control" id="message" name="message"></textarea>
                        @if($errors->has('message'))
                        <span style="color: red;">{{ $errors->first('message') }}</span>
                        @endif
                    </div>
                </div>
                <div class="submit-form">
                    <input type="submit" class="custom-btn fill-btn-1" value="{{__('message.submit_now')}}">
                </div>
            </div>
        </form>
    </div>
</div>












@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{asset('assets/libs/jquery/jquery.validate.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#reply').validate({
            errorClass: 'invalid-feedback animated fadeInDown error',
            errorElement: 'div',
            rules: {
                'fname': {
                    required: true,
                    minlength: 4,
                    maxlength: 20,
                    // pattern: /^[A-Za-z\s]+$/,
                },
                'lname': {
                    required: true,
                    minlength: 4,
                    maxlength: 40
                },
                'email': {
                    required: true,
                    email: true,
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
                var article_id = $('#article_id').val();
                var formData = new FormData(form);
                formData.append('article_id', article_id);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('post_comment') }}",
                    data: formData,
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
@endsection