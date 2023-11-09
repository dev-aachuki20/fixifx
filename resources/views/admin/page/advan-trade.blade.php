@extends('admin.layouts.master')

@section('title', $slug)

@section('content')

<div class="animated fadeIn">
    <!-- ----------- Header Section ------------------- -->
    @include('admin.common.header_section')

    <!-- SECTION 1 -->
    @include('admin.common.title_section')

    <!-- SECTION 2 Features-->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec2">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec2">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_2" aria-expanded="true" aria-controls="sec_2">
                    <i class="ri-global-line me-2"></i>Feature Section
                </button>
            </h2>
            <div id="sec_2" class="accordion-collapse collapse" aria-labelledby="Sec2" data-bs-parent="#sec2">
                <div class="accordion-body">
                    @php isset($section) ? $section2 = $section->where('section_no', 2)->first() : '' @endphp
                    <form action="{{ route('admin.save_section', ['sec_no' => 2]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section2))
                        <input type="hidden" name="section_id" value="{{ $section2->id }}">
                        @endif

                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="customSwitchsizelg" name="status" {{ isset($section2) ? (($section2->status == 1) ? 'checked' : '') : 'checked' }}>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xxl-6 col-md-6 mb-3">
                                <label for="title" class="form-label mx-2">Image</label>
                                <div class="s-preview-img my-product-img">
                                    @if(isset($section2->image))
                                    <input type="hidden" name="image" value="{{$section2->getRawOriginal('image')}}">
                                    @endif
                                    <input type="file" name="image" class="form-control custom_img">

                                    <img src="{{ isset($section2->image) ? $section2->image : '' }}" class="img-fluid" id="main_image" alt="" loading="lazy" />
                                    <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                                    <div class="p-upload-icon">
                                        <i class="ri-upload-cloud-2-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row gy-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_title" value="{{ old('en_title', isset($section2) ? $section2->en_title : '') }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (Japanese)</label>
                                    <input type="text" class="form-control" id="ja_title" name="ja_title" value="{{ old('ja_title', isset($section2) ? $section2->ja_title : '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (English)</label>
                                    <textarea name="en_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', isset($section2) ? $section2->en_desc : '') }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (Japanese)</label>
                                    <textarea name="ja_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_desc', isset($section2) ? $section2->ja_desc : '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- subsection -->
                        @php
                        $i = 0;
                        $sub_section2 = $section2->subSection[$i] ?? false;
                        @endphp

                        @if($sub_section2)
                        <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" value="{{ $sub_section2->id }}">
                        @endif

                        <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3" id="sub_sec_{{$i}}">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="sub_sec_{{$i}}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_sec{{$i}}" aria-expanded="false" aria-controls="sub_sec{{$i}}">
                                        <i class="ri-global-line me-2"></i> Features Point
                                    </button>
                                </h2>
                                <div id="sub_sec{{$i}}" class="accordion-collapse collapse" aria-labelledby="sub_sec_{{$i}}" data-bs-parent="#sub_sec_{{$i}}">
                                    <div class="accordion-body">
                                        <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                            <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                            <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ $sub_section2 ? (($sub_section2->status == 1) ? 'checked' : '') : 'checked' }}>
                                        </div>

                                        <!-- description -->
                                        @if($sub_section2)
                                        <div class="row mt-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="dec" class="form-label">Description (English)</label>
                                                    <textarea name="sub_section[{{$i}}][en_desc]" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', isset($sub_section2) ? $sub_section2->en_desc : '') }}</textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="dec" class="form-label">Description (Japanese)</label>
                                                    <textarea name="sub_section[{{$i}}][ja_desc]" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_desc', isset($sub_section2) ? $sub_section2->ja_desc : '') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end subsection -->

                        <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 3 Benfits-->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec3">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec3">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_3" aria-expanded="true" aria-controls="sec_3">
                    <i class="ri-global-line me-2"></i>FiXi Trading Benefits
                </button>
            </h2>
            <div id="sec_3" class="accordion-collapse collapse" aria-labelledby="Sec3" data-bs-parent="#sec3">
                <div class="accordion-body">
                    @php isset($section) ? $section3 = $section->where('section_no', 3)->first() : '' @endphp
                    <form action="{{ route('admin.save_section', ['sec_no' => 3]) }}" method="post" enctype=multipart/form-data>
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section3))
                        <input type="hidden" name="section_id" value="{{ $section3->id }}">
                        @endif

                        <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                            <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section3) ? (($section3->status == 1) ? 'checked' : '') : 'checked' }}>
                        </div>

                        <div class="row">
                            <div class="col-xxl-6 col-md-6 mb-3">
                                <label for="title" class="form-label mx-2">Image</label>
                                <div class="s-preview-img my-product-img">
                                    @if(isset($section3->image))
                                    <input type="hidden" name="image" value="{{$section3->getRawOriginal('image')}}">
                                    @endif
                                    <input type="file" name="image" class="form-control custom_img">

                                    <img src="{{ isset($section3->image) ? $section3->image : '' }}" class="img-fluid" id="main_image" alt="" loading="lazy" />
                                    <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                                    <div class="p-upload-icon">
                                        <i class="ri-upload-cloud-2-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row gy-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_title" value="{{ old('en_title', isset($section3) ? $section3->en_title : '') }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (Japanese)</label>
                                    <input type="text" class="form-control" id="ja_title" name="ja_title" value="{{ old('ja_title', isset($section3) ? $section3->ja_title : '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (English)</label>
                                    <textarea name="en_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', isset($section3) ? $section3->en_desc : '') }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (Japanese)</label>
                                    <textarea name="ja_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_desc', isset($section3) ? $section3->ja_desc : '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 4 Risk Section-->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec4">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec4">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_4" aria-expanded="true" aria-controls="sec_4">
                    <i class="ri-global-line me-2"></i>Innovative risk-management features
                </button>
            </h2>
            <div id="sec_4" class="accordion-collapse collapse" aria-labelledby="Sec4" data-bs-parent="#sec4">
                <div class="accordion-body">
                    @php isset($section) ? $section4 = $section->where('section_no', 4)->first() : '' @endphp
                    <form action="{{ route('admin.save_section', ['sec_no' => 4]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section4))
                        <input type="hidden" name="section_id" value="{{ $section4->id }}">
                        @endif

                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="customSwitchsizelg" name="status" {{ isset($section4) ? (($section4->status == 1) ? 'checked' : '') : 'checked' }}>
                                </div>
                            </div>
                        </div>

                        <div class="row gy-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_title" value="{{ old('en_title', isset($section4) ? $section4->en_title : '') }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (Japanese)</label>
                                    <input type="text" class="form-control" id="ja_title" name="ja_title" value="{{ old('ja_title', isset($section4) ? $section4->ja_title : '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (English)</label>
                                    <textarea name="en_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', isset($section4) ? $section4->en_desc : '') }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (Japanese)</label>
                                    <textarea name="ja_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_desc', isset($section4) ? $section4->ja_desc : '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- subsection -->
                        @for($i=1; $i<=7; $i++) @php $sub_section4=$section4->subSection[$i-1] ?? false;
                            $isSixthSubSection = $i === 7;
                            @endphp

                            @if($sub_section4)
                            <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" value="{{ $sub_section4->id }}">
                            @endif

                            <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3" id="sub_sec_{{$i}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="sub_sec_{{$i}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_sec{{$i}}" aria-expanded="false" aria-controls="sub_sec{{$i}}">
                                            <i class="ri-global-line me-2"></i> Sub Section {{$i}}
                                        </button>
                                    </h2>
                                    <div id="sub_sec{{$i}}" class="accordion-collapse collapse" aria-labelledby="sub_sec_{{$i}}" data-bs-parent="#sub_sec_{{$i}}">
                                        <div class="accordion-body">
                                            <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                                <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ isset($sub_section4) ? (($sub_section4->status == 1) ? 'checked' : '') : 'checked' }}>
                                            </div>

                                            <!-- image -->
                                            @if(!$isSixthSubSection)
                                            <div class="row">
                                                <div class="col-xxl-6 col-md-6 mb-3">
                                                    <label for="title" class="form-label mx-2">Image</label>
                                                    <div class="s-preview-img my-product-img">
                                                        @if(isset($sub_section4) && $sub_section4->image)
                                                        <input type="hidden" name="sub_section[{{$i}}][image_old]" value="{{$sub_section4->image}}">
                                                        @endif
                                                        <input type="file" name="sub_section[{{$i}}][image]" class="form-control custom_img">
                                                        <img src="{{ isset($sub_section4->image) ? $sub_section4->image : '' }}" class="img-fluid" id="main_image_{{$i}}" alt="" loading="lazy" />
                                                        <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                                                        <div class="p-upload-icon">
                                                            <i class="ri-upload-cloud-2-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (English)</label>
                                                        <input type="text" class="form-control" id="title" name="sub_section[{{$i}}][en_title]" value="{{ $sub_section4 ? $sub_section4->en_title : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (Japanese)</label>
                                                        <input type="text" class="form-control" id="ja_title" name="sub_section[{{$i}}][ja_title]" value="{{ $sub_section4 ? $sub_section4->ja_title : '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            <div class="row mt-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="dec" class="form-label">Description (English)</label>
                                                        <textarea name="sub_section[{{$i}}][en_desc]" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', isset($sub_section4) ? $sub_section4->en_desc : '') }}</textarea>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="dec" class="form-label">Description (Japanese)</label>
                                                        <textarea name="sub_section[{{$i}}][ja_desc]" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_desc', isset($sub_section4) ? $sub_section4->ja_desc : '') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                            <!-- end subsection -->

                            <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- SECTION 5 Discover the full FixiFx offering-->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec5">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec5">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_5" aria-expanded="true" aria-controls="sec_5">
                    <i class="ri-global-line me-2"></i>Discover the full FixiFx offering
                </button>
            </h2>
            <div id="sec_5" class="accordion-collapse collapse" aria-labelledby="Sec5" data-bs-parent="#sec5">
                <div class="accordion-body">
                    @php isset($section) ? $section5 = $section->where('section_no', 5)->first() : '' @endphp
                    <form action="{{ route('admin.save_section', ['sec_no' => 5]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section5))
                        <input type="hidden" name="section_id" value="{{ $section5->id }}">
                        @endif

                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="customSwitchsizelg" name="status" {{ isset($section5) ? (($section5->status == 1) ? 'checked' : '') : 'checked' }}>
                                </div>
                            </div>
                        </div>

                        <div class="row gy-5">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_title" value="{{ old('en_title', isset($section5) ? $section5->en_title : '') }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (Japanese)</label>
                                    <input type="text" class="form-control" id="ja_title" name="ja_title" value="{{ old('ja_title', isset($section5) ? $section5->ja_title : '') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (English)</label>
                                    <textarea name="en_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', isset($section5) ? $section5->en_desc : '') }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (Japanese)</label>
                                    <textarea name="ja_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_desc', isset($section5) ? $section5->ja_desc : '') }}</textarea>
                                </div>
                            </div>
                        </div>


                        <!-- subsection -->
                        @for($i=1; $i<=4; $i++) @php $sub_section5=$section5->subSection[$i-1] ?? false;
                            @endphp

                            @if($sub_section5)
                            <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" value="{{ $sub_section5->id }}">
                            @endif

                            <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3" id="sub_sec_{{$i}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="sub_sec_{{$i}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_sec{{$i}}" aria-expanded="false" aria-controls="sub_sec{{$i}}">
                                            <i class="ri-global-line me-2"></i> Sub Section {{$i}}
                                        </button>
                                    </h2>
                                    <div id="sub_sec{{$i}}" class="accordion-collapse collapse" aria-labelledby="sub_sec_{{$i}}" data-bs-parent="#sub_sec_{{$i}}">
                                        <div class="accordion-body">
                                            <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                                <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ isset($sub_section5) ? (($sub_section5->status == 1) ? 'checked' : '') : 'checked' }}>
                                            </div>

                                            <!-- image -->
                                            <div class="row">
                                                <div class="col-xxl-6 col-md-6 mb-3">
                                                    <label for="title" class="form-label mx-2">Image</label>
                                                    <div class="s-preview-img my-product-img">
                                                        @if(isset($sub_section5) && $sub_section5->image)
                                                        <input type="hidden" name="sub_section[{{$i}}][image_old]" value="{{$sub_section5->image}}">
                                                        @endif
                                                        <input type="file" name="sub_section[{{$i}}][image]" class="form-control custom_img">
                                                        <img src="{{ isset($sub_section5->image) ? $sub_section5->image : '' }}" class="img-fluid" id="main_image_{{$i}}" alt="" loading="lazy" />
                                                        <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                                                        <div class="p-upload-icon">
                                                            <i class="ri-upload-cloud-2-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (English)</label>
                                                        <input type="text" class="form-control" id="title" name="sub_section[{{$i}}][en_title]" value="{{ $sub_section5 ? $sub_section5->en_title : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (Japanese)</label>
                                                        <input type="text" class="form-control" id="ja_title" name="sub_section[{{$i}}][ja_title]" value="{{ $sub_section5 ? $sub_section5->ja_title : '' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="dec" class="form-label">Description (English)</label>
                                                        <textarea name="sub_section[{{$i}}][en_desc]" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', isset($sub_section5) ? $sub_section5->en_desc : '') }}</textarea>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="dec" class="form-label">Description (Japanese)</label>
                                                        <textarea name="sub_section[{{$i}}][ja_desc]" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_desc', isset($sub_section5) ? $sub_section5->ja_desc : '') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                            <!-- end subsection -->

                            <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ -->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="faq">
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq_sec" aria-expanded="true" aria-controls="faq_sec">
                    <i class="ri-question-fill me-2"></i>FAQ Section
                </button>
            </h2>
            <div id="faq_sec" class="accordion-collapse collapse" aria-labelledby="faq" data-bs-parent="#faq">
                <div class="accordion-body">
                    <form action="{{ route('admin.add-edit-faq') }}" method="post">
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">
                        <input type="hidden" name="faq_remove_id" class="faq_remove_ids" value="">
                        @if(count($faqs) && isset($faqs[""]))

                        @foreach($faqs[""] as $k => $faq)
                        <div class="faq_section_row">
                            <div class="card border">
                                <div class="card-header border">
                                    <button class="btn btn-danger remove_faq mx-1 {{ $k>0 ? '' : 'd-none'  }}" type="button" style="float: right;"><i class="ri-subtract-fill"></i></button>
                                    <button class="btn btn-primary add_faq" type="button" style="float: right;"><i class="ri-add-fill"></i></button>
                                </div>
                                <div class="card-body">

                                    <input type="hidden" name="faq[{{$k}}][faq_id]" class="faq_id" value="{{$faq->id}}">

                                    <div class="row gy-4">
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="question" class="form-label">Question (English)</label>
                                                <input type="text" class="form-control en_question" id="question" name="faq[{{$k}}][en_question]" value="{{ $faq->en_question }}">
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="question" class="form-label">Question (Japanese)</label>
                                                <input type="text" class="form-control ja_question" id="ja_question" name="faq[{{$k}}][ja_question]" value="{{ $faq->ja_question }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="dec" class="form-label">Answer (English)</label>
                                                <textarea name="faq[{{$k}}][en_answer]" class="ckeditor en_answer" cols="30" rows="10">{{ $faq->en_answer }}</textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="dec" class="form-label">Answer (Japanese)</label>
                                                <textarea name="faq[{{$k}}][ja_answer]" class="ckeditor ja_answer" cols="30" rows="10">{{ $faq->ja_answer }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="faq_section_row">
                            <div class="card border">
                                <div class="card-header border">
                                    <button class="btn btn-danger remove_faq mx-1 d-none" type="button" style="float: right;"><i class="ri-subtract-fill"></i></button>
                                    <button class="btn btn-primary add_faq" type="button" style="float: right;"><i class="ri-add-fill"></i></button>
                                </div>
                                <div class="card-body">

                                    <div class="row gy-4">
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="question" class="form-label">Question (English)</label>
                                                <input type="text" class="form-control en_question" id="question" name="faq[0][en_question]">
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="question" class="form-label">Question (Japanese)</label>
                                                <input type="text" class="form-control ja_question" id="ja_question" name="faq[0][ja_question]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="dec" class="form-label">Answer (English)</label>
                                                <textarea name="faq[0][en_answer]" class="ckeditor en_answer" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="dec" class="form-label">Answer (Japanese)</label>
                                                <textarea name="faq[0][ja_answer]" class="ckeditor ja_answer" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).on('click', '.add_faq', function() {
        clone_div = $(".faq_section_row:first").clone();
        clone_div.find('.remove_faq').removeClass('d-none').addClass('d-block');
        clone_div.insertAfter(".faq_section_row:last");
        clone_div.find('.en_question, .ja_question, .en_answer, .ja_answer').val('');
        change_name($(this));
    });

    var remove_faq_ids = [];
    $(document).on('click', '.remove_faq', function() {
        $(this).parent().parent().parent().remove();
        remove_faq_ids.push($(this).parent().parent().parent().find('.faq_id').val());
        $('.faq_remove_ids').val(remove_faq_ids);
    });

    function change_name() {
        var n = 0;
        $(".faq_section_row").each(function() {
            CKEDITOR.replaceAll('ckeditor');

            $(this).find('.en_question').attr('name', 'faq[' + n + '][en_question]');
            $(this).find('.ja_question').attr('name', 'faq[' + n + '][ja_question]');
            $(this).find('.en_answer').attr('name', 'faq[' + n + '][en_answer]');
            $(this).find('.ja_answer').attr('name', 'faq[' + n + '][ja_answer]');
            n++;
        });

        setTimeout(function() {
            $('.faq_section_row').find('.ckeditor').nextAll().not($('.faq_section_row').find('.ckeditor').next()).remove();
        }, 100);
    }
</script>
@endpush