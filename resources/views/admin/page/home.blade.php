@extends('admin.layouts.master')

@section('title', 'Home')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap');
</style>
<link rel="stylesheet" href="{{ asset('custom.css') }}">

<div class="animated fadeIn">

    <!-- ----------- section 1 ------------------- -->
    @php isset($section) ? $section1 = $section->where('section_no', 1)->first() : '' @endphp

    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec2">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec2">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_2" aria-expanded="true" aria-controls="sec_2">
                    <i class="ri-global-line me-2"></i>Sub Sections
                </button>
            </h2>
            <form action="{{ route('admin.save_section', ['sec_no' => 1]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div id="sec_2" class="accordion-collapse collapse" aria-labelledby="Sec2" data-bs-parent="#sec2">
                    <div class="accordion-body">
                        <input type="hidden" name="status" value="1">
                        <input type="hidden" name="remove_subsec_ids" class="remove_subsec_ids" value="">
                        @php $section1=$section->where('section_no', 1)->first() @endphp
                        @if(count($section1->subSection))
                        <input type="hidden" name="section_id" value="{{$section1->id}}">

                        @foreach($section1->subSection as $i => $sub_sec)
                        <div class="faq_section_row">
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                    <button type="button" class="btn btn-danger remove_faq m-1 {{$i > 0 ? '' : 'd-none'}}"><i class="ri-subtract-fill"></i></button>
                                </div>
                            </div>

                            <input type="hidden" name="page_id" value="0">
                            <input type="hidden" name="sub_section[{{$i}}][sec_no]" class="sec_no" value="{{$i+1}}">

                            @if(isset($sub_sec))
                            <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" class="sub_section_id" value="{{ $sub_sec->id }}">
                            @endif

                            <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3" id="sub_section{{$i}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="Sub_section_{{$i}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_section_{{$i}}" aria-expanded="false" aria-controls="sub_section_{{$i}}">
                                            <i class="ri-global-line me-2"></i> <span class="acc_header">{{ isset($sub_sec) ? $sub_sec->en_title : 'Sub Section '.$i }}</span>
                                        </button>
                                    </h2>
                                    <div id="sub_section_{{$i}}" class="accordion-collapse collapse" aria-labelledby="sub_section_{{$i}}" data-bs-parent="#sub_section{{$i}}">
                                        <div class="accordion-body">
                                            <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                                <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                                <input class="form-check-input code-switcher status" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ isset($sub_sec) ? (($sub_sec->status == 1) ? 'checked' : '') : 'checked' }}>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-6 col-md-6 mb-3">
                                                    <label for="title" class="form-label mx-2">Image</label>
                                                    <div class="s-preview-img my-product-img">
                                                        <input type="hidden" name="sub_section[{{$i}}][image]" class="image" value="{{ $sub_sec->getRawOriginal('image')}}">
                                                        <input type="file" name="sub_section[{{$i}}][image]" class="image custom_img form-control">

                                                        <img src="{{ isset($sub_sec->image) ? $sub_sec->image : '' }}" loading="lazy" class="img-fluid" id="main_image" alt="" />
                                                        <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                                                        <div class="p-upload-icon">
                                                            <i class="ri-upload-cloud-2-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (English)</label>
                                                        <input type="text" class="form-control en_title" name="sub_section[{{$i}}][en_title]" value="{{ isset($sub_sec) ? $sub_sec->en_title : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (Japanese)</label>
                                                        <input type="text" class="form-control ja_title" name="sub_section[{{$i}}][ja_title]" value="{{ isset($sub_sec) ? $sub_sec->ja_title : '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (English)</label>
                                                        <textarea name="sub_section[{{$i}}][en_desc]" class="ckeditor en_desc" cols="100" rows="5">{{ isset($sub_sec) ? $sub_sec->en_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (Japanese)</label>
                                                        <textarea name="sub_section[{{$i}}][ja_desc]" class="ckeditor ja_desc" cols="100" rows="5">{{ isset($sub_sec) ? $sub_sec->ja_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
                        @else
                        <div class="faq_section_row">
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                    <button type="button" class="btn btn-danger remove_faq m-1 d-none"><i class="ri-subtract-fill"></i></button>
                                </div>
                            </div>

                            <input type="hidden" name="page_id" value="0">
                            <input type="hidden" name="sub_section[0][sec_no]" value="2" class="sec_no">

                            <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3" id="sub_section3">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="Sub_section_3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_section_3" aria-expanded="false" aria-controls="sub_section_3">
                                            <i class="ri-global-line me-2"></i><span class="acc_header">Sub Section 1</span>
                                        </button>
                                    </h2>
                                    <div id="sub_section_3" class="accordion-collapse collapse" aria-labelledby="sub_section_3" data-bs-parent="#sub_section3">
                                        <div class="accordion-body">
                                            <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                                <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[0][status]" checked="true">
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-6 col-md-6 mb-3">
                                                    <label for="title" class="form-label mx-2">Image</label>
                                                    <div class="s-preview-img my-product-img">
                                                        <input type="file" name="sub_section[0][image]" class="image custom_img form-control">

                                                        <img src="{{ isset($section1->image) ? $section1->image : '' }}" loading="lazy" class="img-fluid" id="main_image" alt="" />
                                                        <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                                                        <div class="p-upload-icon">
                                                            <i class="ri-upload-cloud-2-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (English)</label>
                                                        <input type="text" class="form-control en_title" name="sub_section[0][en_title]" value="">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (Japanese)</label>
                                                        <input type="text" class="form-control ja_title" name="sub_section[0][ja_title]" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (English)</label>
                                                        <textarea name="sub_section[0][en_desc]" class="ckeditor en_desc" cols="100" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (Japanese)</label>
                                                        <textarea name="sub_section[0][ja_desc]" class="ckeditor ja_desc" cols="100" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <input type="submit" value="Save" id="common_save" class="btn btn-primary m-4">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- ----------- section 2 ------------------- -->

    @php isset($section) ? $section2 = $section->where('section_no', 2)->first() : '' @endphp
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="home2">
        <div class="accordion-item">
            <h2 class="accordion-header" id="home2">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#home_2" aria-expanded="true" aria-controls="home_2">
                    <i class="ri-global-line me-2"></i>{{ isset($$section2) ? $section2->en_title : 'Section 2'}}
                </button>
            </h2>
            <div id="home_2" class="accordion-collapse collapse" aria-labelledby="home2" data-bs-parent="#home2">
                <div class="accordion-body">
                    <form action="{{ route('admin.save_section', ['sec_no' => 2]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="0">
                        @if(isset($section2))
                        <input type="hidden" name="section_id" value="{{ $section2->id }}">
                        @endif
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section2) ? (($section2->status == 1) ? "checked" : "") : "checked" }}>
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

                        <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------- section 3 ------------------- -->

    @php isset($section) ? $section3 = $section->where('section_no', 3)->first() : '' @endphp
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="home3">
        <div class="accordion-item">
            <h2 class="accordion-header" id="HomeSection3">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#home_section_3" aria-expanded="true" aria-controls="home_section_3">
                    <i class="ri-global-line me-2"></i>{{ isset($section3->en_title) ? $section3->en_title : 'Section 3'}}
                </button>
            </h2>
            <div id="home_section_3" class="accordion-collapse collapse" aria-labelledby="HomeSection3" data-bs-parent="#home3">
                <div class="accordion-body">
                    <form action="{{ route('admin.save_section', ['sec_no' => 3]) }}" method="post">
                        @csrf
                        <input type="hidden" name="page_id" value="0">
                        @if(isset($section3))
                        <input type="hidden" name="section_id" value="{{ $section3->id }}">
                        @endif
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section3) ? (($section3->status == 1) ? "checked" : "") : "checked" }}>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_title" value="{{ old('en_title', isset($section3->en_title) ? $section3->en_title : '') }}">
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


                        @for($i=1; $i<=6; $i++) @php $sub_section3=$section3->subSection[$i-1] ?? '' @endphp

                            @if($sub_section3)
                            <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" value="{{ $sub_section3->id }}">
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
                                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ isset($section4) ? (($section4->status == 1) ? "checked" : "") : "checked" }}>
                                            </div>
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (English)</label>
                                                        <input type="text" class="form-control" id="title" name="sub_section[{{$i}}][en_title]" value="{{ $sub_section3 ? $sub_section3->en_title : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (Japanese)</label>
                                                        <input type="text" class="form-control" id="ja_title" name="sub_section[{{$i}}][ja_title]" value="{{ $sub_section3 ? $sub_section3->ja_title : '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (English)</label>
                                                        <textarea name="sub_section[{{$i}}][en_desc]" class="form-control" cols="100" rows="5">{{ $sub_section3 ? $sub_section3->en_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (Japanese)</label>
                                                        <textarea name="sub_section[{{$i}}][ja_desc]" class="form-control" cols="100" rows="5">{{ $sub_section3 ? $sub_section3->ja_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor

                            <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------- section 4 ------------------- -->
    @php isset($section) ? $section4 = $section->where('section_no', 4)->first() : '' @endphp
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="home4">
        <div class="accordion-item">
            <h2 class="accordion-header" id="HomeSection4">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#home_section_4" aria-expanded="true" aria-controls="home_section_4">
                    <i class="ri-global-line me-2"></i>{{ isset($section4->en_title) ? $section4->en_title : 'Section 4'}}
                </button>
            </h2>
            <div id="home_section_4" class="accordion-collapse collapse" aria-labelledby="HomeSection4" data-bs-parent="#home4">
                <div class="accordion-body">
                    <form action="{{ route('admin.save_section', ['sec_no' => 4]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="0">
                        @if(isset($section4))
                        <input type="hidden" name="section_id" value="{{ $section4->id }}">
                        @endif
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section4) ? (($section4->status == 1) ? "checked" : "") : "checked" }}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-6 col-md-6 mb-3">
                                <label for="title" class="form-label mx-2">Image</label>
                                <div class="s-preview-img my-product-img">
                                    @if(isset($section4->image))
                                    <input type="hidden" name="image" value="{{$section4->getRawOriginal('image')}}">
                                    @endif
                                    <input type="file" name="image" class="form-control custom_img">

                                    <img src="{{ isset($section4->image) ? $section4->image : '' }}" class="img-fluid" id="main_image" alt="" loading="lazy" />
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
                                    <input type="text" class="form-control" id="title" name="en_title" value="{{ old('en_title', isset($section4->en_title) ? $section4->en_title : '') }}">
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

                        @for($i=1; $i<=3; $i++) @php $sub_section4=$section4->subSection[$i-1] ?? '' @endphp

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


                                            {{--
                                                        <div class="row gy-4 mt-1">
                                                        <div class="col-xxl-6 col-md-6">
                                                            <div>
                                                                <label for="title" class="form-label">Description (English)</label>
                                                                <textarea name="sub_section[{{$i}}][en_desc]" class="form-control" cols="100" rows="5">{{ old('en_desc', $sub_section4 ? $sub_section4->en_desc : '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6">
                                        <div>
                                            <label for="title" class="form-label">Description (Japanese)</label>
                                            <textarea name="sub_section[{{$i}}][ja_desc]" class="form-control" cols="100" rows="5">{{ old('ja_desc', $sub_section4 ? $sub_section4->ja_desc : '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                --}}


                            </div>
                </div>
            </div>
        </div>
        @endfor

        <input type="submit" value="Save" class="btn btn-primary my-4">
        </form>
    </div>
</div>
</div>
</div>

<!-- ----------- section 5 ------------------- -->
@php isset($section) ? $section5 = $section->where('section_no', 5)->first() : '' @endphp
<div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="home5">
    <div class="accordion-item">
        <h2 class="accordion-header" id="HomeSection5">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#home_section_5" aria-expanded="true" aria-controls="home_section_5">
                <i class="ri-global-line me-2"></i>{{ isset($section5->en_title) ? $section5->en_title : 'Section 5'}}
            </button>
        </h2>
        <div id="home_section_5" class="accordion-collapse collapse" aria-labelledby="HomeSection5" data-bs-parent="#home5">
            <div class="accordion-body">
                <form action="{{ route('admin.save_section', ['sec_no' => 5]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="page_id" value="0">
                    @if(isset($section5))
                    <input type="hidden" name="section_id" value="{{ $section5->id }}">
                    @endif
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section5) ? (($section5->status == 1) ? "checked" : "") : "checked" }}>
                            </div>
                        </div>
                    </div>
                    <div class="row gy-4 mt-1">
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="title" class="form-label">Video</label>
                                <input type="file" name="video" class="form-control" id="video">
                            </div>
                        </div>
                    </div>
                    <div class="row gy-4 mt-1">
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
                    <div class="row gy-4 mt-1">
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

                    @for($i=1; $i<=3; $i++) <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3" id="sub_sec_{{$i}}">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="sub_sec_{{$i}}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_sec{{$i}}" aria-expanded="false" aria-controls="sub_sec{{$i}}">
                                    <i class="ri-global-line me-2"></i> Sub Section {{$i}}
                                </button>
                            </h2>
                            @php $sub_section5 = $section5->subSection[$i-1] ?? '' @endphp
                            @if($sub_section5)
                            <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" value="{{ $sub_section5->id }}">
                            @endif
                            <div id="sub_sec{{$i}}" class="accordion-collapse collapse" aria-labelledby="sub_sec_{{$i}}" data-bs-parent="#sub_sec_{{$i}}">
                                <div class="accordion-body">
                                    <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                        <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                        <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ isset($sub_section5->status) ? (($sub_section5->status == 1) ? "checked" : "") : "checked" }}>
                                    </div>
                                    <div class="row gy-4">
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="title" class="form-label">Title (English)</label>
                                                <input type="text" class="form-control" id="title" name="sub_section[{{$i}}][en_title]" value="{{ old('en_title', isset($sub_section5->en_title) ? $sub_section5->en_title : '') }}">
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="title" class="form-label">Title (Japanese)</label>
                                                <input type="text" class="form-control" id="ja_title" name="sub_section[{{$i}}][ja_title]" value="{{ old('ja_title', isset($sub_section5->ja_title) ? $sub_section5->ja_title : '') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gy-4 mt-1">
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="title" class="form-label">Description (English)</label>
                                                <textarea name="sub_section[{{$i}}][en_desc]" class="form-control" cols="100" rows="5">{{ old('en_desc', isset($sub_section5->en_desc) ? $sub_section5->en_desc : '') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="title" class="form-label">Description (Japanese)</label>
                                                <textarea name="sub_section[{{$i}}][ja_desc]" class="form-control" cols="100" rows="5">{{ old('ja_desc', isset($sub_section5->ja_desc) ? $sub_section5->ja_desc : '') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
            @endfor

            <input type="submit" value="Save" class="btn btn-primary my-4">
            </form>
        </div>
    </div>
</div>

<!-- ----------- section 6 ------------------- -->
@php isset($section) ? $section6 = $section->where('section_no', 6)->first() : '' @endphp
<div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="home6">
    <div class="accordion-item">
        <h2 class="accordion-header" id="HomeSection6">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#home_section_6" aria-expanded="true" aria-controls="home_section_6">
                <i class="ri-global-line me-2"></i>{{ isset($section6->en_title) ? $section6->en_title : 'Section 6'}}
            </button>
        </h2>
        <div id="home_section_6" class="accordion-collapse collapse" aria-labelledby="HomeSection6" data-bs-parent="#home6">
            <div class="accordion-body">
                <form action="{{ route('admin.save_section', ['sec_no' => 6]) }}" method="post">
                    @csrf
                    <input type="hidden" name="page_id" value="0">
                    @if(isset($section6))
                    <input type="hidden" name="section_id" value="{{ $section6->id }}">
                    @endif
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section6) ? (($section6->status == 1) ? "checked" : "") : "checked" }}>
                            </div>
                        </div>
                    </div>
                    <div class="row gy-4">
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="title" class="form-label">Title (English)</label>
                                <input type="text" class="form-control" id="title" name="en_title" value="{{ old('en_title', isset($section6) ? $section6->en_title : '') }}">
                            </div>
                        </div>
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="title" class="form-label">Title (Japanese)</label>
                                <input type="text" class="form-control" id="ja_title" name="ja_title" value="{{ old('ja_title', isset($section6) ? $section6->ja_title : '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="dec" class="form-label">Description (English)</label>
                                <textarea name="en_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', isset($section6) ? $section6->en_desc : '') }}</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="dec" class="form-label">Description (Japanese)</label>
                                <textarea name="ja_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_desc', isset($section6) ? $section6->ja_desc : '') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h6>Sub Sections</h6>
                        </div>
                        <div class="card-body">
                            @for($i=1; $i<=3; $i++) @php $sub_section6=$section6->subSection[$i-1] ?? '' @endphp
                                @if($sub_section6)
                                <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" value="{{ $sub_section6->id }}">
                                @endif
                                <div class="mb-3">
                                    <div class="form-check form-switch form-switch-md d-none">
                                        <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                        <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]" value="on">
                                    </div>
                                    <div class="row gy-4">
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="title" class="form-label">Title {{ $i }} (English)</label>
                                                <input type="text" class="form-control" id="title" name="sub_section[{{$i}}][en_title]" value="{{ old('en_title', $sub_section6 ? $sub_section6->en_title : '') }}">
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="title" class="form-label">Title {{ $i }} (Japanese)</label>
                                                <input type="text" class="form-control" id="ja_title" name="sub_section[{{$i}}][ja_title]" value="{{ old('ja_title', $sub_section6 ? $sub_section6->ja_title : '') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                        </div>
                    </div>

                    <input type="submit" value="Save" class="btn btn-primary my-4">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ----------- section 8 ------------------- -->
@php isset($section) ? $section8 = $section->where('section_no', 8)->first() : '' @endphp
<div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="faq">
    <div class="accordion-item">
        <h2 class="accordion-header" id="faq">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq_sec" aria-expanded="true" aria-controls="faq_sec">
                <i class="ri-question-fill me-2"></i>News Section
            </button>
        </h2>

        <div id="faq_sec" class="accordion-collapse collapse" aria-labelledby="faq" data-bs-parent="#faq">
            <div class="accordion-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.save_section', ['sec_no' => 8]) }}" method="post">
                            @csrf
                            <input type="hidden" name="page_id" value="0">
                            @if(isset($section8))
                            <input type="hidden" name="section_id" value="{{ $section8->id }}">
                            @endif
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                        <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                        <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section8) ? (($section8->status == 1) ? "checked" : "") : "checked" }}>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="title" class="form-label">Title (English)</label>
                                        <input type="text" class="form-control" id="title" name="en_title" value="{{ old('en_title', isset($section8) ? $section8->en_title : '') }}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="title" class="form-label">Title (Japanese)</label>
                                        <input type="text" class="form-control" id="ja_title" name="ja_title" value="{{ old('ja_title', isset($section8) ? $section8->ja_title : '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="dec" class="form-label">Description (English)</label>
                                        <textarea name="en_desc" class="form-control" id="description" cols="10" rows="5">{{ old('en_desc', isset($section8) ? $section8->en_desc : '') }}</textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="dec" class="form-label">Description (Japanese)</label>
                                        <textarea name="ja_desc" class="form-control" id="description" cols="10" rows="5">{{ old('ja_desc', isset($section8) ? $section8->ja_desc : '') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="Save" class="btn btn-primary my-4">
                        </form>
                    </div>
                </div>
            </div>
            <a class="btn btn-primary my-2 mx-4 float-right" href="{{ route('admin.article', 'home') }}">Add</a>
            <div class="accordion-body">
                {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap','style' => 'width: 100%']) !!}
            </div>
        </div>
    </div>
</div>

<!-- forex trading broker banner section -->
<!-- ----------- section  ------------------- -->
@php isset($section) ? $section29 = $section->where('section_no', 29)->first() : '' @endphp
<div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="home29">
    <div class="accordion-item">
        <!-- main section name -->
        <h2 class="accordion-header" id="HomeSection29">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#home_section_29" aria-expanded="true" aria-controls="home_section_29">
                <i class="ri-global-line me-2"></i>{{ isset($section29->en_title) ? $section29->en_title : 'Section 29'}}
            </button>
        </h2>
        <!-- end main section name -->

        <div id="home_section_29" class="accordion-collapse collapse" aria-labelledby="HomeSection29" data-bs-parent="#home29">
            <div class="accordion-body">
                <form action="{{ route('admin.save_section', ['sec_no' => 29]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="page_id" value="0">
                    @if(isset($section29))
                    <input type="hidden" name="section_id" value="{{ $section29->id }}">
                    @endif
                    <!-- main status btn -->
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section29) ? (($section29->status == 1) ? "checked" : "") : "checked" }}>
                            </div>
                        </div>
                    </div>
                    <!--end main status btn -->

                    <div class="row gy-4">
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="title" class="form-label">Title (English)</label>
                                <input type="text" class="form-control" id="title" name="en_title" value="{{ old('en_title', isset($section1->en_title) ? $section1->en_title : '') }}">
                            </div>
                        </div>
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="title" class="form-label">Title (Japanese)</label>
                                <input type="text" class="form-control" id="title" name="ja_title" value="{{ old('ja_title', isset($section1->ja_title) ? $section1->ja_title : '') }}">
                            </div>
                        </div>
                    </div>

                    @for($i=1; $i<=9; $i++) @php $sub_section29=$section29->subSection[$i-1] ?? ''; @endphp

                        @if($sub_section29)
                        <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" value="{{ $sub_section29->id }}">
                        @endif

                        <div class="accordion nesting29-accordion custom-accordionwithicon accordion-border-box mt-3" id="sub_sec_{{$i}}">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="sub_sec_{{$i}}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_sec{{$i}}" aria-expanded="false" aria-controls="sub_sec{{$i}}">
                                        <i class="ri-global-line me-2"></i>{{ $sub_section29 ? $sub_section29->en_title : 'Sub Section '.$i }}
                                    </button>
                                </h2>
                                <div id="sub_sec{{$i}}" class="accordion-collapse collapse" aria-labelledby="sub_sec_{{$i}}" data-bs-parent="#sub_sec_{{$i}}">
                                    <div class="accordion-body">

                                        <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                            <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                            <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ isset($sub_section29->status) ? (($sub_section29->status == 1) ? "checked" : "") : "checked" }}>
                                        </div>

                                        <div class="row">
                                            <div class="col-xxl-6 col-md-6 mb-3">
                                                <label for="title" class="form-label mx-2">Image</label>
                                                <div class="s-preview-img my-product-img">
                                                    @if(isset($sub_section29->image))
                                                    <input type="hidden" name="sub_section[{{$i}}][image]" value="{{$sub_section29->getRawOriginal('image')}}">
                                                    @endif
                                                    <input type="file" name="sub_section[{{$i}}][image]" class="form-control custom_img">

                                                    <img src="{{ isset($sub_section29->image) ? $sub_section29->image : '' }}" class="img-fluid" id="main_image_{{$i}}" alt="" loading="lazy" />
                                                    <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                                                    <div class="p-upload-icon">
                                                        <i class="ri-upload-cloud-2-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- banner title -->
                                       <div class="row gy-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="title" class="form-label">Banner Name (English)</label>
                                                    <input type="text" class="form-control" id="en_short_text" name="sub_section[{{$i}}][en_short_text]" value="{{ old('en_short_text', $sub_section29 ? $sub_section29->en_short_text : '') }}">
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="title" class="form-label">Banner Name (Japanese)</label>
                                                    <input type="text" class="form-control" id="ja_short_text" name="sub_section[{{$i}}][ja_short_text]" value="{{ old('ja_short_text', $sub_section29 ? $sub_section29->ja_short_text : '') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end banner title -->

                                        <div class="row gy-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="title" class="form-label">Title (English)</label>
                                                    <input type="text" class="form-control" id="title" name="sub_section[{{$i}}][en_title]" value="{{ old('en_title', $sub_section29 ? $sub_section29->en_title : '') }}">
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="title" class="form-label">Title (Japanese)</label>
                                                    <input type="text" class="form-control" id="ja_title" name="sub_section[{{$i}}][ja_title]" value="{{ old('ja_title', $sub_section29 ? $sub_section29->ja_title : '') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row gy-4 mt-1">
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="dec" class="form-label">Description (English)</label>
                                                    <textarea name="sub_section[{{$i}}][en_desc]" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', $sub_section29 ? $sub_section29->en_desc : '') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="title" class="form-label">Description (Japanese)</label>
                                                    <textarea name="sub_section[{{$i}}][ja_desc]" class="ckeditor_custom" cols="30" rows="10">{{ old('ja_desc', $sub_section29 ? $sub_section29->ja_desc : '') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor

                        <input type="submit" value="Save" class="btn btn-primary my-4">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ------------- section 9 ---------------------------- -->
@php isset($section) ? $section9 = $section->where('section_no', 9)->first() : '' @endphp
<div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="home9">
    <div class="accordion-item">
        <h2 class="accordion-header" id="home9">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#home_9" aria-expanded="true" aria-controls="home_9">
                <i class="ri-global-line me-2"></i>Home Popup
            </button>
        </h2>
        <div id="home_9" class="accordion-collapse collapse" aria-labelledby="home9" data-bs-parent="#home9">
            <div class="accordion-body">
                <form action="{{ route('admin.save_section', ['sec_no' => 9]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="page_id" value="0">
                    @if(isset($section9))
                    <input type="hidden" name="section_id" value="{{ $section9->id }}">
                    @endif
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section9) ? (($section9->status == 1) ? "checked" : "") : "checked" }}>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-6 col-md-6 mb-3">
                            <label for="title" class="form-label mx-2">Image</label>
                            <div class="s-preview-img my-product-img">
                                @if(isset($section9->image))
                                <input type="hidden" name="image" value="{{$section9->getRawOriginal('image')}}">
                                @endif
                                <input type="file" name="image" class="form-control custom_img">

                                <img src="{{ isset($section9->image) ? $section9->image : '' }}" class="img-fluid" id="main_image" alt="" loading="lazy" />
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
                                <input type="text" class="form-control" id="title" name="en_title" value="{{ old('en_title', isset($section9) ? $section9->en_title : '') }}">
                            </div>
                        </div>
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="title" class="form-label">Title (Japanese)</label>
                                <input type="text" class="form-control" id="ja_title" name="ja_title" value="{{ old('ja_title', isset($section9) ? $section9->ja_title : '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="dec" class="form-label">Description (English)</label>
                                <textarea name="en_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', isset($section9) ? $section9->en_desc : '') }}</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="dec" class="form-label">Description (Japanese)</label>
                                <textarea name="ja_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_desc', isset($section9) ? $section9->ja_desc : '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <input type="submit" value="Save" class="btn btn-primary my-4">
                </form>
            </div>
        </div>
    </div>
</div>



</div>



@endsection

@push('scripts')
{!! $dataTable->scripts() !!}
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    /**
     * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
     * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
     */

    CKEDITOR.editorConfig = function(config) {
        config.allowedContent = true;
        config.removeFormatAttributes = '';
    };
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: ".ckeditor_custom",
        plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons checklist mediaembed pageembed permanentpen powerpaste table advtable tableofcontents',
        toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        content_style: "@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;700&display=swap'); body { font-family: 'Noto Sans JP' } h1,h2,h3,h4,h5,h6 { font-family: 'Noto Sans JP' }",
        font_formats: "Arial Black=arial black,avant garde; Courier New=courier new,courier; Lato Black=lato; Roboto=roboto; Noto Sans JP=Noto Sans JP; insertfile link image media",
        // skin: "snow",
        height: 420,
        automatic_uploads: true,
        file_picker_types: 'image',
        //extended_valid_elements: "div[id|dir|class|align|style],span[id|dir|class|align|style],ul[id|dir|class|align|style],li[id|dir|class|align|style]",
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function() {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), {
                        title: file.name
                    });
                };
                reader.readAsDataURL(file);
            };

            input.click();
        },
    });
</script>
<script src="{{ asset('custom.js') }}"></script>
<script>
    $(document).on('click', '.add_faq', function() {
        clone_div = $(".faq_section_row:first").clone();
        clone_div.find('.remove_faq').removeClass('d-none');
        clone_div.insertAfter(".faq_section_row:last");
        clone_div.find('.sub_section_id').val('');
        clone_div.find('#main_image').attr('src', '');

        clone_div.find('.en_title, .ja_title, .en_desc, .ja_desc, .sub_section_id').val('');

        change_name();
    });

    var remove_payment_ids = [];
    $(document).on('click', '.remove_faq', function() {
        $(this).parent().parent().parent().remove();
        remove_payment_ids.push($(this).parents('.faq_section_row').find('.sub_section_id').val());
        $('.remove_subsec_ids').val(remove_payment_ids);
    });

    function change_name() {
        var n = 2;

        $(".faq_section_row").each(function() {
            CKEDITOR.replaceAll('ckeditor');
            $(this).find('.accordion').attr('id', 'sub_section' + n)
            $(this).find('.accordion-header').attr('id', 'Sub_section_' + n)
            $(this).find('.accordion-button').attr('data-bs-target', '#sub_section_' + n).attr('aria-controls', 'sub_section_' + n)
            $(this).find('.accordion-collapse').attr('id', 'sub_section_' + n).attr('data-bs-parent', '#sub_section' + n).attr('aria-labelledby', 'sub_section_' + n)

            $(this).find('.acc_header').html('Sub Section ' + (n - 1));
            $(this).find('.sub_section_id').attr('name', 'sub_section[' + (n - 2) + '][sub_section_id]');
            $(this).find('.sec_no').attr('name', 'sub_section[' + (n - 2) + '][sec_no]');
            $(this).find('.status').attr('name', 'sub_section[' + (n - 2) + '][status]');
            $(this).find('.en_title').attr('name', 'sub_section[' + (n - 2) + '][en_title]');
            $(this).find('.ja_title').attr('name', 'sub_section[' + (n - 2) + '][ja_title]');
            $(this).find('.en_desc').attr('name', 'sub_section[' + (n - 2) + '][en_desc]');
            $(this).find('.ja_desc').attr('name', 'sub_section[' + (n - 2) + '][ja_desc]');
            $(this).find('.image').attr('name', 'sub_section[' + (n - 2) + '][image]');
            $(this).find('.sec_no').val(n);

            n++;
        });

        setTimeout(function() {
            $('.faq_section_row').find('.ckeditor').nextAll().not($('.faq_section_row').find('.ckeditor').next()).remove();
        }, 100);
    }
</script>
@endpush