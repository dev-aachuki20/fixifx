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
                        <input type="hidden" name="section_id" value="{{ $section2->id }}">
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
                                                        @if(isset($sub_section4->image))
                                                        <input type="hidden" name="image" value="{{$sub_section4->getRawOriginal('image')}}">
                                                        @endif
                                                        <input type="file" name="image" class="form-control custom_img">
                                                        <img src="{{ isset($sub_section4->image) ? $sub_section4->image : '' }}" class="img-fluid" id="main_image" alt="" loading="lazy" />
                                                        <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                                                        <div class="p-upload-icon">
                                                            <i class="ri-upload-cloud-2-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
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
                            <!-- end subsection -->

                            <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script type="text/javascript">
    $(document).on('click', '.add_faq', function() {
        clone_div = $(".faq_section_row:first").clone();
        clone_div.find('.remove_faq').removeClass('d-none').addClass('d-block');
        clone_div.insertAfter(".faq_section_row:last");
        change_name($(this));
    });

    $(document).on('click', '.remove_faq', function() {
        $(this).parent().parent().parent().remove();
    });

    function change_name(this_var) {
        var n = 0;
        $(".faq_section_row").each(function() {
            $(this).find('.en_question').attr('name', 'faq[' + n + '][en_question]');
            $(this).find('.ja_question').attr('name', 'faq[' + n + '][ja_question]');
            $(this).find('.en_answer').attr('name', 'faq[' + n + '][en_answer]');
            $(this).find('.ja_answer').attr('name', 'faq[' + n + '][ja_answer]');
            n++;
        });
    }
</script>
@endpush