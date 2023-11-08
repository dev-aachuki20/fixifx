@extends('admin.layouts.master')

@section('title', $slug)

@section('content')

<div class="animated fadeIn">
    <!-- ----------- Header Section ------------------- -->
    @include('admin.common.header_section')

    <!-- SECTION 1 -->
    @include('admin.common.title_section')

    <!-- SECTION 2 -->
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

    <!-- SECTION 6 -->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec6">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec6">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_6" aria-expanded="true" aria-controls="sec_6">
                    <i class="ri-global-line me-2"></i>Feature Points
                </button>
            </h2>
            <div id="sec_6" class="accordion-collapse collapse" aria-labelledby="Sec6" data-bs-parent="#sec6">
                <div class="accordion-body">
                    @php isset($section) ? $section6 = $section->where('section_no', 6)->first() : '' @endphp
                    <form action="{{ route('admin.save_section', ['sec_no' => 6]) }}" method="post">
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section6))
                        <input type="hidden" name="section_id" value="{{ $section6->id }}">
                        @endif

                        <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                            <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section6) ? (($section6->status == 1) ? 'checked' : '') : 'checked' }}>
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
                                    <label for="dec" class="form-label">Feature Points (English)</label>
                                    <textarea name="en_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', isset($section6) ? $section6->en_desc : '') }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Feature Points (Japanese)</label>
                                    <textarea name="ja_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_desc', isset($section6) ? $section6->ja_desc : '') }}</textarea>
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
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="home3">
        <div class="accordion-item">
            <h2 class="accordion-header" id="HomeSection3">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#home_section_3" aria-expanded="true" aria-controls="home_section_3">
                    <i class="ri-global-line me-2"></i>Section 3
                </button>
            </h2>
            <div id="home_section_3" class="accordion-collapse" aria-labelledby="HomeSection3" data-bs-parent="#home3">
                <div class="accordion-body">

                    @for($i=1; $i<=3; $i++) @php isset($section) ? ${'section'.($i+2)}=$section->where('section_no', $i+2)->first() : '' @endphp
                        <form action="{{ route('admin.save_section', ['sec_no' => ($i+2)]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="page_id" value="{{$page_id}}">
                            @if(isset(${'section'.($i+2)}))
                            <input type="hidden" name="section_id" value="{{ ${'section'.($i+2)}->id }}">
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
                                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset(${'section'.($i+2)}) ? ((${'section'.($i+2)}->status == 1) ? 'checked' : '') : 'checked' }}>
                                            </div>
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Image</label>
                                                        <input type="file" class="form-control" id="image" name="image">
                                                    </div>
                                                </div>
                                                @if(isset(${'section'.($i+2)}) && ${'section'.($i+2)}->image)
                                                <div class="col-xxl-6 col-md-6">
                                                    <input type="hidden" name="image" value="{{${'section'.($i+2)}->getRawOriginal('image')}}">
                                                    <img src="{{ ${'section'.($i+2)}->image }}" alt="" width="100px" height="100px" loading="lazy">
                                                </div>
                                                @endif
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (English)</label>
                                                        <input type="text" class="form-control" id="title" name="en_title" value="{{ ${'section'.($i+2)} ? ${'section'.($i+2)}->en_title : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (Japanese)</label>
                                                        <input type="text" class="form-control" id="ja_title" name="ja_title" value="{{ ${'section'.($i+2)} ? ${'section'.($i+2)}->ja_title : '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (English)</label>
                                                        <textarea name="en_desc" class="form-control" cols="100" rows="5">{{ ${'section'.($i+2)} ? ${'section'.($i+2)}->en_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (Japanese)</label>
                                                        <textarea name="ja_desc" class="form-control" cols="100" rows="5">{{ ${'section'.($i+2)} ? ${'section'.($i+2)}->ja_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" value="Save" class="btn btn-primary my-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endfor

                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 7 -->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec7">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec7">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_7" aria-expanded="true" aria-controls="sec_7">
                    <i class="ri-global-line me-2"></i>User Guide
                </button>
            </h2>
            <div id="sec_7" class="accordion-collapse collapse" aria-labelledby="Sec7" data-bs-parent="#sec7">
                <div class="accordion-body">
                    @php isset($section) ? $section7 = $section->where('section_no', 7)->first() : '' @endphp
                    <form action="{{ route('admin.save_section', ['sec_no' => 7]) }}" method="post" enctype=multipart/form-data>
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section7))
                        <input type="hidden" name="section_id" value="{{ $section7->id }}">
                        @endif

                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="customSwitchsizelg" name="status" {{ isset($section7) ? (($section7->status == 1) ? 'checked' : '') : 'checked' }}>
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