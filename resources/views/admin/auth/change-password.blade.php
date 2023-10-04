@extends('admin.layouts.master')
@section('title', 'Profile')
@section('content')

@include('common.flash')

<div class="container-fluid">
   <div class="animated fadeIn">
      <div class="row">
         <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="col-xxl-12">
               <div class="card">
                  <div class="card-header">
                     <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0">
                        <li class="nav-item">
                           <a class="nav-link">
                              <i class="far fa-user"></i>
                              Change Password
                           </a>
                        </li>
                     </ul>
                  </div>
                  <div class="card-body p-4">
                        <!-- Change Password -->
                           <form method="POST" action="{{ route('admin.add-password') }}" id="changePasswordForm">
                              @csrf
                              <div class="row g-2">
                                 <div class="col-lg-4">
                                    <div>
                                       <label for="oldPassword" class="form-label">Old Password*</label>
                                       <div class="position-relative auth-pass-inputgroup mb-3">
                                       <input type="password" class="form-control pe-5 {{ $errors->has('oldPassword') ? 'is-invalid' : '' }}" placeholder="Enter password" name="oldPassword" id="password-input">
                                       <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                       @if($errors->has('oldPassword'))
                                       <span class="invalid-feedback" role="alert">
                                          {{ $errors->first('oldPassword') }}
                                       </span>
                                       @endif
                                    </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div>
                                       <label for="newPassword" class="form-label">New Password*</label>
                                       <div class="position-relative auth-pass-inputgroup mb-3">
                                       <input type="password" name="newPassword" class="form-control {{ $errors->has('newPassword') ? 'is-invalid' : '' }}" id="npassword-input" placeholder="Enter new password">
                                       <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="npassword-addon"><i class="ri-eye-fill align-middle"></i></button>
                                       @if($errors->has('newPassword'))
                                       <span class="invalid-feedback" role="alert">
                                          {{ $errors->first('newPassword') }}
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div>
                                       <label for="confirmPassword" class="form-label">Confirm Password*</label>
                                       <div class="position-relative auth-pass-inputgroup mb-3">
                                       <input type="password" name="confirmPassword" class="form-control {{ $errors->has('confirmPassword') ? 'is-invalid' : '' }}" id="cpassword-input" placeholder="Confirm password">
                                       <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="cpassword-addon"><i class="ri-eye-fill align-middle"></i></button>
                                       @if($errors->has('confirmPassword'))
                                       <span class="invalid-feedback" role="alert">
                                          {{ $errors->first('confirmPassword') }}
                                       </span>
                                       @endif
                                    </div>
                                    </div>
                                 </div>
                                 <div class="mt-3">
                                       <button type="submit" class="btn btn-primary">Save</button>
                                 </div>
                              </div>
                           </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection
@push('scripts')
<script>
   $(document).ready(function() {
      $('#changePasswordForm').validate({
         errorClass: 'invalid-feedback animated fadeInDown',
         errorElement: 'div',
         rules: {
            oldPassword: {
               required: true,
            },
            newPassword: {
               required: true,
               minlength: 8
            },
            confirmPassword: {
               required: true,
               equalTo: "#npassword-input"
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
      });
   });
</script>
@endpush