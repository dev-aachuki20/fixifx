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
                    <i class="ri-global-line me-2"></i>Section 2
                </button>
            </h2>
            <div id="sec_2" class="accordion-collapse collapse" aria-labelledby="Sec2" data-bs-parent="#sec2">
                <div class="accordion-body">
                    @php isset($section) ? $section2 = $section->where('section_no', 2)->first() : '' @endphp 
                    <form action="{{ route('admin.save_section', ['sec_no' => 2]) }}" method="post" enctype="multipart/form-data" >
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

</div>
<!-- SECTION 3 -->
<form action="{{ route('admin.save_section', ['sec_no' => 3]) }}" method="post" enctype="multipart/form-data" id="legal_document_form">
    @csrf
    <input type="hidden" name="page_id" value="{{$page_id}}">
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec3">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec3">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_3" aria-expanded="true" aria-controls="sec_3">
                    <i class="ri-global-line me-2"></i>Section 3
                </button>
            </h2>
            <div id="sec_3" class="accordion-collapse collapse" aria-labelledby="Sec3" data-bs-parent="#sec3">
                <div class="accordion-body">
                    @php isset($section) ? $section3 = $section->where('section_no', 3)->first() :[];@endphp
                    @if($section3==null)

                    <input type="hidden" class="section_id" value="3" name="sec_no">

                    <div class="faq_section_row">
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                <button type="button" class="btn btn-danger remove_faq m-1 d-none"><i class="ri-subtract-fill"></i></button>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (English)</label>
                                    <input type="text" class="en_title form-control" id="en_title" name="legel_document[0][en_title]" value="{{ old('en_title', isset($section3) ? $section3->en_title : '') }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (Japanese)</label>
                                    <input type="text" class="ja_title form-control" id="ja_title" name="legel_document[0][ja_title]" value="{{ old('ja_title', isset($section3) ? $section3->ja_title : '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="my-2">
                            <div class="form-check form-check-inline">
                                <input class="file type form-check-input" type="radio" name="legel_document[0][type]" value="1" checked="checked" dataid="0">
                                <label class="form-check-label" for="file">
                                    Upload File
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="link type form-check-input" type="radio" name="legel_document[0][type]" value="2" dataid="0">
                                <label class="form-check-label" for="link">
                                    Enter Link
                                </label>
                            </div>
                        </div>
                        <div class="row gy-2 mt-1">
                            <div class="col-xxl-6 col-md-6">
                                <label for="title" class="file_label form-label file_label_0" id="label_tag_0">Upload File</label>
                                <input type="file" class="image form-control" id="file_tag_0" name="legel_document[0][image]">
                            </div>
                        </div>
                    </div>
                    @else
                    @php
                    $arr=[];
                    foreach($section3->subSection as $key=>$val){
                    if(str_contains($val->getRawOriginal('image'),'http')){
                    array_push($arr, $key);
                    $data=implode(',',$arr);
                    }
                    }
                    @endphp
                    <input type="hidden" name="getDataId" class="getDataId" value="{{isset($data)?$data:''}}">
                    <input type="hidden" class="section_id" value="{{$section3->id}}" name="section_id">
                    <input type="hidden" class="remove_legel_document_id" value="" name="remove_legel_document_id">
                    @foreach($section3->subSection as $key=>$value)          
                    <div class="faq_section_row">
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                <button type="button" class="btn btn-danger remove_faq m-1 {{$key+1 > 1 ? '' : 'd-none'}}"><i class="ri-subtract-fill"></i></button>
                            </div>
                        </div>
                        <div class="row gy-4">
                            <input type="hidden" class="remove_section_id" value="{{$value->id}}">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (English)</label>
                                    <input type="text" class="en_title form-control" id="en_title" name="legel_document[{{$key}}][en_title]" value="{{ old('en_title', isset($section3->subSection) ? $value->en_title : '') }}">
                                    <input type="hidden" class="section_ids" name="legel_document[{{$key}}][section_ids]" value="{{$value->id}}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (Japanese)</label>
                                    <input type="text" class="ja_title form-control" id="ja_title" name="legel_document[{{$key}}][ja_title]" value="{{ old('ja_title', isset($section3->subSection) ? $value->ja_title : '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="form-check form-check-inline">
                                <input class="file type form-check-input" type="radio" name="legel_document[{{$key}}][type]" value="1" dataid="{{$key}}" {{str_contains($value->getRawOriginal('image'), 'http')?'':'checked'}}>
                                <label class="form-check-label" for="file">
                                    Upload File
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="link type form-check-input" type="radio" name="legel_document[{{$key}}][type]" value="2" dataid="{{$key}}" {{str_contains($value->getRawOriginal('image'), 'http')?'checked':''}}>
                                <label class="form-check-label" for="link">
                                    Enter Link
                                </label>
                            </div>
                        </div>
                        <div class="row mb-2 mt-1">
                            <div class="col-xxl-6 col-md-6">
                                <label for="title" class="form-label file_label" id="label_tag_{{$key}}">{{str_contains($value->getRawOriginal('image'), 'http')?'Enter Link':'Upload File'}}</label>
                                <input type="hidden" name="legel_document[{{$key}}][image]" id="legel_document[{{$key}}][image]" value="{{ isset($section3->subSection) ? $value->getRawOriginal('image') : '' }}">
                                <input type="{{str_contains($value->getRawOriginal('image'), 'http')?'text':'file'}}" name="legel_document[{{$key}}][image]" class="image form-control" id="file_tag_{{$key}}" value="{{$value->getRawOriginal('image')}}">
                                

                            </div>
                            @if(isset($value->image))
                            <div class="imageDiv col-xxl-6 col-md-6">
                                <a download class="btn btn-primary mt-4" href="{{str_contains($value->getRawOriginal('image'), 'http')?$value->getRawOriginal('image'):$value->image}}" value="" rel="noreferrer noopener">Download</a>
                            </div>
                            @endif
                        </div>

                        <hr>
                    </div>
                    @endforeach
                    @endif
                    <input type="submit" value="Save" id="common_save" class="common_save btn btn-primary my-3">
                </div>
            </div>
        </div>

    </div>
</form>
</div>

@endsection
@push('scripts')
<script>
    $(document).on('click', '.common_save', function() {
        $('.en_title,.ja_title').each(function() {
            $(this).rules(
                "add", {
                    required: true
                }
            )
        });

    })
    $('#legal_document_form').validate({
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        rules: {
            'en_title[]': {
                required: true,
            },
            'ja_title[]': {
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

    });
    var arr = [];
    if ($('.getDataId').attr('value') != null) {
        var arr = $('.getDataId').attr('value').split(",");
    }
    $(document).on('change', '.type', function() {
        var id = $(this).attr('dataid');
        $(this).parent().parent().next().find('input[type=hidden]').val('');
        if ($(this).val() == 2) {
            arr.push($(this).attr('dataid'));
            $('#file_tag_' + id).attr('type', "text");
            $('#label_tag_' + id).html('Enter Link');
        } else {
            arr.splice(arr.indexOf($(this).attr('dataid')), 1);
            $('#file_tag_' + id).attr('type', "file");
            $('#label_tag_' + id).html('Upload File');
        }
    })
    $(document).on('click', '.add_faq', function() {
        clone_div = $(".faq_section_row:first").clone();
        clone_div.find('.remove_faq').removeClass('d-none');
        clone_div.insertAfter(".faq_section_row:last");
        clone_div.find('.en_title, .ja_title, .image, .section_ids').val('');
        clone_div.find('.imageLabel').remove();
        clone_div.find('.remove_section_id').remove();
        change_name();
    });

    var remove_payment_ids = [];
    $(document).on('click', '.remove_faq', function() {
        $(this).parent().parent().parent().remove();
        arr.splice(arr.indexOf($(this).attr('dataid')), 1); 
        id = $(this).parents('.faq_section_row').find('.remove_section_id').val();
        if (id != null) {
            remove_payment_ids.push(id);
            $('.remove_legel_document_id').val(remove_payment_ids);
        }

    });

    function change_name() {
        var n = 2;
        $(".faq_section_row").each(function() {
            $(this).find('.en_title').attr('name', 'legel_document[' + (n - 2) + '][en_title]');
            $(this).find('.image').attr('name', 'legel_document[' + (n - 2) + '][image]').attr('id', 'file_tag_' + (n - 2));
            $(this).find('.ja_title').attr('name', 'legel_document[' + (n - 2) + '][ja_title]');
            $(this).find('.section_ids').attr('name', 'legel_document[' + (n - 2) + '][section_ids]');
            $(this).find('.file_label').attr('id', 'label_tag_' + (n - 2));
            $(this).find('.type').attr('name', 'legel_document[' + (n - 2) + '][type]').attr('dataid', (n - 2)).attr('data-id', (n - 2));
            if (arr.includes($(this).find('.file').attr('dataid'))) {
                $(this).find('.link').prop('checked', true);
                $(this).find('.file_label').html('Enter Link');
                $(this).find('.image').attr('type', 'link');
            } else {
                $(this).find('.file').prop('checked', true);
                $(this).find('.file_label').html('Upload File');
                $(this).find('.image').attr('type', 'file');
            }
            n++;
        });

    }
</script>
@endpush