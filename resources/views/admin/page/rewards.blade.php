@extends('admin.layouts.master')

@section('title', $slug)

@push('css')
<link rel="stylesheet" href="{{ asset('custom.css') }}">

<style>
    .admin-datatable .dataTables_scrollHead table.table,
    .admin-datatable .dataTables_scrollHeadInner {
        width: 100% !important;
    }

    .admin-datatable .dataTables_scrollBody {
        overflow: inherit !important;
    }

    .admin-datatable .dataTables_scroll {
        overflow: auto;
    }


    @media screen and (min-width: 1100px) {

        .admin-datatable .dataTables_scrollHead table.table thead th,
        .admin-datatable .dataTables_scrollBody thead th,
        .admin-datatable .dataTables_scrollBody tbody td {
            width: 18% !important;
        }
    }
</style>

@endpush
@section('content')
<div class="animated fadeIn">
    <!-- SECTION 1 Earn reward points for every qualifying trade-->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec1">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_1" aria-expanded="true" aria-controls="sec_1">
                    <i class="ri-global-line me-1"></i>Earn reward points for every qualifying trade
                </button>
            </h2>
            <div id="sec_1" class="accordion-collapse collapse" aria-labelledby="Sec1" data-bs-parent="#sec1">
                <div class="accordion-body">
                    @php isset($section) ? $section1 = $section->where('section_no', 1)->first() : '' @endphp
                    <form action="{{ route('admin.save_section', ['sec_no' => 1]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section1))
                        <input type="hidden" name="section_id" value="{{ $section1->id }}">
                        @endif

                        <!-- status -->
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="customSwitchsizelg" name="status" {{ isset($section1) ? (($section1->status == 1) ? 'checked' : '') : 'checked' }}>
                                </div>
                            </div>
                        </div>

                        <!-- image -->
                        <div class="row">
                            <div class="col-xxl-6 col-md-6 mb-3">
                                <label for="title" class="form-label mx-2">Image</label>
                                <div class="s-preview-img my-product-img">
                                    @if(isset($section1->image))
                                    <input type="hidden" name="image" value="{{$section1->getRawOriginal('image')}}">
                                    @endif
                                    <input type="file" name="image" class="form-control custom_img">

                                    <img src="{{ isset($section1->image) ? $section1->image : '' }}" class="img-fluid" id="main_image" alt="" loading="lazy" />
                                    <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                                    <div class="p-upload-icon">
                                        <i class="ri-upload-cloud-2-fill"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- video -->
                            @if($slug == 'rewards')
                            <div class="col-xxl-6 col-md-6 mb-3">
                                <label for="video" class="form-label mx-2">Video</label>
                                <div class="s-preview-img my-product-img videoSelectInput">
                                    @if(isset($section1->video_url))
                                    <input type="hidden" name="video" value="">
                                    @endif
                                    <input type="file" accept="video/*" name="video" class="form-control">

                                    <video controls class="img-fluid w-100" id="video_preview">
                                        <source src="{{ isset($section1->video_url) ? $section1->video_url : '' }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                                    <div class="p-upload-icon">
                                        <i class="ri-upload-cloud-2-fill"></i>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- title -->
                        <div class="row gy-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_title" value="{{ old('en_title', isset($section1) ? $section1->en_title : '') }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (Japanese)</label>
                                    <input type="text" class="form-control" id="ja_title" name="ja_title" value="{{ old('ja_title', isset($section1) ? $section1->ja_title : '') }}">
                                </div>
                            </div>
                        </div>

                        <!-- description -->
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (English)</label>
                                    <textarea name="en_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', isset($section1) ? $section1->en_desc : '') }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (Japanese)</label>
                                    <textarea name="ja_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_desc', isset($section1) ? $section1->ja_desc : '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End SECTION 1 Earn reward points for every qualifying trade-->

    <!-- SECTION 2 How does it work? Your loyalty is worth rewarding-->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec2">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec2">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_2" aria-expanded="true" aria-controls="sec_2">
                    <i class="ri-global-line me-2"></i>How does it work?
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

                        <div class="row gy-2">
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

                        <!-- short desc -->
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Short Description (English)</label>
                                    <textarea name="en_short_text" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_short_text', isset($section2) ? $section2->en_short_text : '') }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (Japanese)</label>
                                    <textarea name="ja_short_text" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_short_text', isset($section2) ? $section2->ja_short_text : '') }}</textarea>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-2">
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
                        @for($i=1; $i<=4; $i++) @php $sub_section2=$section2->subSection[$i-1] ?? false;@endphp

                            @if($sub_section2)
                            <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" value="{{ $sub_section2->id }}">
                            @endif

                            <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3" id="sub_sec_{{$i}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="sub_sec_{{$i}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_sec{{$i}}" aria-expanded="false" aria-controls="sub_sec{{$i}}">
                                            <i class="ri-global-line me-2"></i> {{ $sub_section2 ? $sub_section2->en_title : 'Sub Section ' . $i }}
                                        </button>
                                    </h2>
                                    <div id="sub_sec{{$i}}" class="accordion-collapse collapse" aria-labelledby="sub_sec_{{$i}}" data-bs-parent="#sub_sec_{{$i}}">
                                        <div class="accordion-body">
                                            <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                                <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ isset($sub_section2) ? (($sub_section2->status == 1) ? 'checked' : '') : 'checked' }} </div>

                                                <!-- image -->
                                                <div class="row">
                                                    <div class="col-xxl-6 col-md-6 mb-3">
                                                        <label for="title" class="form-label mx-2">Image</label>
                                                        <div class="s-preview-img my-product-img">
                                                            @if(isset($sub_section4) && $sub_section2->image)
                                                            <input type="hidden" name="sub_section[{{$i}}][image_old]" value="{{$sub_section2->image}}">
                                                            @endif
                                                            <input type="file" name="sub_section[{{$i}}][image]" class="form-control custom_img">
                                                            <img src="{{ isset($sub_section2->image) ? $sub_section2->image : '' }}" class="img-fluid" id="main_image_{{$i}}" alt="" loading="lazy" />
                                                            <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                                                            <div class="p-upload-icon">
                                                                <i class="ri-upload-cloud-2-fill"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- title -->
                                                <div class="row gy-4">
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div>
                                                            <label for="title" class="form-label">Title (English)</label>
                                                            <input type="text" class="form-control" id="title" name="sub_section[{{$i}}][en_title]" value="{{ $sub_section2 ? $sub_section2->en_title : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div>
                                                            <label for="title" class="form-label">Title (Japanese)</label>
                                                            <input type="text" class="form-control" id="ja_title" name="sub_section[{{$i}}][ja_title]" value="{{ $sub_section2 ? $sub_section2->ja_title : '' }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- description -->
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
    <!-- end section -->
    
    <!-- REWARD TABLE -->
     <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="Sec6">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec6">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_6" aria-expanded="true" aria-controls="sec_6">
                    <i class="ri-global-line me-2"></i>Reward Table
                </button>
            </h2>
            <div id="sec_6" class="accordion-collapse collapse" aria-labelledby="Sec6" data-bs-parent="#Sec6">
                <div class="accordion-body">
                    {{-- <form action="{{ route('admin.save_section', ['sec_no' => 5]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="page_id" value="{{$page_id}}"> --}}

                    <div class="card mt-2">
                        <div class="card-body admin-datatable">

                            {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap','style' => 'width: 100%']) !!}
                        </div>
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>

    </div>

    <!-- SECTION 3 How to move between tiers -->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec3">
        <div class="accordion-item">
            @php isset($section) ? $section3 = $section->where('section_no', 3)->first() : '' @endphp
            <h2 class="accordion-header" id="Sec3">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_3" aria-expanded="true" aria-controls="sec_3">
                    <i class="ri-global-line me-1"></i>{{isset($section3) ? $section3->en_title : 'How to move between tiers'}}
                </button>
            </h2>
            <div id="sec_3" class="accordion-collapse collapse" aria-labelledby="Sec3" data-bs-parent="#sec3">
                <div class="accordion-body">
                    <form action="{{ route('admin.save_section', ['sec_no' => 3]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section3))
                        <input type="hidden" name="section_id" value="{{ $section3->id }}">
                        @endif

                        <!-- status -->
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="customSwitchsizelg" name="status" {{ isset($section3) ? (($section3->status == 1) ? 'checked' : '') : 'checked' }}>
                                </div>
                            </div>
                        </div>

                        <!-- title -->
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

                        <!-- description -->
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

                        <div class="row mt-1 gy-4">
                            <!-- link 2 english -->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">See the full point catalogue Link (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_link[]" value="{{ $section3 && !is_null($section3->en_link) && is_array(json_decode($section3->en_link)) ? json_decode($section3->en_link)[0] : '' }}">
                                </div>
                            </div>
                            <!-- link 2 japanese -->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">See the full point catalogue Link (Japanese)</label>
                                    <input type="text" class="form-control" id="title" name="ja_link[]" value="{{ $section3 && !is_null($section3->ja_link) && is_array(json_decode($section3->ja_link)) ? json_decode($section3->ja_link)[0] : '' }}">
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End SECTION 1 Earn reward points for every qualifying trade-->


    <!-- SECTION 5 faq main-->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec5">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec5">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_5" aria-expanded="true" aria-controls="sec_5">
                    <i class="ri-global-line me-1"></i>FAQ Main section
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

                        <!-- status -->
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="customSwitchsizelg" name="status" {{ isset($section5) ? (($section5->status == 1) ? 'checked' : '') : 'checked' }}>
                                </div>
                            </div>
                        </div>

                        <!-- title -->
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

                        <!-- description -->
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

                        <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End SECTION 4 faq main-->

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
    
    <!-- SECTION 4 get started now-->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec4">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec4">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_4" aria-expanded="true" aria-controls="sec_4">
                    <i class="ri-global-line me-2"></i>Get Started Now
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

                        <div class="row gy-2">
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

                        <div class="row mt-2">
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
                        @for($i=1; $i<=3; $i++) @php $sub_section4=$section4->subSection[$i-1] ?? false;@endphp

                            @if($sub_section4)
                            <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" value="{{ $sub_section4->id }}">
                            @endif

                            <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3" id="sub_sec_{{$i}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="sub_sec_{{$i}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_sec{{$i}}" aria-expanded="false" aria-controls="sub_sec{{$i}}">
                                            <i class="ri-global-line me-2"></i> {{ $sub_section4 ? $sub_section4->en_title : 'Sub Section ' . $i }}
                                        </button>
                                    </h2>
                                    <div id="sub_sec{{$i}}" class="accordion-collapse collapse" aria-labelledby="sub_sec_{{$i}}" data-bs-parent="#sub_sec_{{$i}}">
                                        <div class="accordion-body">
                                            <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                                <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ isset($sub_section4) ? (($sub_section4->status == 1) ? 'checked' : '') : 'checked' }} </div>

                                                <!-- title -->
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
    <!-- end section 4 -->
    <!-- modal -->
    <div class="modal fade" id="rewardModal" tabindex="-1" role="dialog" aria-labelledby="rewardModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rewardModalLabel">Add Spread</h5>
                    <button type="button" class="btn btn-primary reward_close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="reward_form" method="post">
                        @csrf

                        <input type="hidden" name="reward_id" id="reward_id" value="">


                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Trade</label>
                                    <input type="text" name="trade" class="form-control" id="trade">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Volume</label>
                                    <input type="text" name="volume" class="form-control" id="volume">
                                </div>
                            </div>

                        </div>

                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Points</label>
                                    <input type="number" name="points" class="form-control" id="points">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Icon</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                </div>
                            </div>

                            <!-- <div class="col-xxl-5 col-md-5">
                                <div>
                                http://localhost:8000/fixifx/images/x-coin.svg
                                    <img id="imagess" src="" style="width: 80px; height: auto;" alt="">
                                </div>
                            </div> -->
                        </div>

                        <div class="modal-footer mt-4">
                            <button type="button" class="btn btn-secondary reward_close" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @endsection

    @push('scripts')


    <script src="{{ asset('custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: ".ckeditor_custom",
            plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons checklist mediaembed pageembed permanentpen powerpaste table advtable tableofcontents',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            content_style: "@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;700&display=swap'); body { font-family: 'Noto Sans JP' } h1,h2,h3,h4,h5,h6 { font-family: 'Noto Sans JP' }",
            font_formats: "Arial Black=arial black,avant garde; Courier New=courier new,courier; Lato Black=lato; Roboto=roboto; Noto Sans JP=Noto Sans JP",
            // skin: "snow",
            height: 420,
            automatic_uploads: true,
            file_picker_types: 'image',
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

    <!-- faq section -->
    <script type="text/javascript">
        $(document).on('click', '.add_faq', function() {
            clone_div = $(".faq_section_row:first").clone();
            clone_div.find('.remove_faq').removeClass('d-none').addClass('d-block');
            clone_div.insertAfter(".faq_section_row:last");
            clone_div.find('.en_question, .ja_question, .en_answer, .ja_answer').val('');
            change_name();
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


    <!-- datatable  -->
    {!! $dataTable->scripts() !!}
    <script src="{{ asset('custom.js') }}"></script>
    <script>
        $(document).on('click', '.spread_add', function() {
            $('#spread_form')[0].reset();
            $('#spreadModal').modal('show');
        });

        $(document).on('click', '.edit_reward', function() {
            id = $(this).attr('reward_id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.get_reward') }}",
                type: 'POST',
                data: {
                    'id': id
                },
                success: function(res) {
                    if (res) {
                        $('#rewardModal').modal('show');
                        $('#reward_id').val(res.id);
                        $('#trade').val(res.trade);
                        $('#volume').val(res.volume);
                        $('#points').val(res.points);
                        $('#image').val(res.image);
                    }
                }
            });
        });

        $(document).on('click', '.reward_close', function() {
            $('#rewardModal').modal('hide');
        });


        $('#reward_form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.add_reward') }}",
                type: 'POST',
                processData: false,
                contentType: false,
                data: new FormData($('#reward_form')[0]),
                success: function(res) {
                    if (res) {
                        $('#rewardModal').modal('hide');
                        window.LaravelDataTables["reward-table"].draw();
                    }
                },
                error: function(data) {
                    if (data.status === 422) {
                        $('.invalid-feedback').remove();
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors.errors, function(key, value) {
                            $('#reward_form').find('input[name=' + key + '], select[name=' + key + ']').empty().after('<div id="' + key + '-error" class="invalid-feedback animated fadeInDown">' + value + '</div>');
                            $('#reward_form').find('input[name=' + key + '], select[name=' + key + ']').addClass('is-invalid');
                        });
                    }
                }
            });
        });
    </script>
    @endpush