<div class="contact-info-form">

    <h4>{{ __('message.talk_to_us') }}</h4>

    <form method="POST" id="contact_form">

        <div class="grid-outer row">

            <div class="col-lg-6 col-md-6 col-sm-12">

                <div class="form-group position-relative">

                    <img class="input-icon" src="{{asset('fixifx/images/form-icon/user.svg')}}" alt="user">

                    <input type="text" placeholder="{{__('message.fname')}}" name="first_name" value="{{ old('first_name') }}" class="form-control">

                </div>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">

                <div class="form-group position-relative">

                    <img class="input-icon" src="{{asset('fixifx/images/form-icon/user.svg')}}" alt="user">

                    <input type="text" placeholder="{{__('message.lname')}}" name="last_name" value="{{ old('last_name') }}" class="form-control">

                </div>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">

                <div class="form-group position-relative">

                    <img class="input-icon" src="{{asset('fixifx/images/form-icon/bag.svg')}}" alt="bag">

                    <input type="text" placeholder="{{__('message.company_name')}}" name="company_name" value="{{ old('company_name') }}" class="form-control">

                </div>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">

                <div class="form-group position-relative">

                    <img class="input-icon" src="{{asset('fixifx/images/form-icon/email.sv')}}g" alt="email">

                    <input type="text" placeholder="{{__('message.email_placeholder')}}" name="email" value="{{ old('email') }}" class="form-control">

                </div>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">

                <div class="form-group position-relative">

                    <img class="input-icon" src="{{asset('fixifx/images/form-icon/bank.svg')}}" alt="bank">

                    <select class="form-control" name="already_customer">

                        <option value="" selected>{{__('message.do_you_have_acc')}}</option>

                        <option value="1">{{__('message.yes')}}</option>

                        <option value="0">{{__('message.no')}}</option>

                    </select>

                </div>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">

                <div class="form-group position-relative">

                    <img class="input-icon" src="{{asset('fixifx/images/form-icon/account-n.svg')}}" alt="account-n">

                    <input type="text" placeholder="{{__('message.prex_acc')}}" name="account_no" value="{{ old('account_no') }}" class="form-control">

                </div>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">

                <div class="form-group position-relative">



                    <select class="niceCountryInputSelector from_code" id="from_code" name="from_country">

                        @foreach($countries as $country)

                        <option value="{{ $country->currency_code }}" data-src="{{$country->flag }}" {{ (old('country') == $country->id) ? 'selected' : '' }}>

                            {{ $country->name }}

                        </option>

                        @endforeach

                    </select>

                </div>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">

                <div class="form-group position-relative">

                    <input id="phone" type="number" placeholder="{{__('message.phone')}}" name="phone_no" value="{{ old('phone_no') }}">

                </div>

            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="form-group position-relative">

                    <img class="input-icon" src="{{asset('fixifx/images/form-icon/que.svg')}}" alt="que">

                    <select class="form-control" name="question">

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

            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="form-group position-relative">

                    <textarea id="message" name="message" rows="4" placeholder="{{__('message.qus_comment')}}" class="form-control">{{ old('message') }}</textarea>

                </div>

            </div>

        </div>

        <div class="form-footer button-group">

            <div class="captcha-box form-group">

                <input type="text" name="captcha" type="text" placeholder="{{__('message.text_type')}}">

                <span class="captcha ml-2 captcha-img">{!! captcha_img() !!}</span>

                <a type="button" class="p-2 refresh-cpatcha">

                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-reload" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">

                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>

                      <path d="M19.933 13.041a8 8 0 1 1 -9.925 -8.788c3.899 -1 7.935 1.007 9.425 4.747" />

                      <path d="M20 4v5h-5" />

                    </svg>

                </a>



                {{-- <div class="captcha-img" id="captcha">

                    <img src="{{asset('fixifx/images/captcha.png')}}" alt="captcha">

            </div> --}}

        </div>

        <div class="submit-form">

            <button class="custom-btn fill-btn-1" id="contact_btn" type="button">{{__('message.submit_now')}}</button>

        </div>

</div>

</form>



</div>