@extends('admin.layouts.master')

@section('title', $slug)

@section('content')
<link rel="stylesheet" href="{{ asset('custom.css') }}">
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
                    <i class="ri-global-line me-2"></i>Image Section
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
                                    <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section2) ? (($section2->status == 1) ? "checked" : "") : "checked" }}>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-md-6 mb-3">
                            <label for="title" class="form-label mx-2">Image</label>
                            <div class="s-preview-img my-product-img">
                                @if(isset($section2) && $section2->image)
                                <input type="hidden" name="image" value="{{$section2->getRawOriginal('image')}}">
                                @endif
                                <input type="file" name="image" class="form-control custom_img">

                                <img src="{{ isset($section2->image) ? $section2->image : '' }}" loading="lazy" class="img-fluid" id="main_image" alt="" />
                                <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                                <div class="p-upload-icon">
                                    <i class="ri-upload-cloud-2-fill"></i>
                                </div>
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
                                    <textarea name="en_desc" class="form-control" id="description" cols="30" rows="10">{{ old('en_desc', isset($section3) ? $section3->en_desc : '') }}</textarea>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (Japanese)</label>
                                    <textarea name="ja_desc" class="form-control" id="description" cols="30" rows="10">{{ old('ja_desc', isset($section3) ? $section3->ja_desc : '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        @for($i=1; $i<=6; $i++) @php $sub_section3=$section3->subSection[$i-1] ?? false @endphp
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
                                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ $sub_section3 ? (($sub_section3->status == 1) ? 'checked' : '') : 'checked' }}>
                                            </div>
                                            <div class="row gy-4 mb-2">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="customer-name" class="col-form-label">Icon:</label>
                                                        <input type="text" name="sub_section[{{$i}}][icon]" class="form-control" id="icon" value="{{ $sub_section3 ? $sub_section3->icon : '' }}">
                                                        <small class="error">Note : Only for developer change</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
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

    <!-- SECTION 4  ndd-->
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
                                    <textarea name="en_desc" class="form-control" id="description" cols="30" rows="10">{{ old('en_desc', isset($section4) ? $section4->en_desc : '') }}</textarea>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (Japanese)</label>
                                    <textarea name="ja_desc" class="form-control" id="description" cols="30" rows="10">{{ old('ja_desc', isset($section4) ? $section4->ja_desc : '') }}</textarea>
                                </div>
                            </div>
                        </div>
                        @for($i=1; $i<=3; $i++) @php $sub_section4=$section4->subSection[$i-1] ?? false @endphp

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
                                                        <label for="title" class="form-label">Image</label>
                                                        <input type="file" class="form-control" id="image" name="sub_section[{{$i}}][image]">
                                                    </div>
                                                </div>
                                                @if(isset($sub_section4) && $sub_section4->image)
                                                <div class="col-xxl-6 col-md-6">
                                                    <img src="{{ $sub_section4->image }}" alt="" loading="lazy" width="100px" height="100px">
                                                </div>
                                                @endif
                                            </div>
                                            <div class="row gy-4 mt-1">
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
                                            <div class="row mt-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="dec" class="form-label">Description (English)</label>
                                                        <textarea name="sub_section[{{$i}}][en_desc]" class="form-control" id="description" cols="30" rows="10">{{ $sub_section4 ? $sub_section4->en_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="dec" class="form-label">Description (Japanese)</label>
                                                        <textarea name="sub_section[{{$i}}][ja_desc]" class="form-control" id="description" cols="30" rows="10">{{ $sub_section4 ? $sub_section4->ja_desc : '' }}</textarea>
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
                    <i class="ri-global-line me-2"></i>Section 5
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
                        <div class="row my-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (English)</label>
                                    <textarea name="en_desc" class="form-control" id="description" cols="30" rows="3">{{ old('en_desc', isset($section5) ? $section5->en_desc : '') }}</textarea>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (Japanese)</label>
                                    <textarea name="ja_desc" class="form-control" id="description" cols="30" rows="3">{{ old('ja_desc', isset($section5) ? $section5->ja_desc : '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Category (English)</label>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Category (Japanese)</label>
                                </div>
                            </div>
                        </div>
                        @for($i=0; $i<=5; $i++) <div class="row my-2">
                            <input type="hidden" name="spread[spread_cat_id][{{$i}}]" value="{{ $spread_categories[$i]->id ?? '' }}">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <input type="text" name="spread[en_name][{{$i}}]" class="form-control" value="{{ $spread_categories[$i]->en_name ?? '' }}" required>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <input type="text" name="spread[ja_name][{{$i}}]" class="form-control" value="{{ $spread_categories[$i]->ja_name ?? '' }}" required>
                                </div>
                            </div>
                </div>
                @endfor

                <input type="submit" value="Save" class="btn btn-primary my-4">

                <div class="card mt-2">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary spread_add" data-toggle="modal" data-target="#spreadModal">Add</button>
                    </div>
                    <div class="card-body">

                        {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap','style' => 'width: 100%']) !!}
                    </div>
                </div>
                <!-- @for($i=1; $i<=6; $i++)
                    
                            @php $sub_section5 = $section5->subSection[$i-1] ?? false  @endphp
                            
                            @if($sub_section5)
                            <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" value="{{ $sub_section5->id }}">
                            @endif

                            <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3"id="sub_sec_{{$i}}">
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
                                                <input class="form-check-input code-switcher" type="checkbox"
                                                    id="dropdown-base-example" name="sub_section[{{$i}}][status]" checked="{{ $sub_section5 ? (($sub_section5->status == 1) ? true : false) : true }}">
                                            </div>
                                            <div class="row gy-4 mt-1">
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
                                            <div class="row mt-1">
                                                <div class="col-xxl-12 col-md-12">
                                                    <div>
                                                        <label for="dec" class="form-label">Description (English)</label>
                                                        <textarea name="sub_section[{{$i}}][en_desc]" class="ckeditor_custom lg-ckeditor" id="description" cols="30" rows="10">{{ $sub_section5 ? $sub_section5->en_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row mt-1">
                                                <div class="col-xxl-12 col-md-12">
                                                    <div>
                                                        <label for="dec" class="form-label">Description (Japanese)</label>
                                                        <textarea name="sub_section[{{$i}}][ja_desc]" class="ckeditor_custom lg-ckeditor" id="description" cols="30" rows="10">{{ $sub_section5 ? $sub_section5->ja_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor  -->

                </form>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="spreadModal" tabindex="-1" role="dialog" aria-labelledby="spreadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="spreadModalLabel">Add Spread</h5>
                <button type="button" class="btn btn-primary spread_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="spread_form" method="post">
                    @csrf

                    <input type="hidden" name="spread_id" id="spread_id" value="">

                    <div class="row mt-4">
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="dec" class="form-label">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($spread_categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->en_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="dec" class="form-label">Symbol (English)</label>
                                <input type="text" name="symbol" class="form-control" id="symbol">
                            </div>
                        </div>
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="dec" class="form-label">Symbol (Japanese)</label>
                                <input type="text" name="ja_symbol" class="form-control" id="ja_symbol">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-xxl-4 col-md-4">
                            <div>
                                <label for="dec" class="form-label">Ultimate Account</label>
                                <input type="text" name="ultimate_account" class="form-control" id="ultimate_account">
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-4">
                            <div>
                                <label for="dec" class="form-label">Premium Account</label>
                                <input type="text" name="premium_account" class="form-control" id="premium_account">
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-4">
                            <div>
                                <label for="dec" class="form-label">Starter Account</label>
                                <input type="text" name="starter_account" class="form-control" id="starter_account">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer mt-4">
                        <button type="button" class="btn btn-secondary spread_close" data-dismiss="modal">Close</button>
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
<script src="{{ asset('custom.js') }}"></script>
<script>
    $(document).on('click', '.spread_add', function() {
        $('#spread_form')[0].reset();
        $('#spreadModal').modal('show');
    });
    $(document).on('click', '.spread_close', function() {
        $('#spreadModal').modal('hide');
    });

    $(document).on('click', '.edit_spread', function() {
        id = $(this).attr('spread_id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('admin.get_spread') }}",
            type: 'POST',
            data: {
                'id': id
            },
            success: function(res) {
                if (res) {
                    $('#spreadModal').modal('show');
                    $('#spread_id').val(res.id);
                    $('#category_id').val(res.category_id);
                    $('#symbol').val(res.symbol);
                    $('#ja_symbol').val(res.ja_symbol);
                    $('#ultimate_account').val(res.ultimate_account);
                    $('#premium_account').val(res.premium_account);
                    $('#starter_account').val(res.starter_account);
                }
            }
        });
    });

    $('#spread_form').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('admin.add_spread') }}",
            type: 'POST',
            processData: false,
            contentType: false,
            data: new FormData($('#spread_form')[0]),
            success: function(res) {
                if (res) {
                    $('#spreadModal').modal('hide');
                    window.LaravelDataTables["spread-table"].draw();
                }
            },
            error: function(data) {
                if (data.status === 422) {
                    $('.invalid-feedback').remove();
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors.errors, function(key, value) {
                        $('#spread_form').find('input[name=' + key + '], select[name=' + key + ']').empty().after('<div id="' + key + '-error" class="invalid-feedback animated fadeInDown">' + value + '</div>');
                        $('#spread_form').find('input[name=' + key + '], select[name=' + key + ']').addClass('is-invalid');
                    });
                }
            }
        });
    });

    $(document).on('click', '.delete_spread', function() {
        id = $(this).attr('spread_id');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('admin.delete_spread') }}",
            type: 'POST',
            data: {
                'id': id
            },
            success: function(res) {
                if (res) {
                    window.LaravelDataTables["spread-table"].draw();
                }
            }
        });
    });
</script>
@endpush