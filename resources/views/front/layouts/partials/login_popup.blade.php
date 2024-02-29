<!--  Login Modal -->

@php $section9 = $section->where('section_no', 9)->first(); @endphp

@if($section9)

<div class="modal fade login_modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-body">

                <div class="form_box d-flex align-items-center justify-content-between">

                    <div class="leftBox_modal">

                        <img class="img-fluid" src="{{$section9 && $section9->image ? $section9->image :  asset('fixifx/images/modal-img.png') }}" alt="">

                    </div>

                    <div class="rightBox_modal">

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">

                                <path d="M18 6L6 18" stroke="#1E1F1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />

                                <path d="M6 6L18 18" stroke="#1E1F1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />

                            </svg>

                        </button>

                        <div class="modal-logo">

                            <img class="img-fluid" src="{{asset('fixifx/images/logo.svg') }}" alt="">

                        </div>

                        <div class="modalBox_title">

                            <h3>

                                {{ $section9->{config('app.locale').'_title'} }}

                            </h3>

                        </div>

                        <div class="description">

                            <p>{!! $section9->{config('app.locale').'_desc'} !!}</p>

                        </div>



                        <!-- <form action="javascript:void(0);" method="post">

                        <div class="form-group position-relative">

                         <img class="input-icon" src="{{ asset('fixifx/images/form-icon/user.svg') }}" alt="user">

                         <input type="text" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="Enter your name">

                        </div>

                        <div class="form-group position-relative">

                         <img class="input-icon" src="{{ asset('fixifx/images/form-icon/email.svg') }}" alt="email">

                         <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="Enter your email">

                        </div> -->

                        <button type="button" class="custom-btn fill-btn-1" data-bs-dismiss="modal" aria-label="Close"> {{__('message.confirmed')}}</button>

                        <!-- </form> -->

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endif