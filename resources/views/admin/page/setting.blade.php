@extends('admin.layouts.master')

@section('title', 'Setting')

@section('content')

<div class="animated fadeIn">
    <div class="card">
        <div class="card-header pull-left">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link {{Route::current()->getName() == 'admin.page' ? 'active' : ''}}" data-bs-toggle="tab" role="tab" href="#header_setting">Header Setting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" role="tab" href="#footer_setting">Footer Setting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" role="tab" href="#common_setting">Common Setting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" role="tab" href="#home_setting">Home Setting</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" role="tab" href="#terms_setting">Terms and Condition</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" role="tab" href="#privacy_setting">Privacy Policy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Route::current()->getName() == 'admin.setting.category' ? 'active' : ''}}" data-bs-toggle="tab" role="tab" href="#category" id="categoryTable">Article Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Route::current()->getName() == 'admin.setting.share-category' ? 'active' : ''}}" data-bs-toggle="tab" role="tab" href="#sharecategory" id="shareTable">Shares & Bonds Category</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div id="header_setting" class="tab-pane  {{Route::current()->getName() == 'admin.page' ? 'active' : ''}}"><br>
                    <form action="{{ route('admin.update_setting') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @include('common.flash')
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Help Center</label>
                                        <input type="text" class="form-control" id="help" placeholder="Enter help center link" name="setting[help]" value="{{ getSettingValue('help') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Deposite</label>
                                        <input type="text" class="form-control" id="deposite" placeholder="Enter deposite link" name="setting[deposite]" value="{{ getSettingValue('deposite') }}">
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Member Login</label>
                                        <input type="text" class="form-control" id="member_login " placeholder="Enter member login link" name="setting[member_login]" value="{{ getSettingValue('member_login') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Partner Login</label>
                                        <input type="text" class="form-control" id="partner_login" placeholder="Enter partner login link" name="setting[partner_login]" value="{{ getSettingValue('partner_login') }}">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer text-left">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>

                <div id="footer_setting" class="tab-pane"><br>
                    <form action="{{ route('admin.update_setting') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="remove_sec_ids" class="remove_sec_ids" value="">
                        @include('common.flash')
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Phone</label>
                                        <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="setting[admin_contact]" value="{{ getSettingValue('admin_contact') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="setting[admin_email]" value="{{ getSettingValue('admin_email') }}">
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Facebook Link</label>
                                        <input type="url" class="form-control" id="phone" placeholder="Enter facebook link" name="setting[fb_link]" value="{{ getSettingValue('fb_link') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Instagram Link</label>
                                        <input type="url" class="form-control" id="email" placeholder="Enter instagram link" name="setting[insta_link]" value="{{ getSettingValue('insta_link') }}">
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Youtube Link</label>
                                        <input type="url" class="form-control" id="phone" placeholder="Enter youtube link" name="setting[youtube_link]" value="{{ getSettingValue('youtube_link') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Twitter Link</label>
                                        <input type="url" class="form-control" id="email" placeholder="Enter twitter link" name="setting[twitter_link]" value="{{ getSettingValue('twitter_link') }}">
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <div class="col-md-12">
                                        <label class="form-label text-muted">Address</label>
                                        <textarea name="setting[address]" class="form-control" id="" cols="30" rows="3">{{ getSettingValue('address') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Footer common text(English)</label>
                                        <textarea name="setting[footer_common_en]" class="ckeditor" cols="30" rows="10">{{ getSettingValue('footer_common_en') }}</textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Footer common text(Japanese)</label>
                                        <textarea name="setting[footer_common_ja]" class="ckeditor" cols="30" rows="10">{{ getSettingValue('footer_common_ja') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row mt-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Risk Title (English)</label>
                                        <input type="text" class="form-control" name="setting[risk_title_en]" value="{{ getSettingValue('risk_title_en') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Risk Title (Japanese)</label>
                                        <input type="text" class="form-control" name="setting[risk_title_ja]" value="{{ getSettingValue('risk_title_ja') }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-4">
                                    <div class="col-md-12">
                                        <label class="form-label text-muted">Risk Description (English)</label>
                                        <textarea name="setting[risk_desc_en]" class="form-control" id="" cols="30" rows="5">{{ getSettingValue('risk_desc_en') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row mt-4">
                                    <div class="col-md-12">
                                        <label class="form-label text-muted">Risk Description (Japanese)</label>
                                        <textarea name="setting[risk_desc_ja]" class="form-control" id="" cols="30" rows="5">{{ getSettingValue('risk_desc_ja') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $data = App\Models\Setting::where('key', 'like', 'payment_%')->get();@endphp
                        <div class="card">
                            <div class="card-body">
                                <label for="title" class="form-label imageLabel text-muted">Payment Type Image</label>
                                @if(count($data)==0)
                                <div class="faq_section_row">
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                            <button type="button" class="btn btn-danger remove_faq m-1 d-none"><i class="ri-subtract-fill"></i></button>
                                        </div>
                                    </div>
                                    <div class="row gy-2 mt-1">
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <input type="file" name="setting['payment_0']" class="form-control image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                @foreach($data as $key=>$value)
                                @php $j=$key @endphp
                                @php $i=++$key @endphp

                                <div class="faq_section_row">
                                    <input type="hidden" class="section_id" value="{{$value['id']}}">
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                            <button type="button" class="btn btn-danger remove_faq m-1 {{$i > 1 ? '' : 'd-none'}}"><i class="ri-subtract-fill"></i></button>
                                        </div>
                                    </div>

                                    <div class="row gy-2 mt-1">
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <input type="file" name="setting[{{$value['key']}}]" class="form-control image">
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-md-6">
                                            <img src="{{ asset('storage/Setting/'.$value['value']) }}" loading="lazy" width="100px" height="100px" class="imageDiv">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="card-footer text-left">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>

                <div id="common_setting" class="tab-pane"><br>
                    <form action="{{ route('admin.update_setting') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="card-header">
                                GLOBAL FINANCIAL MARKETS SECTION
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Title (English)</label>
                                        <input type="text" class="form-control" name="setting[global_title_en]" value="{{ getSettingValue('global_title_en') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Title (Japanese)</label>
                                        <input type="text" class="form-control" name="setting[global_title_ja]" value="{{ getSettingValue('global_title_ja') }}">
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Description (English)</label>
                                        <input type="text" class="form-control" name="setting[global_desc_en]" value="{{ getSettingValue('global_desc_en') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Description (Japanese)</label>
                                        <input type="text" class="form-control" name="setting[global_desc_ja]" value="{{ getSettingValue('global_desc_ja') }}">
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <div class="col-md-3">
                                        <label class="form-label text-muted">Live Link Button (English)</label>
                                        <input type="text" class="form-control" name="setting[live_link_btn_en]" value="{{ getSettingValue('live_link_btn_en') }}">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label text-muted">Live Link Button (Japanese)</label>
                                        <input type="text" class="form-control" name="setting[live_link_btn_ja]" value="{{ getSettingValue('live_link_btn_ja') }}">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label text-muted">Demo Link Button (English)</label>
                                        <input type="text" class="form-control" name="setting[demo_link_btn_en]" value="{{ getSettingValue('demo_link_btn_en') }}">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label text-muted">Demo Link Button (Japanese)</label>
                                        <input type="text" class="form-control" name="setting[demo_link_btn_ja]" value="{{ getSettingValue('demo_link_btn_ja') }}">
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Live Link</label>
                                        <input type="url" class="form-control" name="setting[live_link]" value="{{ getSettingValue('live_link') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Demo Link</label>
                                        <input type="url" class="form-control" name="setting[demo_link]" value="{{ getSettingValue('demo_link') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Fund Withtradwal
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Content (English)</label>
                                        <input type="text" class="form-control" name="setting[withdraw_content_en]" value="{{ getSettingValue('withdraw_content_en') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Content (Japanese)</label>
                                        <input type="text" class="form-control" name="setting[withdraw_content_ja]" value="{{ getSettingValue('withdraw_content_ja') }}">
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Button name (English)</label>
                                        <input type="text" class="form-control" name="setting[withdraw_btn_en]" value="{{ getSettingValue('withdraw_btn_en') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Button name (Japanese)</label>
                                        <input type="text" class="form-control" name="setting[withdraw_btn_ja]" value="{{ getSettingValue('withdraw_btn_ja') }}">
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Withdraw Link</label>
                                        <input type="url" class="form-control" name="setting[withdraw_link]" value="{{ getSettingValue('withdraw_link') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                News Letter
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Title (English)</label>
                                        <input type="text" class="form-control" name="setting[newsletter_title_en]" value="{{ getSettingValue('newsletter_title_en') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Title (Japanese)</label>
                                        <input type="text" class="form-control" name="setting[newsletter_title_ja]" value="{{ getSettingValue('newsletter_title_ja') }}">
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Detail (English)</label>
                                        <textarea name="setting[newsletter_detail_en]" class="form-control" cols="30" rows="5">{{ getSettingValue('newsletter_detail_en') }}</textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Detail (Japanese)</label>
                                        <textarea name="setting[newsletter_detail_ja]" class="form-control" cols="30" rows="5">{{ getSettingValue('newsletter_detail_ja') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">New User Button (English)</label>
                                        <input type="text" class="form-control" name="setting[new_user_btn_en]" value="{{ getSettingValue('new_user_btn_en') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted">New User Button (Japanese)</label>
                                        <input type="text" class="form-control" name="setting[new_user_btn_ja]" value="{{ getSettingValue('new_user_btn_ja') }}">
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Existing User Button (English)</label>
                                        <input type="text" class="form-control" name="setting[existing_user_btn_en]" value="{{ getSettingValue('existing_user_btn_en') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Existing User Button (Japanese)</label>
                                        <input type="text" class="form-control" name="setting[existing_user_btn_ja]" value="{{ getSettingValue('existing_user_btn_ja') }}">
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">New User Link</label>
                                        <input type="url" class="form-control" name="setting[new_user_link]" value="{{ getSettingValue('new_user_link') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Existing User Link</label>
                                        <input type="url" class="form-control" name="setting[existing_user_link]" value="{{ getSettingValue('existing_user_link') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-left">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
                <div id="home_setting" class="tab-pane"><br>
                    <form action="{{ route('admin.update_setting') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="setting[home_small_warning_en]" value="{{ getSettingValue('home_small_warning_en') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="setting[home_small_warning_ja]" value="{{ getSettingValue('home_small_warning_ja') }}">
                                    </div>
                                </div>
                                @for($i=1; $i<=6; $i++) 
                                <div class="form-group row mt-4">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="setting[home_sub_en_{{$i}}]" value="{{ getSettingValue('home_sub_en_'.$i) }}">
                                    </div>

                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="setting[home_sub_ja_{{$i}}]" value="{{ getSettingValue('home_sub_ja_'.$i) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="setting[home_sub_num_{{$i}}]" value="{{ getSettingValue('home_sub_num_'.$i) }}">
                                    </div>
                                </div>
                                @endfor
                            </div>
                        
                            <div class="card mt-3">
                                <div class="card-header">Download Platform Link</div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="form-label text-muted">Window</label>
                                            <input type="text" class="form-control" id="window" placeholder="Enter download link for window" name="setting[window]" value="{{ getSettingValue('window') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-muted">Apple</label>
                                            <input type="text" class="form-control" id="apple" placeholder="Enter download link for apple" name="setting[apple]" value="{{ getSettingValue('apple') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mt-4">
                                        <div class="col-md-6">
                                            <label class="form-label text-muted">Ios</label>
                                            <input type="text" class="form-control" id="ios " placeholder="Enter download link for ios" name="setting[ios]" value="{{ getSettingValue('ios') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-muted">Android</label>
                                            <input type="text" class="form-control" id="android" placeholder="download link for android" name="setting[android]" value="{{ getSettingValue('android') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4 card-primary card-outline">
                                <div class="card-header text-dark">Account Type</div>
                                <div class="card-body">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                          <button class="nav-link active" id="standard-tab" data-bs-toggle="pill" data-bs-target="#standard" type="button" role="tab" aria-controls="standard" aria-selected="true">STP Standard</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                          <button class="nav-link" id="pro-tab" data-bs-toggle="pill" data-bs-target="#pro" type="button" role="tab" aria-controls="pro" aria-selected="false">ECN Standard</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                          <button class="nav-link" id="ecn-tab" data-bs-toggle="pill" data-bs-target="#ecn" type="button" role="tab" aria-controls="ecn" aria-selected="false">STP Premier</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="premium-tab" data-bs-toggle="pill" data-bs-target="#premium" type="button" role="tab" aria-controls="ecn" aria-selected="false">ECN Premier</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="standard" role="tabpanel" aria-labelledby="standard-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label text-muted">STP Standard Header (English)</label>
                                                    <input type="text" class="form-control" placeholder="Enter header title" name="setting[standard_header_en]" value="{{ getSettingValue('standard_header_en') }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label text-muted">STP Standard Header (Japanese)</label>
                                                    <input type="text" class="form-control" placeholder="Enter header title" name="setting[standard_header_ja]" value="{{ getSettingValue('standard_header_ja') }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                @for($i=1; $i<=8; $i++)
                                                <div class="form-group row my-2">
                                                    <div class="col-md-4">
                                                        <label class="form-label text-muted">Title (English)</label>
                                                        <input type="text" class="form-control" placeholder="Enter title" name="setting[standard_title_en_{{$i}}]" value="{{ getSettingValue('standard_title_en_'.$i) }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label text-muted">Title (Japanese)</label>
                                                        <input type="text" class="form-control" placeholder="Enter title japanease" name="setting[standard_title_ja_{{$i}}]" value="{{ getSettingValue('standard_title_ja_'.$i) }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label text-muted">Value</label>
                                                        <input type="text" class="form-control" placeholder="Enter value" name="setting[standard_value_{{$i}}]" value="{{ getSettingValue('standard_value_'.$i) }}">
                                                    </div>
                                                </div>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pro" role="tabpanel" aria-labelledby="pro-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label text-muted">ECN Standard Header (English)</label>
                                                    <input type="text" class="form-control" placeholder="Enter header title" name="setting[pro_header]" value="{{ getSettingValue('pro_header_en') }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label text-muted">ECN Standard Header (Japanese)</label>
                                                    <input type="text" class="form-control" placeholder="Enter header title" name="setting[pro_header_ja]" value="{{ getSettingValue('pro_header_ja') }}">
                                                </div>
                                            </div>
                                            @for($i=1; $i<=8; $i++)
                                            <div class="form-group row my-2">
                                                <div class="col-md-4">
                                                    <label class="form-label text-muted">Title (English)</label>
                                                    <input type="text" class="form-control" placeholder="Enter title" name="setting[pro_title_en_{{$i}}]" value="{{ getSettingValue('pro_title_en_'.$i) }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label text-muted">Title (Japanese)</label>
                                                    <input type="text" class="form-control" placeholder="Enter title japanease" name="setting[pro_title_ja_{{$i}}]" value="{{ getSettingValue('pro_title_ja_'.$i) }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label text-muted">Value</label>
                                                    <input type="text" class="form-control" id="android" placeholder="Enter value" name="setting[pro_value_{{$i}}]" value="{{ getSettingValue('pro_value_'.$i) }}">
                                                </div>
                                            </div>
                                            @endfor
                                        </div>
                                        <div class="tab-pane fade" id="ecn" role="tabpanel" aria-labelledby="ecn-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label text-muted">STP Premier Header (English)</label>
                                                    <input type="text" class="form-control" placeholder="Enter header title" name="setting[ecn_header_en]" value="{{ getSettingValue('ecn_header_en') }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label text-muted">STP Premier Header (Japanese)</label>
                                                    <input type="text" class="form-control" placeholder="Enter header title" name="setting[ecn_header_ja]" value="{{ getSettingValue('ecn_header_ja') }}">
                                                </div>
                                            </div>
                                            @for($i=1; $i<=8; $i++)
                                            <div class="form-group row my-2">
                                                <div class="col-md-4">
                                                    <label class="form-label text-muted">Title (English)</label>
                                                    <input type="text" class="form-control" placeholder="Enter title" name="setting[ecn_title_en_{{$i}}]" value="{{ getSettingValue('ecn_title_en_'.$i) }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label text-muted">Title (Japanese)</label>
                                                    <input type="text" class="form-control" placeholder="Enter title japanease" name="setting[ecn_title_ja_{{$i}}]" value="{{ getSettingValue('ecn_title_ja_'.$i) }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label text-muted">Value</label>
                                                    <input type="text" class="form-control" placeholder="Enter value" name="setting[ecn_value_{{$i}}]" value="{{ getSettingValue('ecn_value_'.$i) }}">
                                                </div>
                                            </div>
                                            @endfor
                                        </div>
                                        <div class="tab-pane fade" id="premium" role="tabpanel" aria-labelledby="premium-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label text-muted">ECN Premier Header (English)</label>
                                                    <input type="text" class="form-control" placeholder="Enter header title" name="setting[premium_header_en]" value="{{ getSettingValue('premium_header_en') }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label text-muted">ECN Premier Header (Japanese)</label>
                                                    <input type="text" class="form-control" placeholder="Enter header title" name="setting[premium_header_ja]" value="{{ getSettingValue('premium_header_ja') }}">
                                                </div>
                                            </div>
                                            @for($i=1; $i<=8; $i++)
                                            <div class="form-group row my-2">
                                                <div class="col-md-4">
                                                    <label class="form-label text-muted">Title (English)</label>
                                                    <input type="text" class="form-control" placeholder="Enter title" name="setting[premium_title_en_{{$i}}]" value="{{ getSettingValue('premium_title_en_'.$i) }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label text-muted">Title (Japanese)</label>
                                                    <input type="text" class="form-control" placeholder="Enter title japanease" name="setting[premium_title_ja_{{$i}}]" value="{{ getSettingValue('premium_title_ja_'.$i) }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label text-muted">Value</label>
                                                    <input type="text" class="form-control" placeholder="Enter value" name="setting[premium_value_{{$i}}]" value="{{ getSettingValue('premium_value_'.$i) }}">
                                                </div>
                                            </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-left">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        
                    </form>
                </div>

            </div>
            <div id="terms_setting" class="tab-pane"><br>
                <form action="{{ route('admin.update_setting') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="form-label text-muted">Header Image</label>
                                    <input type="file" name="setting[terms_header_img]" class="form-control">
                                </div>
                                @if(getSettingValue('terms_header_img'))
                                <div class="col-md-6">
                                    <img src="{{ asset('storage/Setting/'.getSettingValue('terms_header_img')) }}" loading="lazy" alt="" width="100px" height="100px">
                                </div>
                                @endif
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-md-6">
                                    <label class="form-label text-muted">Terms Title (English)</label>
                                    <input type="text" class="form-control" name="setting[terms_title_en]" value="{{ getSettingValue('terms_title_en') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted">Terms Title (Japanese)</label>
                                    <input type="text" class="form-control" name="setting[terms_title_ja]" value="{{ getSettingValue('terms_title_ja') }}">
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-md-12">
                                    <label class="form-label text-muted">Terms Content (English)</label>
                                    <textarea name="setting[terms_desc_en]" class="terms ckeditor">{{ getSettingValue('terms_desc_en') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-md-12">
                                    <label class="form-label text-muted">Terms Content (Japanese)</label>
                                    <textarea name="setting[terms_desc_ja]" class="terms ckeditor">{{ getSettingValue('terms_desc_ja') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-left">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
            <div id="privacy_setting" class="tab-pane"><br>
                <form action="{{ route('admin.update_setting') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="form-label text-muted">Header Image</label>
                                    <input type="file" name="setting[privacy_header_img]" class="form-control">
                                </div>
                                @if(getSettingValue('privacy_header_img'))
                                <div class="col-md-6">
                                    <img src="{{ asset('storage/Setting/'.getSettingValue('privacy_header_img')) }}" loading="lazy" alt="" width="100px" height="100px">
                                </div>
                                @endif
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-md-6">
                                    <label class="form-label text-muted">Privacy Policy Title (English)</label>
                                    <input type="text" class="form-control" name="setting[privacy_title_en]" value="{{ getSettingValue('privacy_title_en') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted">Privacy Policy Title (Japanese)</label>
                                    <input type="text" class="form-control" name="setting[privacy_title_ja]" value="{{ getSettingValue('privacy_title_ja') }}">
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-md-12">
                                    <label class="form-label text-muted">Privacy Policy Content (English)</label>
                                    <textarea name="setting[privacy_desc_en]" class="terms ckeditor">{{ getSettingValue('privacy_desc_en') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-md-12">
                                    <label class="form-label text-muted">Privacy Policy Content (Japanese)</label>
                                    <textarea name="setting[privacy_desc_ja]" class="terms ckeditor">{{ getSettingValue('privacy_desc_ja') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-left">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
            <div id="category" class="tab-pane {{Route::current()->getName() == 'admin.setting.category' ? 'active' : ''}}">
                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addShareCategory" data-bs-whatever="@mdo" id="addBtn">Add</button>
                @if(Route::currentRouteName()=='admin.setting.category')
                {{$dataTable->table(['class' => 'table table-bordered dt-responsive nowrap','style' => 'width: 100%']) }}
                @endif
            </div>
            <div id="sharecategory" class="tab-pane {{Route::current()->getName() == 'admin.setting.viewshareCategory' ? 'active' : ''}}">
                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addCategory" data-bs-whatever="@mdo" id="addBtn">Add</button>
                {{$dataTable->table(['class' => 'table table-bordered dt-responsive nowrap','style' => 'width: 100%']) }}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addShareCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-category" method="post">
                    @csrf
                    <input type="hidden" name="category_id[]" id="category_id">
                    <div class="mb-3">
                        <label for="title" class="form-label">Name (English)</label>
                        <input type="text" class="form-control en_name" name="en_name[]">
                        <span class="invalid-feedback d-block"> </span>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Name (Japanese)</label>
                        <input type="text" class="form-control ja_name" name="ja_name[]">
                        <span class="invalid-feedback d-block"> </span>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Share Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-share-category" method="post">
                    @csrf
                    <input type="hidden" name="share_category_id" id="share_category_id">
                    <div class="mb-3">
                        <label for="title" class="form-label">Name (English)</label>
                        <input type="text" class="form-control en_name" name="en_name">
                        <span class="invalid-feedback d-block"> </span>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Name (Japanese)</label>
                        <input type="text" class="form-control ja_name" name="ja_name">
                        <span class="invalid-feedback d-block"> </span>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
{!! $dataTable->scripts() !!}

<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('ckeditor');

    if (window.location.pathname == "/PrexSecureCpanel/setting/share-category") {
        $("#sharecategory").addClass("active");
    }

    if (window.location.pathname == "/PrexSecureCpanel/setting/category") {
        $("#category").addClass("active");
    }
    $(document).on('click', '#shareTable', function() {
        window.location.href = "{{route('admin.setting.share-category')}}"
    });
    $(document).on('click', '#categoryTable', function() {
        window.location.href = "{{route('admin.setting.category')}}"
    });
    setTimeout(function() {
        $(document).find('.terms').next().find('.cke_contents').attr('style', 'height:1000px');
    }, 1000);

    $(document).on('click', '#addBtn', function() {
        $('.en_name,.ja_name').val("");
        $('.invalid-feedback').html('');
    });


    $('#add-category').validate({
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        rules: {
            'en_name[]': {
                required: true,
            },
            'ja_name[]': {
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
            $('.invalid-feedback').html('');
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.add_category') }}",
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#addShareCategory').modal('toggle');
                    Swal.fire(
                        'Good job!',
                        'Category Added Successfully',
                        'success'
                    )

                    $('#articlecategory-table').DataTable().ajax.reload();
                },
                error: function(error) {
                    var errors = $.parseJSON(error.responseText);
                    $.each(errors.errors, function(key, value) {
                        var key = key.substring(0, 7)
                        $('#add-category').find('.' + key).nextAll('span').html(value[0]);
                    });
                }
            });
        },
    });

    $(document).on('click', '#category_delete', function() {
        var id = $(this).attr('category-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.category-delete') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'id': id
                    },
                    success: function(data) {
                        if (data) {
                            Swal.fire(
                                'Deleted!',
                                'Category has been deleted.',
                                'success'
                            )
                            $('#articlecategory-table').DataTable().ajax.reload();
                        }
                    }
                });
            } else {
                Swal.fire("Cancelled", "Your record is safe :)", "error");
            }
        })
    });
    $(document).on('click', '.edit-category', function() {
        $('.invalid-feedback').html('');
        var id = $(this).attr("data-id");
        $('#category_id').val(id)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: "{{ route('admin.setting.category-edit')}}",
            method: 'get',
            data: {
                'id': id
            },
            cache: false,
            success: function(result) {
                $('.en_name').val(result.en_name);
                $('.ja_name').val(result.ja_name);
            }
        });
    });

    $('#add-share-category').validate({
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        rules: {
            'en_name': {
                required: true,
            },
            'ja_name': {
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
            $('.invalid-feedback').html('');
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.add_share_category') }}",
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#addCategory').modal('toggle');

                    Swal.fire(
                        'Good job!',
                        'Share Category Added Successfully',
                        'success'
                    )
                    window.LaravelDataTables["sharecategory-table"].draw();


                },
                error: function(error) {
                    var errors = $.parseJSON(error.responseText);
                    $.each(errors.errors, function(key, value) {
                        console.log(key);
                        $('#add-share-category').find('.' + key).nextAll('span').html(value[0]);
                    });
                }
            });
        },
    });

    $(document).on('click', '#share_category_delete', function() {
        var id = $(this).attr('share-category-id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.share-category-delete') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'id': id
                    },
                    success: function(data) {
                        if (data) {
                            Swal.fire(
                                'Deleted!',
                                'Category has been deleted.',
                                'success'
                            )
                            window.LaravelDataTables["sharecategory-table"].draw();
                        }
                    }
                });
            } else {
                Swal.fire("Cancelled", "Your record is safe :)", "error");
            }
        })
    });

    $(document).on('click', '.edit-share-category', function() {
        $('.invalid-feedback').html('');
        var id = $(this).attr("data-id");
        $('#share_category_id').val(id)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: "{{ route('admin.setting.share-category-edit')}}",
            method: 'get',
            data: {
                'id': id
            },
            cache: false,
            success: function(result) {
                $('.en_name').val(result.en_name);
                $('.ja_name').val(result.ja_name);
            }
        });
    });

    $(document).on('click', '.add_faq', function() {
        clone_div = $(".faq_section_row:first").clone();
        clone_div.find('.remove_faq').removeClass('d-none');
        clone_div.insertAfter(".faq_section_row:last");
        clone_div.find('.image').val('');
        clone_div.find('.imageLabel').remove();
        clone_div.find('.imageDiv').hide();
        change_name();
    });

    var remove_payment_ids = [];
    $(document).on('click', '.remove_faq', function() {
        $(this).parent().parent().parent().remove();
        remove_payment_ids.push($(this).parents('.faq_section_row').find('.section_id').val());
        $('.remove_sec_ids').val(remove_payment_ids);

    });

    function change_name() {
        var n = 2;
        $(".faq_section_row").each(function() {
            console.log(n);
            $(this).find('.image').attr('name', 'setting[payment_' + (n - 2) + ']');
            n++;
        });

    }
</script>
@endpush