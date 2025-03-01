@extends('admin.layouts.master')

@section('title', 'Common Section')


@section('content')
<link rel="stylesheet" href="{{ asset('custom.css') }}">

<div class="animated fadeIn">
    <!-- get started -->
    @php isset($common) ? $section1 = $common->where('section_no', 1)->first() : '' @endphp
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="home1">
        <div class="accordion-item">
            <h2 class="accordion-header" id="HomeSection1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#home_section_1" aria-expanded="true" aria-controls="home_section_1">
                    <i class="ri-global-line me-2"></i>{{ isset($section1) ? $section1->en_title : 'Section 1'}}
                </button>
            </h2>
            <div id="home_section_1" class="accordion-collapse collapse" aria-labelledby="HomeSection1" data-bs-parent="#home1">
                <div class="accordion-body">
                    <form action="{{ route('admin.save_section', ['sec_no' => 1]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="-1">

                        @if(isset($section1))
                        <input type="hidden" name="section_id" value="{{ $section1->id }}">
                        @endif
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section1) ? (($section1->status == 1) ? 'checked' : '') : 'checked' }}>
                                </div>
                            </div>
                        </div>
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
                        <!-- subsections   -->
                        @for($i=1; $i<=3; $i++) @php $sub_section1=$section1->subSection[$i-1] ?? false @endphp

                            @if($sub_section1)
                            <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" value="{{ $sub_section1->id }}">
                            @endif

                            <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3" id="sub_sec_{{$i}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="sub_sec_{{$i}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_sec{{$i}}" aria-expanded="false" aria-controls="sub_sec{{$i}}">
                                            <i class="ri-global-line me-2"></i> {{ isset($sub_section1) ? $sub_section1->en_title :  "Sub Section $i" }}
                                        </button>
                                    </h2>
                                    <div id="sub_sec{{$i}}" class="accordion-collapse collapse" aria-labelledby="sub_sec_{{$i}}" data-bs-parent="#sub_sec_{{$i}}">
                                        <div class="accordion-body">
                                            <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                                <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ isset($sub_section1) ? (($sub_section1->status == 1) ? 'checked' : '') : 'checked' }}>
                                            </div>
                                            {{-- <div class="row gy-4 mb-2">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="customer-name" class="col-form-label">Icon:</label>
                                                        <input type="text" name="sub_section[{{$i}}][icon]" class="form-control" id="icon" value="{{ $sub_section1 ? $sub_section1->icon : '' }}">
                                            <small class="error">Note : Only for developer change</small>
                                        </div>
                                    </div>
                                </div> --}}


                                <!-- image -->
                                <div class="row">
                                    <div class="col-xxl-6 col-md-6 mb-3">
                                        <label for="title" class="form-label mx-2">Image</label>
                                        <div class="s-preview-img my-product-img">
                                            @if(isset($sub_section1) && $sub_section1->image)
                                            <input type="hidden" name="sub_section[{{$i}}][image_old]" value="{{$sub_section1->image}}">
                                            @endif
                                            <input type="file" name="sub_section[{{$i}}][image]" class="form-control custom_img">

                                            <img src="{{ isset($sub_section1->image) ? $sub_section1->image : '' }}" class="img-fluid" id="main_image_{{$i}}" alt="" loading="lazy" />
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
                                            <input type="text" class="form-control" id="title" name="sub_section[{{$i}}][en_title]" value="{{ $sub_section1 ? $sub_section1->en_title : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6">
                                        <div>
                                            <label for="title" class="form-label">Title (Japanese)</label>
                                            <input type="text" class="form-control" id="ja_title" name="sub_section[{{$i}}][ja_title]" value="{{ $sub_section1 ? $sub_section1->ja_title : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row gy-4 mt-1">
                                    <div class="col-xxl-6 col-md-6">
                                        <div>
                                            <label for="title" class="form-label">Description (English)</label>
                                            <textarea name="sub_section[{{$i}}][en_desc]" class="form-control ckeditor_custom" id="description" cols="100" rows="5">{{ $sub_section1 ? $sub_section1->en_desc : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6">
                                        <div>
                                            <label for="title" class="form-label">Description (Japanese)</label>
                                            <textarea name="sub_section[{{$i}}][ja_desc]" class="form-control ckeditor_custom" id="description" cols="100" rows="5">{{ $sub_section1 ? $sub_section1->ja_desc : '' }}</textarea>
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


<!-- Discover our other platform SECTION 30 -->
@php isset($common) ? $section30 = $common->where('section_no', 30)->first() : '' @endphp
<div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="home30">
    <div class="accordion-item">
        <h2 class="accordion-header" id="HomeSection30">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#home_section_30" aria-expanded="true" aria-controls="home_section_30">
                <i class="ri-global-line me-2"></i>{{ isset($section30) ? $section30->en_title : 'Section 30'}}
            </button>
        </h2>
        <div id="home_section_30" class="accordion-collapse collapse" aria-labelledby="HomeSection1" data-bs-parent="#home30">
            <div class="accordion-body">
                <form action="{{ route('admin.save_section', ['sec_no' => 30]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="page_id" value="-1">

                    @if(isset($section30))
                    <input type="hidden" name="section_id" value="{{ $section30->id }}">
                    @endif
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section30) ? (($section30->status == 1) ? 'checked' : '') : 'checked' }}>
                            </div>
                        </div>
                    </div>
                    <div class="row gy-4">
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="title" class="form-label">Title (English)</label>
                                <input type="text" class="form-control" id="title" name="en_title" value="{{ old('en_title', isset($section30) ? $section30->en_title : '') }}">
                            </div>
                        </div>
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="title" class="form-label">Title (Japanese)</label>
                                <input type="text" class="form-control" id="ja_title" name="ja_title" value="{{ old('ja_title', isset($section30) ? $section30->ja_title : '') }}">
                            </div>
                        </div>
                    </div>
                    <!-- subsections   -->
                    @for($i=1; $i<=2; $i++) @php $sub_section30=$section30->subSection[$i-1] ?? false @endphp
                        @if($sub_section30)
                        <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" value="{{ $sub_section30->id }}">
                        @endif

                        <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3" id="sub_sec_{{$i}}">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="sub_sec_{{$i}}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_sec{{$i}}" aria-expanded="false" aria-controls="sub_sec{{$i}}">
                                        <i class="ri-global-line me-2"></i> {{ isset($sub_section30) ? $sub_section30->en_title :  "Sub Section $i" }}
                                    </button>
                                </h2>
                                <div id="sub_sec{{$i}}" class="accordion-collapse collapse" aria-labelledby="sub_sec_{{$i}}" data-bs-parent="#sub_sec_{{$i}}">
                                    <div class="accordion-body">
                                        <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                            <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                            <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ isset($sub_section30) ? (($sub_section30->status == 1) ? 'checked' : '') : 'checked' }}>
                                        </div>
                                        <!-- image -->
                                        <div class="row">
                                            <div class="col-xxl-6 col-md-6 mb-3">
                                                <label for="title" class="form-label mx-2">Image</label>
                                                <div class="s-preview-img my-product-img">
                                                    @if(isset($sub_section30) && $sub_section30->image)
                                                    <input type="hidden" name="sub_section[{{$i}}][image_old]" value="{{$sub_section30->image}}">
                                                    @endif
                                                    <input type="file" name="sub_section[{{$i}}][image]" class="form-control custom_img">

                                                    <img src="{{ isset($sub_section30->image) ? $sub_section30->image : '' }}" class="img-fluid" id="main_image_{{$i}}" alt="" loading="lazy" />
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
                                                    <input type="text" class="form-control" id="title" name="sub_section[{{$i}}][en_title]" value="{{ $sub_section30 ? $sub_section30->en_title : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="title" class="form-label">Title (Japanese)</label>
                                                    <input type="text" class="form-control" id="ja_title" name="sub_section[{{$i}}][ja_title]" value="{{ $sub_section30 ? $sub_section30->ja_title : '' }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-1 gy-4">
                                            <!-- link 2 english -->
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="title" class="form-label">Learn More Link (English)</label>
                                                    <input type="text" class="form-control" id="title" name="sub_section[{{$i}}][en_link]" value="{{ $sub_section30 && !is_null($sub_section30->en_link) ? $sub_section30->en_link : '' }}">
                                                </div>
                                            </div>
                                            <!-- link 2 japanese -->
                                            <div class="col-xxl-6 col-md-6">
                                                <div>
                                                    <label for="title" class="form-label">Learn More Link (Japanese)</label>
                                                    <input type="text" class="form-control" id="title" name="sub_section[{{$i}}][ja_link]" value="{{ $sub_section30 && !is_null($sub_section30->ja_link) ? $sub_section30->ja_link : '' }}">
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


<!-- explore a section 3 for page -1 common -->
@php isset($common) ? $section3 = $common->where('section_no', 3)->first() : '' @endphp
<div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="home3">
    <div class="accordion-item">
        <h2 class="accordion-header" id="HomeSection3">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#home_section_3" aria-expanded="true" aria-controls="home_section_3">
                <i class="ri-global-line me-2"></i>{{ isset($section3) ? $section3->en_title : 'Section 3'}}
            </button>
        </h2>
        <div id="home_section_3" class="accordion-collapse collapse" aria-labelledby="HomeSection1" data-bs-parent="#home3">
            <div class="accordion-body">
                <form action="{{ route('admin.save_section', ['sec_no' => 3]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="page_id" value="-1">

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


                    <!-- image -->
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
                        <!-- link  1  eng-->
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="title" class="form-label">Go to the developer portal Link (English)</label>
                                <input type="text" class="form-control" id="title" name="en_link[]" value="{{ $section3 && !is_null($section3->en_link) && is_array(json_decode($section3->en_link)) ? json_decode($section3->en_link)[0] : '' }}">
                            </div>
                        </div>
                        <!-- link  1  japanese -->
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="title" class="form-label">Go to the developer portal Link (Japanese)</label>
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


<!-- ready to get started section 4 -->
@php isset($common) ? $section4 = $common->where('section_no', 4)->first() : '' @endphp
<div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="home4">
    <div class="accordion-item">
        <h2 class="accordion-header" id="HomeSection4">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#home_section_4" aria-expanded="true" aria-controls="home_section_4">
                <i class="ri-global-line me-2"></i>{{ isset($section4) ? $section4->en_title : 'Section 4'}}
            </button>
        </h2>
        <div id="home_section_4" class="accordion-collapse collapse" aria-labelledby="HomeSection1" data-bs-parent="#home4">
            <div class="accordion-body">
                <form action="{{ route('admin.save_section', ['sec_no' => 4]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="page_id" value="-1">

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


                    <!-- image -->
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

                    <!-- title -->
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

                    <!-- description -->
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

                    <input type="submit" value="Save" class="btn btn-primary my-4">
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('custom.js') }}"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" referrerpolicy="origin"></script>
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

<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.editorConfig = function(config) {
        config.allowedContent = true;
        config.removeFormatAttributes = '';
    };
</script>


@endpush