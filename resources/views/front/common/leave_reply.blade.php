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











