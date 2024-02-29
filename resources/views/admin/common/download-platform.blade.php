@extends('admin.layouts.master')

@section('title', $slug)


@section('content')
<link rel="stylesheet" href="{{ asset('custom.css') }}">

<div class="animated fadeIn">
    <!-- SECTION 5 download ctrade platofrm section-->
    @php isset($common) ? $section5 = $common->where('section_no', 5)->first() : '' @endphp
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec5">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec5">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_5" aria-expanded="true" aria-controls="sec_5">
                    <i class="ri-global-line me-2"></i>Download cTrader Platofrm Section
                </button>
            </h2>
            <div id="sec_5" class="accordion-collapse collapse" aria-labelledby="Sec5" data-bs-parent="#sec5">
                <div class="accordion-body">

                    <form action="{{ route('admin.save_section', ['sec_no' => 5]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="-1">

                        @if(isset($section5))
                        <input type="hidden" name="section_id" value="{{ $section5->id }}">
                        @endif

                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="customSwitchsizelg" name="status" {{ isset($section5) ? (($section5->status == 1) ? 'checked' : '') : 'checked' }}>
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

                        <div class="row mt-1 gy-4">
                            <!-- link1 English -->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Download Platform Guide Link (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_link[]" value="{{ $section5 && !is_null($section5->en_link) && is_array(json_decode($section5->en_link)) ? json_decode($section5->en_link)[0] : '' }}">
                                </div>
                            </div>
                            <!-- link1  Japanese -->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Download Platform Guide Link (Japanese)</label>
                                    <input type="text" class="form-control" id="title" name="ja_link[]" value="{{ $section5 && !is_null($section5->ja_link) && is_array(json_decode($section5->ja_link)) ? json_decode($section5->ja_link)[0] : '' }}">
                                </div>
                            </div>

                        </div>

                        <!-- other 4 links -->
                        <div class="row mt-1 gy-4">
                            <!-- link Window -->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Window (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_link[]" value="{{ $section5 && !is_null($section5->en_link) && is_array(json_decode($section5->en_link)) ? json_decode($section5->en_link)[1] : '' }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Window (Japanese)</label>
                                    <input type="text" class="form-control" id="title" name="ja_link[]" value="{{ $section5 && !is_null($section5->ja_link) && is_array(json_decode($section5->ja_link)) ? json_decode($section5->ja_link)[1] : '' }}">
                                </div>
                            </div>

                            <!-- link Android -->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Android (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_link[]" value="{{ $section5 && !is_null($section5->en_link) && is_array(json_decode($section5->en_link)) ? json_decode($section5->en_link)[2] : '' }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Android (Japanese)</label>
                                    <input type="text" class="form-control" id="title" name="ja_link[]" value="{{ $section5 && !is_null($section5->ja_link) && is_array(json_decode($section5->ja_link)) ? json_decode($section5->ja_link)[2] : '' }}">
                                </div>
                            </div>

                            <!-- link apple-->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Apple (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_link[]" value="{{ $section5 && !is_null($section5->en_link) && is_array(json_decode($section5->en_link)) ? json_decode($section5->en_link)[3] : '' }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Apple (Japanese)</label>
                                    <input type="text" class="form-control" id="title" name="ja_link[]" value="{{ $section5 && !is_null($section5->ja_link) && is_array(json_decode($section5->ja_link)) ? json_decode($section5->ja_link)[3] : '' }}">
                                </div>
                            </div>

                            <!-- link web-->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Web (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_link[]" value="{{ $section5 && !is_null($section5->en_link) && is_array(json_decode($section5->en_link)) ? json_decode($section5->en_link)[4] : '' }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Web (Japanese)</label>
                                    <input type="text" class="form-control" id="title" name="ja_link[]" value="{{ $section5 && !is_null($section5->ja_link) && is_array(json_decode($section5->ja_link)) ? json_decode($section5->ja_link)[4] : '' }}">
                                </div>
                            </div>

                        </div>

                        <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 6 download mt5 platofrm section-->
    @php isset($common) ? $section6 = $common->where('section_no', 6)->first() : '' @endphp
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec6">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec6">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_6" aria-expanded="true" aria-controls="sec_6">
                    <i class="ri-global-line me-2"></i>Download MetaTrader5 Platofrm Section
                </button>
            </h2>
            <div id="sec_6" class="accordion-collapse collapse" aria-labelledby="Sec6" data-bs-parent="#sec6">
                <div class="accordion-body">
                    <form action="{{ route('admin.save_section', ['sec_no' => 6]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="-1">

                        @if(isset($section6))
                        <input type="hidden" name="section_id" value="{{ $section6->id }}">
                        @endif

                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="customSwitchsizelg" name="status" {{ isset($section6) ? (($section6->status == 1) ? 'checked' : '') : 'checked' }}>
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

                        <div class="row mt-1 gy-4">
                            <!-- link1 English -->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Download Platform Guide Link (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_link[]" value="{{ $section6 && !is_null($section6->en_link) && is_array(json_decode($section6->en_link)) ? json_decode($section6->en_link)[0] : '' }}">
                                </div>
                            </div>
                            <!-- link1  Japanese -->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Download Platform Guide Link (Japanese)</label>
                                    <input type="text" class="form-control" id="title" name="ja_link[]" value="{{ $section6 && !is_null($section6->ja_link) && is_array(json_decode($section6->ja_link)) ? json_decode($section6->ja_link)[0] : '' }}">
                                </div>
                            </div>

                        </div>

                        <!-- other 4 links -->
                        <div class="row mt-1 gy-4">
                            <!-- link Window -->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Window (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_link[]" value="{{ $section6 && !is_null($section6->en_link) && is_array(json_decode($section6->en_link)) ? json_decode($section6->en_link)[1] : '' }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Window (Japanese)</label>
                                    <input type="text" class="form-control" id="title" name="ja_link[]" value="{{ $section6 && !is_null($section6->ja_link) && is_array(json_decode($section6->ja_link)) ? json_decode($section6->ja_link)[1] : '' }}">
                                </div>
                            </div>

                            <!-- link Android -->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Android (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_link[]" value="{{ $section6 && !is_null($section6->en_link) && is_array(json_decode($section6->en_link)) ? json_decode($section6->en_link)[2] : '' }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Android (Japanese)</label>
                                    <input type="text" class="form-control" id="title" name="ja_link[]" value="{{ $section6 && !is_null($section6->ja_link) && is_array(json_decode($section6->ja_link)) ? json_decode($section6->ja_link)[2] : '' }}">
                                </div>
                            </div>

                            <!-- link apple-->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Apple (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_link[]" value="{{ $section6 && !is_null($section6->en_link) && is_array(json_decode($section6->en_link)) ? json_decode($section6->en_link)[3] : '' }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Apple (Japanese)</label>
                                    <input type="text" class="form-control" id="title" name="ja_link[]" value="{{ $section6 && !is_null($section6->ja_link) && is_array(json_decode($section6->ja_link)) ? json_decode($section6->ja_link)[3] : '' }}">
                                </div>
                            </div>

                            <!-- link web-->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Web (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_link[]" value="{{ $section6 && !is_null($section6->en_link) && is_array(json_decode($section6->en_link)) ? json_decode($section6->en_link)[4] : '' }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Web (Japanese)</label>
                                    <input type="text" class="form-control" id="title" name="ja_link[]" value="{{ $section6 && !is_null($section6->ja_link) && is_array(json_decode($section6->ja_link)) ? json_decode($section6->ja_link)[4] : '' }}">
                                </div>
                            </div>

                        </div>

                        <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 7 download advan trade platofrm section-->
    @php isset($common) ? $section7 = $common->where('section_no', 7)->first() : '' @endphp
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec7">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec7">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_7" aria-expanded="true" aria-controls="sec_7">
                    <i class="ri-global-line me-2"></i>Download Advan Trade Platofrm Section
                </button>
            </h2>
            <div id="sec_7" class="accordion-collapse collapse" aria-labelledby="Sec7" data-bs-parent="#sec7">
                <div class="accordion-body">
                    <form action="{{ route('admin.save_section', ['sec_no' => 7]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="-1">

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

                        <div class="row mt-1 gy-4">
                            <!-- link1 English -->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Download Platform Guide Link (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_link[]" value="{{ $section7 && !is_null($section7->en_link) && is_array(json_decode($section7->en_link)) ? json_decode($section7->en_link)[0] : '' }}">
                                </div>
                            </div>
                            <!-- link1  Japanese -->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Download Platform Guide Link (Japanese)</label>
                                    <input type="text" class="form-control" id="title" name="ja_link[]" value="{{ $section7 && !is_null($section7->ja_link) && is_array(json_decode($section7->ja_link)) ? json_decode($section7->ja_link)[0] : '' }}">
                                </div>
                            </div>

                        </div>

                        <!-- other 4 links -->
                        <div class="row mt-1 gy-4">
                            <!-- link Window -->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Window (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_link[]" value="{{ $section7 && !is_null($section7->en_link) && is_array(json_decode($section7->en_link)) ? json_decode($section7->en_link)[1] : '' }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Window (Japanese)</label>
                                    <input type="text" class="form-control" id="title" name="ja_link[]" value="{{ $section7 && !is_null($section7->ja_link) && is_array(json_decode($section7->ja_link)) ? json_decode($section7->ja_link)[1] : '' }}">
                                </div>
                            </div>

                            <!-- link Android -->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Android (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_link[]" value="{{ $section7 && !is_null($section7->en_link) && is_array(json_decode($section7->en_link)) ? json_decode($section7->en_link)[2] : '' }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Android (Japanese)</label>
                                    <input type="text" class="form-control" id="title" name="ja_link[]" value="{{ $section7 && !is_null($section7->ja_link) && is_array(json_decode($section7->ja_link)) ? json_decode($section7->ja_link)[2] : '' }}">
                                </div>
                            </div>

                            <!-- link apple-->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Apple (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_link[]" value="{{ $section7 && !is_null($section7->en_link) && is_array(json_decode($section7->en_link)) ? json_decode($section7->en_link)[3] : '' }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Apple (Japanese)</label>
                                    <input type="text" class="form-control" id="title" name="ja_link[]" value="{{ $section7 && !is_null($section7->ja_link) && is_array(json_decode($section7->ja_link)) ? json_decode($section7->ja_link)[3] : '' }}">
                                </div>
                            </div>

                            <!-- link web-->
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Web (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_link[]" value="{{ $section7 && !is_null($section7->en_link) && is_array(json_decode($section7->en_link)) ? json_decode($section7->en_link)[4] : '' }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Web (Japanese)</label>
                                    <input type="text" class="form-control" id="title" name="ja_link[]" value="{{ $section7 && !is_null($section7->ja_link) && is_array(json_decode($section7->ja_link)) ? json_decode($section7->ja_link)[4] : '' }}">
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