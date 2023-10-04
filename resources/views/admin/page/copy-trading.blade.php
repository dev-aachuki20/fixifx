@extends('admin.layouts.master')

@section('title', $slug)

@section('content')

<div class="animated fadeIn">
    <!-- ----------- Header Section ------------------- -->
    @include('admin.common.header_section')

    <!-- SECTION 1 -->
    @include('admin.common.title_section')

    <!-- SECTION 2 -->
    @php isset($section) ? $section2 = $section->where('section_no', 2)->first() : '' @endphp
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="Sec2">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec2">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_2" aria-expanded="true" aria-controls="sec_2">
                    <i class="ri-global-line me-2"></i>{{ isset($section2) ? $section2->en_title : 'Section 2'}}
                </button>
            </h2>
            <div id="sec_2" class="accordion-collapse collapse" aria-labelledby="Sec2" data-bs-parent="#Sec2">
                <div class="accordion-body">
                    <form action="{{ route('admin.save_section', ['sec_no' => 2]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section2))
                        <input type="hidden" name="section_id" value="{{ $section2->id }}">
                        @endif
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section2) ? (($section2->status == 1) ? 'checked' : '') : 'checked' }}>
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
                            <div>
                                <label for="dec" class="form-label">Description (English)</label>
                                <textarea name="en_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', isset($section2) ? $section2->en_desc : '') }}</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row mt-4">
                            <div>
                                <label for="dec" class="form-label">Description (Japanese)</label>
                                <textarea name="ja_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_desc', isset($section2) ? $section2->ja_desc : '') }}</textarea>
                            </div>
                        </div>

                        <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 3 -->
    @php isset($section) ? $section3 = $section->where('section_no', 3)->first() : '' @endphp
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="Sec3">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec3">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_3" aria-expanded="true" aria-controls="sec_3">
                    <i class="ri-global-line me-2"></i>{{ isset($section3) ? $section3->en_title : 'Section 3'}}
                </button>
            </h2>
            <div id="sec_3" class="accordion-collapse collapse" aria-labelledby="Sec3" data-bs-parent="#Sec3">
                <div class="accordion-body">
                    <form action="{{ route('admin.save_section', ['sec_no' => 3]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section3))
                        <input type="hidden" name="section_id" value="{{ $section3->id }}">
                        @endif
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section3) ? (($section3->status == 1) ? 'checked' : '') : 'checked' }}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-6 col-md-6 mb-3">
                                <label for="title" class="form-label mx-2">Image</label>
                                <div class="s-preview-img my-product-img">
                                    @if(isset($section3->image))
                                    <input type="hidden" name="image" value="{{$section3->getRawOriginal('image')}}">
                                    @endif
                                    <input type="file" name="image" class="form-control custom_img">

                                    <img src="{{ isset($section3->image) ? $section3->image : '' }}" class="img-fluid" id="main_image" alt="" loading="lazy"/>
                                    <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                                    <div class="p-upload-icon">
                                        <i class="ri-upload-cloud-2-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6 mb-3">
                                <label for="title" class="form-label mx-2">Japanse Image</label>
                                <div class="s-preview-img my-product-img">
                                    @if(isset($section3->ja_image))
                                    <input type="hidden" name="ja_image" value="{{$section3->getRawOriginal('ja_image')}}">
                                    @endif
                                    <input type="file" name="ja_image" class="form-control custom_img">

                                    <img src="{{ isset($section3->ja_image) ? $section3->ja_image : '' }}" class="img-fluid" id="main_image" alt="" loading="lazy" />
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
                        <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 4 -->
    @php isset($section) ? $section4 = $section->where('section_no', 4)->first() : '' @endphp
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="Sec4">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec4">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_4" aria-expanded="true" aria-controls="sec_4">
                    <i class="ri-global-line me-2"></i>{{ isset($section4) ? $section4->en_title : 'Section 4'}}
                </button>
            </h2>
            <div id="sec_4" class="accordion-collapse collapse" aria-labelledby="Sec4" data-bs-parent="#Sec4">
                <div class="accordion-body">
                    <form action="{{ route('admin.save_section', ['sec_no' => 4]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section4))
                        <input type="hidden" name="section_id" value="{{ $section4->id }}">
                        @endif
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section4) ? (($section4->status == 1) ? 'checked' : '') : 'checked' }}>
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
                        @for($i=1; $i<=4; $i++) @php $sub_section4=$section4->subSection[$i-1] ?? false @endphp

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
                                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ $sub_section4 ? (($sub_section4->status == 1) ? 'checked' : '') : 'checked' }}>
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
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (English)</label>
                                                        <textarea name="sub_section[{{$i}}][en_desc]" class="form-control" cols="100" rows="5">{{ $sub_section4 ? $sub_section4->en_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (Japanese)</label>
                                                        <textarea name="sub_section[{{$i}}][ja_desc]" class="form-control" cols="100" rows="5">{{ $sub_section4 ? $sub_section4->ja_desc : '' }}</textarea>
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

    <!-- SECTION 5 -->
    @php isset($section) ? $section5 = $section->where('section_no', 5)->first() : '' @endphp
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="Sec5">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec5">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_5" aria-expanded="true" aria-controls="sec_5">
                    <i class="ri-global-line me-2"></i>{{ isset($section5) ? $section5->en_title : 'Section 5'}}
                </button>
            </h2>
            <div id="sec_5" class="accordion-collapse collapse" aria-labelledby="Sec5" data-bs-parent="#Sec5">
                <div class="accordion-body">
                    <form action="{{ route('admin.save_section', ['sec_no' => 5]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section5))
                        <input type="hidden" name="section_id" value="{{ $section5->id }}">
                        @endif
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section5) ? (($section5->status == 1) ? 'checked' : '') : 'checked' }}>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4">
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
                        @for($i=1; $i<=2; $i++) @php $sub_section5=$section5->subSection[$i -1] ?? false @endphp
                            @if(!empty($section5->subSection->toArray()))
                            @php $numbers = $section5->subSection->toArray();
                            array_unshift($numbers,"");
                            unset($numbers[0]);
                            @endphp
                            @for($j=1; $j<=4; $j++) <input type="hidden" name="sub_section[{{$j}}][sub_section_id]" value="{{ $numbers[$j]['id'] }}">
                                @endfor
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
                                               
                                                <!-- <div class="row gy-4 mb-2">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="customer-name" class="col-form-label">Icon:</label>
                                                        <input type="text" name="sub_section[{{$i}}][icon]" class="form-control" id="icon" value="{{ $sub_section5 ? $sub_section5->icon : '' }}">
                                                        <small class="error">Note : Only for developer change</small>
                                                    </div>    
                                                </div>
                                            </div> -->
                                                <div class="row gy-4">
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div>
                                                            <label for="title" class="form-label">Title (English)</label>
                                                            <input type="text" class="form-control" id="title" name="{{$i == 1 ? 'en_desc' : 'en_short_text'}}" value="{{ $section5 ? $i == 1 ? $section5->en_desc : $section5->en_short_text : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div>
                                                            <label for="title" class="form-label">Title (Japanese)</label>
                                                            <input type="text" class="form-control" id="ja_title" name="{{$i == 1 ? 'ja_desc' : 'ja_short_text'}}" value="{{ $section5 ? $i == 1 ? $section5->ja_desc : $section5->ja_short_text : '' }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row gy-4 mt-1">
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div>
                                                            <label for="title" class="form-label">Description (English)</label>
                                                            <textarea name="{{$i == 1 ? 'sub_section[1][en_desc]' : 'sub_section[3][en_desc]'}}" class="ckeditor_custom" cols="100" rows="5">{{$i == 1 ? (isset($section5->subSection[0]) == true ? $section5->subSection[0]['en_desc'] : "" ) : (isset($section5->subSection[2]) == true ? $section5->subSection[2]['en_desc'] : '' )}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div>
                                                            <label for="title" class="form-label">Description (Japanese)</label>
                                                            <textarea name="{{$i == 1 ? 'sub_section[1][ja_desc]' : 'sub_section[3][ja_desc]'}}" class="ckeditor_custom" cols="100" rows="5">{{$i == 1 ? (isset($section5->subSection[0]) == true ? $section5->subSection[0]['ja_desc'] : "" ) : (isset($section5->subSection[2]) == true ? $section5->subSection[2]['ja_desc'] : '' )}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row gy-4 mt-1">
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div>
                                                            <label for="title" class="form-label">Description (English)</label>
                                                            <textarea name="{{$i == 1 ?  'sub_section[2][en_desc]' : 'sub_section[4][en_desc]'}}" class="ckeditor_custom" cols="100" rows="5">{{$i == 1 ? (isset($section5->subSection[1]) == true ? $section5->subSection[1]['en_desc'] : "" ) : (isset($section5->subSection[3]) == true ? $section5->subSection[3]['en_desc'] : '' )}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div>
                                                            <label for="title" class="form-label">Description (Japanese)</label>
                                                            <textarea name="{{$i == 1  ? 'sub_section[2][ja_desc]' : 'sub_section[4][ja_desc]'}}" class="ckeditor_custom" cols="100" rows="5">{{$i == 1 ? (isset($section5->subSection[1]) == true ? $section5->subSection[1]['ja_desc'] : "" ) : (isset($section5->subSection[3]) == true ? $section5->subSection[3]['ja_desc'] : '' )}}</textarea>
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

    <!-- SECTION 6 -->
    @php isset($section) ? $section6 = $section->where('section_no', 6)->first() : '' @endphp
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="Sec6">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec6">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_6" aria-expanded="true" aria-controls="sec_6">
                    <i class="ri-global-line me-2"></i>{{ isset($section6) ? $section6->en_title : 'Section 6'}}
                </button>
            </h2>
            <div id="sec_6" class="accordion-collapse collapse" aria-labelledby="Sec6" data-bs-parent="#Sec6">
                <div class="accordion-body">
                    <form action="{{ route('admin.save_section', ['sec_no' => 6]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section6))
                        <input type="hidden" name="section_id" value="{{ $section6->id }}">
                        @endif
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section6) ? (($section6->status == 1) ? 'checked' : '') : 'checked' }}>
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
                        @for($i=1; $i<=2; $i++) @php $sub_section6=$section6->subSection[$i-1] ?? false @endphp

                            @if($sub_section6)
                            <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" value="{{ $sub_section6->id }}">
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
                                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]"{{ $sub_section6 ? (($sub_section6->status == 1) ? 'checked' : '') : 'checked' }}>
                                            </div>
                                            <div class="row gy-4 mb-2">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="customer-name" class="col-form-label">Icon:</label>
                                                        <input type="text" name="sub_section[{{$i}}][icon]" class="form-control" id="icon" value="{{ $sub_section6 ? $sub_section6->icon : '' }}">
                                                        <small class="error">Note : Only for developer change</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (English)</label>
                                                        <input type="text" class="form-control" id="title" name="sub_section[{{$i}}][en_title]" value="{{ $sub_section6 ? $sub_section6->en_title : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (Japanese)</label>
                                                        <input type="text" class="form-control" id="ja_title" name="sub_section[{{$i}}][ja_title]" value="{{ $sub_section6 ? $sub_section6->ja_title : '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (English)</label>
                                                        <textarea name="sub_section[{{$i}}][en_desc]" class="ckeditor_custom" cols="100" rows="5">{{ $sub_section6 ? $sub_section6->en_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (Japanese)</label>
                                                        <textarea name="sub_section[{{$i}}][ja_desc]" class="ckeditor_custom" cols="100" rows="5">{{ $sub_section6 ? $sub_section6->ja_desc : '' }}</textarea>
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

    <!-- SECTION 7 -->
    @php isset($section) ? $section7 = $section->where('section_no', 7)->first() : '' @endphp
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="Sec7">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec7">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_7" aria-expanded="true" aria-controls="sec_7">
                    <i class="ri-global-line me-2"></i>{{ isset($section7) ? $section7->en_title : 'Section 7'}}
                </button>
            </h2>
            <div id="sec_7" class="accordion-collapse collapse" aria-labelledby="Sec7" data-bs-parent="#Sec7">
                <div class="accordion-body">
                    <form action="{{ route('admin.save_section', ['sec_no' => 7]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section7))
                        <input type="hidden" name="section_id" value="{{ $section7->id }}">
                        @endif
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section7) ? (($section7->status == 1) ? 'checked' : '') : 'checked' }}>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_title" value="{{ old('en_title', isset($section7) ? $section7->en_title : '') }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (Japanese)</label>
                                    <input type="text" class="form-control" id="ja_title" name="ja_title" value="{{ old('ja_title', isset($section7) ? $section7->ja_title : '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (English)</label>
                                    <textarea name="en_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', isset($section7) ? $section7->en_desc : '') }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (Japanese)</label>
                                    <textarea name="ja_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_desc', isset($section7) ? $section7->ja_desc : '') }}</textarea>
                                </div>
                            </div>
                        </div>
                        @for($i=1; $i<=2; $i++) @php $sub_section7=$section7->subSection[$i-1] ?? false @endphp

                            @if($sub_section7)
                            <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" value="{{ $sub_section7->id }}">
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
                                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ $sub_section7 ? (($sub_section7->status == 1) ? 'checked' : '') : 'checked' }}>
                                            </div>
                                            <div class="row gy-4 mb-2">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="customer-name" class="col-form-label">Icon:</label>
                                                        <input type="text" name="sub_section[{{$i}}][icon]" class="form-control" id="icon" value="{{ $sub_section7 ? $sub_section7->icon : '' }}">
                                                        <small class="error">Note : Only for developer change</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (English)</label>
                                                        <input type="text" class="form-control" id="title" name="sub_section[{{$i}}][en_title]" value="{{ $sub_section7 ? $sub_section7->en_title : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (Japanese)</label>
                                                        <input type="text" class="form-control" id="ja_title" name="sub_section[{{$i}}][ja_title]" value="{{ $sub_section7 ? $sub_section7->ja_title : '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (English)</label>
                                                        <textarea name="sub_section[{{$i}}][en_desc]" class="ckeditor_custom" cols="100" rows="5">{{ $sub_section7 ? $sub_section7->en_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (Japanese)</label>
                                                        <textarea name="sub_section[{{$i}}][ja_desc]" class="ckeditor_custom" cols="100" rows="5">{{ $sub_section7 ? $sub_section7->ja_desc : '' }}</textarea>
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

    <!-- SECTION 8 -->
    @php isset($section) ? $section8 = $section->where('section_no', 8)->first() : '' @endphp
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="Sec8">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec8">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_8" aria-expanded="true" aria-controls="sec_8">
                    <i class="ri-global-line me-2"></i>{{ isset($section8) ? $section8->en_title : 'Section 8'}}
                </button>
            </h2>
            <div id="sec_8" class="accordion-collapse collapse" aria-labelledby="Sec8" data-bs-parent="#Sec8">
                <div class="accordion-body">
                    <form action="{{ route('admin.save_section', ['sec_no' => 8]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section8))
                        <input type="hidden" name="section_id" value="{{ $section8->id }}">
                        @endif
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section8) ? (($section8->status == 1) ? 'checked' : '') : 'checked' }}>
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
                                    <textarea name="en_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', isset($section8) ? $section8->en_desc : '') }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (Japanese)</label>
                                    <textarea name="ja_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_desc', isset($section8) ? $section8->ja_desc : '') }}</textarea>
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

@endpush