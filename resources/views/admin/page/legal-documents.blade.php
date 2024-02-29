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


<!-- SECTION 3 -->
    <form action="{{ route('admin.save_multiple_section') }}" method="post" enctype="multipart/form-data" id="software_form">
        @csrf
        <input type="hidden" name="remove_sec_ids" class="remove_sec_ids" value="">
        @if($section->where('section_no', '!=', 1)->count())
        @php
        $datas=$section->where('section_no', '!=', 1);
        $arr=[];
        foreach($datas as $key=>$val){
        if(str_contains($val->getRawOriginal('image'),'http')){
        array_push($arr, $key-1);
        $data=implode(',',$arr);
        }
        }
        @endphp
        <input type="hidden" name="getDataId" class="getDataId" value="{{isset($data)?$data:''}}">
        @for($i=1;$i<=$section->where('section_no', '!=', 1)->count();$i++)
            <div class="collapse_sec">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                        <button type="button" class="btn btn-danger remove_faq m-1 {{$i > 1 ? '' : 'd-none'}}" dataid="{{$i-1}}"><i class="ri-subtract-fill"></i></button>
                    </div>
                </div>
                <div class="accordion custom-accordionwithicon accordion-secondary mt-0 mb-2" id="sub_section{{$i-1}}">
                    <div class="accordion-item">
                        @php isset($section) ? ${'section'.($i+1)} = $section->where('section_no', $section[$i]['section_no'])->first() : '' @endphp
                        <h2 class="accordion-header" id="Sub_section_{{$i-1}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_sec_{{$i-1}}" aria-expanded="false" aria-controls="sub_sec_{{$i}}">
                                <i class="ri-global-line me-2"></i> <span class="acc_header">{{ isset(${'section'.($i+1)}) ? ${'section'.($i+1)}->en_title : 'Section '.$i }}</span>
                            </button>
                        </h2>
                        <div id="sub_sec_{{$i-1}}" class="accordion-collapse collapse" aria-labelledby="sub_sec_{{$i-1}}" data-bs-parent="#sub_section{{$i-1}}">
                            <div class="accordion-body">
                                <input type="hidden" name="page_id" value="{{$page_id}}">
                                <input type="hidden" name="section[{{$i-1}}][sec_no]" class="sec_no" value="{{$i+1}}">
                                @if(isset(${'section'.($i+1)}))
                                <input type="hidden" name="section[{{$i-1}}][section_id]" class="section_id" value="{{ ${'section'.($i+1)}->id }}">
                                @endif
                                <div class="row gy-4 mt-1">
                                    <div class="col-xxl-6 col-md-6">
                                        <div>
                                            <label for="title" class="form-label">Title (English)</label>
                                            <input type="text" class="form-control en_title" name="section[{{$i-1}}][en_title]" value="{{ isset(${'section'.($i+1)}) ? ${'section'.($i+1)}->en_title : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6">
                                        <div>
                                            <label for="title" class="form-label">Title (Japanese)</label>
                                            <input type="text" class="form-control ja_title" name="section[{{$i-1}}][ja_title]" value="{{ isset(${'section'.($i+1)}) ? ${'section'.($i+1)}->ja_title : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- New one section type start -->
                                <div class="row gy-4 mt-1 radio-error">
                                    <div class="col-xxl-6 col-md-6">
                                        <!-- section type en-->
                                        <div class="row gy-4 mt-1 mb-1">
                                            <div class="my-2">
                                                <label class="form-check-label">
                                                    Section Type
                                                </label> <br>
                                                <div class="form-check form-check-inline">
                                                    <input class="section_type s1 form-check-input" type="radio" name="section[{{$i-1}}][section_type]" value="0" required {{ ${'section'.($i+1)}->getRawOriginal('section_type') == 0 ? 'checked' : '' }} dataid="{{$i}}">
                                                    <label class="form-check-label" for="ctrader">
                                                        C-Trader
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="section_type s2 form-check-input" type="radio" name="section[{{$i-1}}][section_type]" value="1" required {{ ${'section'.($i+1)}->getRawOriginal('section_type') == 1 ? 'checked' : '' }} dataid="{{$i}}">
                                                    <label class="form-check-label" for="fixi">
                                                        FiXi
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="section_type form-check-input" type="radio" name="section[{{$i-1}}][section_type]" value="2" required {{ ${'section'.($i+1)}->getRawOriginal('section_type') == 2 ? 'checked' : '' }} dataid="{{$i}}">
                                                    <label class="form-check-label" for="MetaTrader5">
                                                        MetaTrader5
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="section_type form-check-input" type="radio" name="section[{{$i-1}}][section_type]" value="3" required {{ ${'section'.($i+1)}->getRawOriginal('section_type') == 3 ? 'checked' : '' }} dataid="{{$i}}">
                                                    <label class="form-check-label" for="mobileapp">
                                                        Mobile APP
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6">
                                        <div class="row gy-4 mt-1 mb-1">
                                            <div class="my-2">
                                                <label class="form-check-label">
                                                    セクションタイプ
                                                </label> <br>
                                                <div class="form-check form-check-inline">
                                                    <input class="section_type_jp s3 form-check-input" type="radio" name="section[{{$i-1}}][section_type_jp]" value="0" required {{ ${'section'.($i+1)}->getRawOriginal('section_type_jp') == 0 ? 'checked' : '' }} dataid="{{$i}}">
                                                    <label class="form-check-label" for="C-トレーダー">
                                                        C-トレーダー
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="section_type_jp s4 form-check-input" type="radio" name="section[{{$i-1}}][section_type_jp]" value="1" required {{ ${'section'.($i+1)}->getRawOriginal('section_type_jp') == 1 ? 'checked' : '' }} dataid="{{$i}}">
                                                    <label class="form-check-label" for="フィキシ">
                                                        フィキシ
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="section_type_jp form-check-input" type="radio" name="section[{{$i-1}}][section_type_jp]" value="2" required {{ ${'section'.($i+1)}->getRawOriginal('section_type_jp') == 2 ? 'checked' : '' }} dataid="{{$i}}">
                                                    <label class="form-check-label" for="メタトレーダー5">
                                                        メタトレーダー5
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="section_type_jp form-check-input" type="radio" name="section[{{$i-1}}][section_type_jp]" value="3" required {{ ${'section'.($i+1)}->getRawOriginal('section_type_jp') == 3 ? 'checked' : '' }} dataid="{{$i}}">
                                                    <label class="form-check-label" for="モバイルアプリ">
                                                        モバイルアプリ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- section type end -->

                                <!-- links and uploads -->
                                <div class="row gy-4 mt-1 radio-error">
                                    <!-- for english -->
                                    <div class="col-xxl-6 col-md-6">
                                        <div class="my-2">
                                            <div class="form-check form-check-inline">
                                                <input class="file type form-check-input" type="radio" name="section[{{$i-1}}][type]" value="1" {{str_contains(${'section'.($i+1)}->getRawOriginal('image'), 'http')?'':'checked'}} dataid="{{$i}}">
                                                <label class="form-check-label" for="file">
                                                    Upload File
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="link type form-check-input" type="radio" name="section[{{$i-1}}][type]" value="2" {{str_contains(${'section'.($i+1)}->getRawOriginal('image'), 'http')?'checked':''}} dataid="{{$i}}">
                                                <label class="form-check-label" for="link">
                                                    Enter Link
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row gy-2 mt-1">
                                            <div class="col-xxl-6 col-md-6">
                                                <input type="hidden" name="section[{{$i-1}}][image]" id="section[{{$i-1}}][image]" value="{{ isset(${'section'.($i+1)}) ? ${'section'.($i+1)}->orignal_image : '' }}">
                                                <label for="title" class="form-label file_label" id="label_tag_{{$i}}">{{str_contains(${'section'.($i+1)}->getRawOriginal('image'), 'http')?'Enter Link':'Upload File'}}</label>
                                                <input type="{{str_contains(${'section'.($i+1)}->getRawOriginal('image'), 'http')?'text':'file'}}" name="section[{{$i-1}}][image]" class="image form-control" id="file_tag_{{$i}}" value="{{ isset(${'section'.($i+1)}) ? ${'section'.($i+1)}->orignal_image : '' }}">

                                            </div>
                                            @if(isset(${'section'.($i+1)}) && ${'section'.($i+1)}->image)
                                            <div class="imageDiv col-xxl-6 col-md-6">
                                                <a download class="btn btn-primary mt-4" href="{{str_contains(${'section'.($i+1)}->getRawOriginal('image'), 'http')?${'section'.($i+1)}->getRawOriginal('image'):${'section'.($i+1)}->image}}" name="section[{{$i-1}}][image]" value="{{ ${'section'.($i+1)}->getRawOriginal('image')}}" rel="noreferrer noopener">Download</a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- end for english -->

                                    <!-- for japanese -->
                                    <div class="col-xxl-6 col-md-6">
                                        <div class="my-2">
                                            <div class="form-check form-check-inline">
                                                <input class="file1 ja_type form-check-input" type="radio" name="section[{{$i-1}}][ja_type]" value="1" {{str_contains(${'section'.($i+1)}->getRawOriginal('ja_image'), 'http')?'':'checked'}} dataid="{{$i}}">
                                                <label class="form-check-label" for="file1">
                                                    ファイルをアップロードする
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="link1 ja_type form-check-input" type="radio" name="section[{{$i-1}}][ja_type]" value="2" {{str_contains(${'section'.($i+1)}->getRawOriginal('ja_image'), 'http')?'checked':''}} dataid="{{$i}}">
                                                <label class="form-check-label" for="link1">
                                                    リンクを入力してください
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row gy-2 mt-1">
                                            <div class="col-xxl-6 col-md-6">
                                                <input type="hidden" name="section[{{$i-1}}][ja_image]" id="section[{{$i-1}}][ja_image]" value="{{ isset(${'section'.($i+1)}) ? ${'section'.($i+1)}->orignal_ja_image : '' }}">
                                                <label for="title" class="form-label file1_label" id="label1_tag_{{$i}}">{{str_contains(${'section'.($i+1)}->getRawOriginal('ja_image'), 'http')?'リンクを入力してください':'ファイルをアップロードする'}}</label>
                                                <input type="{{str_contains(${'section'.($i+1)}->getRawOriginal('ja_image'), 'http')?'text':'file'}}" name="section[{{$i-1}}][ja_image]" class="ja_image form-control" id="file1_tag_{{$i}}" value="{{ isset(${'section'.($i+1)}) ? ${'section'.($i+1)}->orignal_ja_image : '' }}">
                                            </div>
                                            @if(isset(${'section'.($i+1)}) && ${'section'.($i+1)}->ja_image)
                                            <div class="ja_imageDiv col-xxl-6 col-md-6">
                                                <a download class="btn btn-primary mt-4" href="{{str_contains(${'section'.($i+1)}->getRawOriginal('ja_image'), 'http')?${'section'.($i+1)}->getRawOriginal('ja_image'):${'section'.($i+1)}->ja_image}}" name="section[{{$i-1}}][ja_image]" value="{{ ${'section'.($i+1)}->getRawOriginal('ja_image')}}" rel="noreferrer noopener">Download</a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- end japanese -->
                                </div>
                                <!-- end links and uploads -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
        @else
            <div class="collapse_sec">
                <input type="hidden" name="page_id" value="{{$page_id}}">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                        <button type="button" class="btn btn-danger remove_faq m-1 d-none"><i class="ri-subtract-fill"></i></button>
                    </div>
                </div>
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
                                <input type="hidden" name="sec_no" class="sec_no" value="">

                                <div class="row gy-4">
                                    <div class="col-xxl-6 col-md-6">
                                        <div>
                                            <label for="title" class="form-label">Title (English)</label>
                                            <input type="text" class="en_title form-control" id="title" name="en_title" value="{{ old('en_title', isset($section2) ? $section2->en_title : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6">
                                        <div>
                                            <label for="title" class="form-label">Title (Japanese)</label>
                                            <input type="text" class="ja_title form-control" id="ja_title" name="ja_title" value="{{ old('ja_title', isset($section2) ? $section2->ja_title : '') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="my-2">
                                    <div class="form-check form-check-inline">
                                        <input class="file type form-check-input" type="radio" name="section[0][type]" value="1" checked="checked" dataid="0">
                                        <label class="form-check-label" for="file">
                                            Upload File
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="link type form-check-input" type="radio" name="section[0][type]" value="2" dataid="0">
                                        <label class="form-check-label" for="link">
                                            Enter Link
                                        </label>
                                    </div>
                                </div>
                                <div class="row gy-2 mt-1">
                                    <div class="col-xxl-6 col-md-6">
                                        <label for="title" class="file_label form-label file_label_0" id="label_tag_0">Upload File</label>
                                        <input type="file" class="form-control" id="file_tag_0" name="section[0][image]">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endif
<input type="submit" value="Save" id="common_save" class="common_save btn btn-primary my-3">
    </form>
</div>

@endsection
@push('scripts')
<script>
    var arr = [];
    var ja_arr = [];
    if ($('.getDataId').attr('value') != null) {
        var arr = $('.getDataId').attr('value').split(",");
        var ja_arr = $('.getDataId').attr('value').split(",");

    }

    $(document).on('change', '.type', function() {
        var id = $(this).attr('dataid');
        if ($(this).val() == 2) {
            arr.push($(this).attr('dataid'));
            $('#file_tag_' + id).attr('type', "text").val("");
            $('#label_tag_' + id).html('Enter Link');
        } else {
            arr.splice(arr.indexOf($(this).attr('dataid')), 1);
            $('#file_tag_' + id).attr('type', "file");
            $('#label_tag_' + id).html('Upload File');
        }
    })

    $(document).on('change', '.ja_type', function() {
        var id = $(this).attr('dataid');
        if ($(this).val() == 2) {
            ja_arr.push($(this).attr('dataid'));
            $('#file1_tag_' + id).attr('type', "text").attr("value", "");
            $('#label1_tag_' + id).html('リンクを入力してください');
        } else {
            ja_arr.splice(ja_arr.indexOf($(this).attr('dataid')), 1);
            $('#file1_tag_' + id).attr('type', "file").attr("value", "");
            $('#label1_tag_' + id).html('ファイルをアップロードする');
        }
    })

    $(document).on('click', '.add_faq', function() {
        
        var originalSectionTypeValue = $(".collapse_sec:first").find('.section_type:checked').val();
        var originalSectionTypeJPValue = $(".collapse_sec:first").find('.section_type_jp:checked').val();

        var originalTypeValue = $(".collapse_sec:first").find('.type:checked').val();
        var originalTypeJPValue = $(".collapse_sec:first").find('.ja_type:checked').val();
        
        clone_div = $(".collapse_sec:first").clone();
        clone_div.find('.remove_faq').removeClass('d-none');
        clone_div.insertAfter(".collapse_sec:last");
        clone_div.find('.en_title, .ja_title, .sec_no').val('');
        clone_div.find('.imageDiv, .ja_imageDiv').hide();
        clone_div.find('.image, .ja_image').attr('value', '');
        clone_div.find('.type, .ja_type, .section_type, .section_type_jp').prop('checked', false);

        // Set default values for radio buttons in the original div for section type
        $(".collapse_sec:first .section_type, .collapse_sec:first .section_type_jp").prop('checked', false); // Uncheck all options
        $(".collapse_sec:first .section_type[value='" + originalSectionTypeValue + "'], .collapse_sec:first .section_type_jp[value='" + originalSectionTypeJPValue + "']").prop('checked', true);

        // Set default values for radio buttons in the original div for file and type
        $(".collapse_sec:first .type, .collapse_sec:first .ja_type").prop('checked', false);
        $(".collapse_sec:first .type[value='" + originalTypeValue + "'], .collapse_sec:first .ja_type[value='" + originalTypeJPValue + "']").prop('checked', true);

        clone_div.find('.remove_faq').attr('dataid', '');
        change_name();
    });

    function change_name() {
        var n = 2;

        $(".collapse_sec").each(function() {
            $(this).attr('id', 'section' + n)
            $(this).find('.accordion-collapse').attr('id', 'sec_' + n).attr('data-bs-parent', '#sec' + n).attr('aria-labelledby', 'Sec' + n)
            $(this).find('.accordion-header').attr('id', 'Sec' + n)
            $(this).find('.accordion-button').attr('data-bs-target', '#sec_' + n).attr('aria-controls', 'sec_' + n).text("Section " + n)
            $(this).find('.sec_no').attr('name', 'section[' + (n - 2) + '][sec_no]').val(n);
            $(this).find('.en_title').attr('name', 'section[' + (n - 2) + '][en_title]');
            $(this).find('.ja_title').attr('name', 'section[' + (n - 2) + '][ja_title]');

            $(this).find('.image').attr('name', 'section[' + (n - 2) + '][image]').attr('id', 'file_tag_' + (n - 2));
            $(this).find('.file_label').attr('id', 'label_tag_' + (n - 2));
            $(this).find('.type').attr('name', 'section[' + (n - 2) + '][type]').attr('dataid', (n - 2)).attr('data-id', (n - 2));
            $(this).find('.section_type').attr('name', 'section[' + (n - 2) + '][section_type]').attr('dataid', (n - 2)).attr('data-id', (n - 2));

            $(this).find('.ja_image').attr('name', 'section[' + (n - 2) + '][ja_image]').attr('id', 'file1_tag_' + (n - 2));
            $(this).find('.file1_label').attr('id', 'label1_tag_' + (n - 2));
            $(this).find('.ja_type').attr('name', 'section[' + (n - 2) + '][ja_type]').attr('dataid', (n - 2)).attr('data-id', (n - 2));
            $(this).find('.section_type_jp').attr('name', 'section[' + (n - 2) + '][section_type_jp]').attr('dataid', (n - 2)).attr('data-id', (n - 2));

            // if (arr.includes($(this).find('.file').attr('dataid'))) {
            //     $(this).find('.link').prop('checked', true);
            //     $(this).find('.file_label').html('Enter Link');
            //     $(this).find('.image').attr('type', 'link');
            // } else {
            //     $(this).find('.file').prop('checked', true);
            //     $(this).find('.file_label').html('Upload File');
            //     $(this).find('.image').attr('type', 'file');
            // }

            // if (ja_arr.includes($(this).find('.file1').attr('dataid'))) {
            //     $(this).find('.link1').prop('checked', true);
            //     $(this).find('.file1_label').html('リンクを入力してください');
            //     $(this).find('.ja_image').attr('ja_type', 'link');
            // } else {
            //     $(this).find('.file1').prop('checked', true);
            //     $(this).find('.file1_label').html('ファイルをアップロードする');
            //     $(this).find('.ja_image').attr('ja_type', 'file');
            // }

            n++;
        });

    }
    
    var remove_payment_ids = [];
    $(document).on('click', '.remove_faq', function() {
        var btnElement = $(this);

        var dataEleId = btnElement.attr('dataid');
        
        if(dataEleId != ''){
            console.log('test');
            arr.splice(arr.indexOf(dataEleId), 1);
            remove_payment_ids.push(btnElement.parents('.collapse_sec').find('.section_id').val());
            $('.remove_sec_ids').val(remove_payment_ids);
        }
       
        btnElement.parents('.collapse_sec').remove();
    });
    
    
    
    
    
    
    // var remove_payment_ids = [];
    // $(document).on('click', '.remove_faq', function() {
    //     $(this).parent().parent().parent().remove();
    //     arr.splice(arr.indexOf($(this).attr('dataid')), 1);
    //     remove_payment_ids.push($(this).parents('.collapse_sec').find('.section_id').val());
    //     $('.remove_sec_ids').val(remove_payment_ids);
    // });

    $(document).on('click', '.common_save', function() {
        $('.en_title,.ja_title,.type, .ja_type').each(function() {
            $(this).rules(
                "add", {
                    required: true
                }
            )
        });

        // Add custom validation for link inputs
        // $('.link').each(function() {
        //     var id = $(this).attr('dataid');
        //     var linkInput = $('#file_tag_' + id);

        //     if ($(this).val() == 2) {
        //         linkInput.rules("add", {
        //             required: {
        //                 depends: function(element) {
        //                     return $('.type[dataid="' + id + '"]:checked').val() == 2;
        //                 }
        //             },
        //             messages: {
        //                 required: "Link is required"
        //             }
        //         });
        //     } else {
        //         linkInput.rules("remove", "required");
        //     }
        // });

        // $('.link1').each(function() {
        //     var id = $(this).attr('dataid');
        //     var linkInput = $('#file1_tag_' + id);

        //     if ($(this).val() == 2) {
        //         linkInput.rules("add", {
        //             required: {
        //                 depends: function(element) {
        //                     return $('.ja_type[dataid="' + id + '"]:checked').val() == 2;
        //                 }
        //             },
        //             messages: {
        //                 required: "Link is required"
        //             }
        //         });
        //     } else {
        //         linkInput.rules("remove", "required");
        //     }
        // });

    })

    $('#software_form').validate({
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        rules: {
            'en_title[]': {
                required: true,
            },
            'ja_title[]': {
                required: true,
            },
            'image[]': {
                required: true,
            },
            'ja_image[]': {
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
</script>
@endpush