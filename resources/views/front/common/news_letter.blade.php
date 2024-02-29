<div class="stayIcon-box">

    <img class="img-fluid" src="{{asset('fixifx/images/Isolation_Mode.png')}}" alt="">

</div>

<div class="stayTitle-box">

    <h4>

        {{ getSettingValue('newsletter_title_'.config('app.locale')) }}

    </h4>

    <p>{{ getSettingValue('newsletter_detail_'.config('app.locale')) }}</p>

</div>

<form id="news_form">

    @csrf

    <div class="form-group">

        <div class="newsletter-test">

            <img class="input-icon" src="{{asset('fixifx/images/form-icon/email.svg')}}" alt="bank">

            <input type="text" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="{{__('message.email_placeholder')}}">

        </div>

        

        <div id="email_error" class="error-message"></div>

        <button id="news_submit" type="submit" class="sendBtn-Box">

            <svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">

                <path d="M7.45544 11.0186L7.14115 15.4394C7.59082 15.4394 7.78558 15.2462 8.01912 15.0143L10.1274 12.9994L14.4959 16.1986C15.2971 16.6451 15.8616 16.41 16.0777 15.4616L18.9452 2.02508L18.946 2.02429C19.2001 0.839926 18.5177 0.37679 17.7371 0.667339L0.882079 7.12037C-0.268241 7.56688 -0.250824 8.20814 0.686532 8.49869L4.99568 9.83902L15.005 3.57599C15.476 3.26407 15.9043 3.43666 15.552 3.74858L7.45544 11.0186Z" fill="white" />

            </svg>

        </button>

    </div>

</form>