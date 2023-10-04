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
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="home2">
        <div class="accordion-item">
            <h2 class="accordion-header" id="home2">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#home_2" aria-expanded="true"
                    aria-controls="home_2">
                    <i class="ri-global-line me-2"></i>{{ isset($section2) ? $section2->en_title : 'Section 2'}}
                </button>
            </h2>
            <div id="home_2" class="accordion-collapse collapse" aria-labelledby="home2" data-bs-parent="#home2">
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
                                    <input class="form-check-input code-switcher" type="checkbox"
                                        id="dropdown-base-example" name="status" {{ isset($section2) ? (($section2->status == 1) ? 'checked' : '') : 'checked' }}>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-2">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Icon</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                            @if(isset($section2) && $section2->image)
                            <div class="col-xxl-6 col-md-6">
                            <input type="hidden" name="image" value="{{ $section2->getRawOriginal('image')}}">
                                <img src="{{ $section2->image }}" alt="" width="100px" height="100px" loading="lazy">
                            </div>
                            @endif
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

    <!-- SECTION 3 -->
    @php isset($section) ? $section3 = $section->where('section_no', 3)->first() : '' @endphp
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="home3">
        <div class="accordion-item">
            <h2 class="accordion-header" id="home3">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#home_3" aria-expanded="true"
                    aria-controls="home_3">
                    <i class="ri-global-line me-2"></i>{{ isset($section3) ? $section3->en_title : 'Section 3'}}
                </button>
            </h2>
            <div id="home_3" class="accordion-collapse collapse" aria-labelledby="home3" data-bs-parent="#home3">
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
                                    <input class="form-check-input code-switcher" type="checkbox"
                                        id="dropdown-base-example" name="status" {{ isset($section3) ? (($section3->status == 1) ? 'checked' : '') : 'checked' }}>
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

    <!-- SECTION 4 -->
    @php isset($section) ? $section4 = $section->where('section_no', 4)->first() : '' @endphp
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="home4">
        <div class="accordion-item">
            <h2 class="accordion-header" id="HomeSection4">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#home_section_4" aria-expanded="true"
                    aria-controls="home_section_4">
                    <i class="ri-global-line me-2"></i>{{ isset($section4) ? $section4->en_title : 'Section 4'}}
                </button>
            </h2>
            <div id="home_section_4" class="accordion-collapse collapse" aria-labelledby="HomeSection4" data-bs-parent="#home4">
                <div class="accordion-body">
                    <form action="{{ route('admin.save_section', ['sec_no' => 4]) }}" method="post">
                    @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section4))
                        <input type="hidden" name="section_id" value="{{ $section4->id }}">
                        @endif   
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox"
                                        id="dropdown-base-example" name="status" {{ isset($section4) ? (($section4->status ==  1) ? 'checked' : '') : 'checked' }}>
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
                        <!-- subsections   -->
                        @for($i=1; $i<=3; $i++)
                        @php $sub_section4 = $section4->subSection[$i-1] ?? false  @endphp

                        @if($sub_section4)
                        <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" value="{{ $sub_section4->id }}">
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
                                                id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ $sub_section4 ? (($sub_section4->status == 1) ? 'checked' : '') : 'checked' }}>
                                        </div>
                                        <div class="row gy-4 mb-2">
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="customer-name" class="col-form-label">Icon:</label>
                                                    <input type="text" name="sub_section[{{$i}}][icon]" class="form-control" id="icon" value="{{ $sub_section4 ? $sub_section4->icon : '' }}">
                                                    <small class="error">Note : Only for developer change</small>
                                                </div>    
                                            </div>
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
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="home5">
        <div class="accordion-item">
            <h2 class="accordion-header" id="5Section5">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#home_section_5" aria-expanded="true"
                    aria-controls="home_section_5">
                    <i class="ri-global-line me-2"></i>{{ isset($section5) ? $section5->en_title : 'Section 5'}}
                </button>
            </h2>
            <div id="home_section_5" class="accordion-collapse collapse" aria-labelledby="HomeSection5" data-bs-parent="#home5">
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
                                    <input class="form-check-input code-switcher" type="checkbox"
                                        id="dropdown-base-example" name="status" {{ isset($section5) ? (($section5->status == 1) ? 'checked' : '') : 'checked' }}>
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
                        
                        <div class="accordion-body">
                            <!-- sub section -->
                            <input type="hidden" name="remove_subsec_ids" class="remove_subsec_ids" value="">                            
                            @if($section5->subSection->count())
                                @foreach($section5->subSection as $i => $sub_sec)                               
                                <div class="faq_section_row">
                                    <div class="row">
                                        <div class="col-3">
                                            <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                            <button type="button" class="btn btn-danger remove_faq m-1 {{$i > 0 ? '' : 'd-none'}}"><i class="ri-subtract-fill"></i></button>
                                        </div>    
                                    </div>
                                    
                                    <input type="hidden" name="page_id" value="{{$page_id}}"> 
                                    
                                    @if(isset($sub_sec))
                                    <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" class="sub_section_id" value="{{ $sub_sec->id }}">
                                    @endif   
                                    
                                    <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3" id="sub_section{{$i}}">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="Sub_section_{{$i}}">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_section_{{$i}}" aria-expanded="false" aria-controls="sub_section_{{$i}}">
                                                    <i class="ri-global-line me-2"></i> <span class="acc_header">{{ isset($sub_sec) ? $sub_sec->en_title : 'Sub Section '.($i+1) }}</span>
                                                </button>
                                            </h2>
                                            <div id="sub_section_{{$i}}" class="accordion-collapse collapse" aria-labelledby="sub_section_{{$i}}" data-bs-parent="#sub_section{{$i}}">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                                                <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                                                <input class="form-check-input code-switcher" type="checkbox"
                                                                    id="customSwitchsizelg" name="sub_section[{{$i}}][status]" {{ isset($sub_sec) ? (($sub_sec->status == 1) ? 'checked' : '') : 'checked' }}>
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
                                                                <textarea name="sub_section[{{$i}}][en_desc]" class="form-control en_desc" cols="100" rows="5">{{ isset($sub_sec) ? $sub_sec->en_desc : '' }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-xxl-6 col-md-6">
                                                            <div>
                                                                <label for="title" class="form-label">Description (Japanese)</label>
                                                                <textarea name="sub_section[{{$i}}][ja_desc]" class="form-control ja_desc" cols="100" rows="5">{{ isset($sub_sec) ? $sub_sec->ja_desc : '' }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row gy-4 mt-1">
                                                        <div class="col-xxl-6 col-md-6">
                                                            <div>
                                                                <label for="title" class="form-label">Image</label>
                                                                <input type="file" name="sub_section[{{$i}}][image]" class="form-control">
                                                            </div>
                                                        </div>
                                                        @if(isset($sub_sec) && $sub_sec->image)
                                                        <div class="col-xxl-6 col-md-6">
                                                            <img src="{{ $sub_sec->image }}" alt="" width="50px" height="50px" loading="lazy">
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="row gy-4 mt-1">
                                                        <div class="col-xxl-6 col-md-6">
                                                            <div>
                                                                <label for="title" class="form-label">Japanese Image</label>
                                                                <input type="file" name="sub_section[{{$i}}][ja_image]" class="ja_image form-control">
                                                            </div>
                                                        </div>
                                                        @if(isset($sub_sec) && $sub_sec->ja_image)
                                                        <div class="col-xxl-6 col-md-6">
                                                            <img src="{{ $sub_sec->ja_image }}" alt="" width="50px" height="50px" loading="lazy">
                                                        </div>
                                                        @endif
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
                                    <div class="col-3">
                                        <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                        <button type="button" class="btn btn-danger remove_faq m-1 d-none"><i class="ri-subtract-fill"></i></button>
                                    </div>    
                                </div>
                                
                                <input type="hidden" name="page_id" value="{{$page_id}}">   

                                <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3" id="sub_section3">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="Sub_section_3">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_section_3" aria-expanded="false" aria-controls="sub_section_3">
                                                <i class="ri-global-line me-2"></i> <span class="acc_header">Sub Section 1</span>
                                            </button>
                                        </h2>
                                        <div id="sub_section_3" class="accordion-collapse collapse" aria-labelledby="sub_section_3" data-bs-parent="#sub_section3">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                                            <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                                            <input class="form-check-input code-switcher" type="checkbox"
                                                                id="customSwitchsizelg" name="sub_section[0][status]" checked="true">
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
                                                            <textarea name="sub_section[0][en_desc]" class="form-control en_desc" id="en_des_0" cols="100" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div>
                                                            <label for="title" class="form-label">Description (Japanese)</label>
                                                            <textarea name="sub_section[0][ja_desc]" class="form-control ja_desc" id="ja_des_0" cols="100" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row gy-4 mt-1">
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div>
                                                            <label for="title" class="form-label">Image</label>
                                                            <input type="file" name="sub_section[0][image]" class="form-control image">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div>
                                                            <label for="title" class="form-label">Japanese Image</label>
                                                            <input type="file" name="sub_section[0][ja_image]" class="form-control ja_image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>    
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 6 -->
    @php isset($section) ? $section6 = $section->where('section_no', 6)->first() : '' @endphp
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="home6">
        <div class="accordion-item">
            <h2 class="accordion-header" id="HomeSection6">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#home_section_6" aria-expanded="true"
                    aria-controls="home_section_6">
                    <i class="ri-global-line me-2"></i>{{ isset($section6) ? $section6->en_title : 'Section 6'}}
                </button>
            </h2>
            <div id="home_section_6" class="accordion-collapse collapse" aria-labelledby="HomeSection6" data-bs-parent="#home6">
                <div class="accordion-body">
                    <form action="{{ route('admin.save_section', ['sec_no' => 6]) }}" method="post">
                    @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section6))
                        <input type="hidden" name="section_id" value="{{ $section6->id }}">
                        @endif   
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox"
                                        id="dropdown-base-example" name="status" {{ isset($section6) ? (($section6->status == 1) ? 'checked' : '') : 'checked' }}>
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
                        <!-- subsections   -->
                        @for($i=1; $i<=3; $i++)
                        @php $sub_section6 = $section6->subSection[$i-1] ?? false  @endphp

                        @if($sub_section6)
                        <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" value="{{ $sub_section6->id }}">
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
                                                id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ isset($sub_section6) ? (($sub_section6->status == 1) ? 'checked' : '') : 'checked' }}>
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
                                        <div class="row gy-4 mt-1">
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
                                                    <textarea name="sub_section[{{$i}}][en_desc]" class="form-control" cols="100" rows="5">{{ $sub_section6 ? $sub_section6->en_desc : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="title" class="form-label">Description (Japanese)</label>
                                                    <textarea name="sub_section[{{$i}}][ja_desc]" class="form-control" cols="100" rows="5">{{ $sub_section6 ? $sub_section6->ja_desc : '' }}</textarea>
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
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="Section7">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Section7">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#section_7" aria-expanded="true"
                    aria-controls="section_7">
                    <i class="ri-global-line me-2"></i>{{ isset($section7) ? $section7->en_title : 'Section 7'}}
                </button>
            </h2>
            <div id="section_7" class="accordion-collapse collapse" aria-labelledby="Section7" data-bs-parent="#Section7">
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
                                    <input class="form-check-input code-switcher" type="checkbox"
                                        id="dropdown-base-example" name="status" {{ isset($section7) ? (($section7->status == 1) ? 'checked' : '') : 'checked' }}>
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
                        <div class="row gy-4 mt-1">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Description (English)</label>
                                    <textarea name="en_desc" class="form-control" cols="100" rows="5">{{ old('en_desc', isset($section7) ? $section7->en_desc : '') }}</textarea>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Description (Japanese)</label>
                                    <textarea name="ja_desc" class="form-control" cols="100" rows="5">{{ old('ja_desc', isset($section7) ? $section7->ja_desc : '') }}</textarea>
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
<script>
    // tinymce.remove({selector:".ckeditor_custom"});

    $(document).on('click','.add_faq', function(){
        clone_div = $(".faq_section_row:first").clone();
        clone_div.find('.remove_faq').removeClass('d-none');
        clone_div.insertAfter(".faq_section_row:last");
        clone_div.find('.en_title, .ja_title, .en_desc, .ja_desc, .sub_section_id').val('');
        change_name();
    });

    var remove_subsec_ids = [];
    $(document).on('click','.remove_faq', function(){
        $(this).parent().parent().parent().remove();
        remove_subsec_ids.push($(this).parents('.faq_section_row').find('.sub_section_id').val());
        $('.remove_subsec_ids').val(remove_subsec_ids);
    });

    function change_name(){
        var n=2;
        
        $(".faq_section_row").each(function() {

            $(this).find('.accordion').attr('id', 'sub_section'+n)  
            $(this).find('.accordion-header').attr('id', 'Sub_section_'+n) 
            $(this).find('.accordion-button').attr('data-bs-target', '#sub_section_'+n).attr('aria-controls', 'sub_section_'+n)
            $(this).find('.accordion-collapse').attr('id', 'sub_section_'+n).attr('data-bs-parent', '#sub_section'+n).attr('aria-labelledby', 'sub_section_'+n)
            $(this).find('form').attr('action', '{{ url("PrexSecureCpanel/save_section") }}/'+n);
            $(this).find('.acc_header').html('Sub Section '+(n-1));
            
            $(this).find('.sub_section_id').attr('name', 'sub_section['+(n-2)+'][sub_section_id]');
            
            $(this).find('.en_title').attr('name', 'sub_section['+(n-2)+'][en_title]');
            $(this).find('.ja_title').attr('name', 'sub_section['+(n-2)+'][ja_title]');
            $(this).find('.en_desc').attr('name', 'sub_section['+(n-2)+'][en_desc]');
            $(this).find('.ja_desc').attr('name', 'sub_section['+(n-2)+'][ja_desc]');
            $(this).find('.image').attr('name', 'sub_section['+(n-2)+'][image]');
            $(this).find('.ja_image').attr('name', 'sub_section['+(n-2)+'][ja_image]');
            $(this).find('.sec_no').val(n);
            
            n++;
        });
    }
</script>
@endpush