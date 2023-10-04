@extends('admin.layouts.master')

@section('title', $slug)

@section('content')
<link rel="stylesheet" href="{{ asset('custom.css') }}">
<div class="animated fadeIn">
    <!-- ----------- Header Section ------------------- -->
    @include('admin.common.header_section')

    <!-- SECTION 1 -->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec1">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_1" aria-expanded="true" aria-controls="sec_1">
                    <i class="ri-global-line me-2"></i>Section 1
                </button>
            </h2>
            <div id="sec_1" class="accordion-collapse collapse" aria-labelledby="Sec1" data-bs-parent="#sec1">
                <div class="accordion-body">
                    @php isset($section) ? $section1 = $section->where('section_no', 1)->first() : '' @endphp
                    <form action="{{ route('admin.save_section', ['sec_no' => 1]) }}" method="post" enctype=multipart/form-data>
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section1))
                        <input type="hidden" name="section_id" value="{{ $section1->id }}">
                        @endif

                        <!-- <div class="row">
                            <div class="col-xxl-6 col-md-6 mb-3">
                                <label for="title" class="form-label mx-2">Image</label>
                                <div class="s-preview-img my-product-img">
                                    @if(isset($section1->image))
                                    <input type="hidden" name="image" value="{{$section1->getRawOriginal('image')}}">
                                    @endif
                                    <input type="file" name="image" class="form-control custom_img">

                                    <img src="{{ isset($section1->image) ? $section1->image : '' }}" loading="lazy" class="img-fluid" id="main_image" alt="" />
                                    <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                                    <div class="p-upload-icon">
                                        <i class="ri-upload-cloud-2-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="row gy-4 mt-2">
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

                        <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 2 -->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec2">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec2">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_2" aria-expanded="true" aria-controls="sec_1">
                    <i class="ri-global-line me-2"></i>Section 2
                </button>
            </h2>
            <div id="sec_2" class="accordion-collapse collapse" aria-labelledby="Sec2" data-bs-parent="#sec1">
                <div class="accordion-body">
                    @php isset($section) ? $section2 = $section->where('section_no', 2)->first() : '' @endphp
                    <form action="{{ route('admin.save_section', ['sec_no' => 2]) }}" method="post" enctype=multipart/form-data>
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section2))
                        <input type="hidden" name="section_id" value="{{ $section2->id }}">
                        @endif

                        <!-- <div class="row">
                            <div class="col-xxl-6 col-md-6 mb-3">
                                <label for="title" class="form-label mx-2">Image</label>
                                <div class="s-preview-img my-product-img">
                                    @if(isset($section2->image))
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
                        </div> -->
                        <div class="row gy-4 mt-2">
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
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="Sec5">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec5">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_5" aria-expanded="true" aria-controls="sec_5">
                    <i class="ri-global-line me-2"></i>Section 3
                </button>
            </h2>
            <div id="sec_5" class="accordion-collapse collapse" aria-labelledby="Sec5" data-bs-parent="#Sec5">
                <div class="accordion-body">
                    <form action="{{ route('admin.save_section', ['sec_no' => 3]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">
                        <input type="hidden" name="remove_share_ids" class="remove_share_ids" value="">

                        @if(isset($section3))
                        <input type="hidden" name="section_id" value="{{ $section3->id }}">
                        @endif
                        <div>
                            <a href="{{route('admin.setting.share-category')}}">Shares & Bonds Category</a>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="status" {{ isset($section3) ? (($section3->status == 1) ? 'checked' : '') : 'checked' }}>
                                </div>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Title (English)</label>
                                    <input type="text" name="en_title" class="form-control" id="title" cols="30" rows="3" value="{{isset($section3) ? $section3->en_title?$section3->en_title:'':''}}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Title (Japanese)</label>
                                    <input type="text" name="ja_title" class="form-control" id="title" cols="30" rows="3" value="{{isset($section3) ? $section3->ja_title?$section3->ja_title:'':''}}">
                                </div>
                            </div>
                        </div>


                        <input type="submit" value="Save" class="btn btn-primary my-2">

                        <div class="card mt-2">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary share_add" data-toggle="modal" data-target="#spreadModal">Add</button>

                            </div>
                            <div class="card-body">
                                {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap','style' => 'width: 100%']) !!}
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="spreadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="spreadModalLabel">Add Share & Bonds</h5>
                <button type="button" class="btn btn-primary share_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-header pull-left">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#english_nav" role="tab" aria-controls="english" aria-selected="false" id="English">English</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#japanese_nav" role="tab" aria-controls="japanese" aria-selected="false" id="Japanese">Japanese</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div id="english_nav" class="tab-pane active" role="tabpanel" aria-labelledby="eng-tab"><br>
                        <form id="share_form" method="post">
                            @csrf

                            <input type="hidden" name="share_id" id="share_id" value="">
                            <div class="row mt-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="dec" class="form-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach($share_categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->en_name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="symbol" class="form-label">Symbol (English)</label>
                                        <input type="text" name="symbol" class="form-control" id="symbol">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="description" class="form-label">Description (English)</label>
                                        <input type="text" name="description" class="form-control" id="description">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="type" class="form-label">Type (English)</label>
                                        <input type="text" name="type" class="form-control" id="type">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="currency_base" class="form-label">Currency Base (English)</label>
                                        <input type="text" name="currency_base" class="form-control" id="currency_base">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="margin" class="form-label">Margin Currency (English)</label>
                                        <input type="text" name="margin" class="form-control" id="margin">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="max_levarage" class="form-label">Max Leverage (English)</label>
                                        <input type="text" name="max_levarage" class="form-control" id="max_levarage">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="contract" class="form-label">Contract Size (English)</label>
                                        <input type="text" name="contract" class="form-control" id="contract">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="min_trade_size" class="form-label">Min Trade Size (English)</label>
                                        <input type="text" name="min_trade_size" class="form-control" id="min_trade_size">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="max_trade_size" class="form-label">Max Trade Size (English)</label>
                                        <input type="text" name="max_trade_size" class="form-control" id="max_trade_size">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="day_swap" class="form-label">3 Day Swap (English)</label>
                                        <input type="text" name="day_swap" class="form-control" id="day_swap">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="long_swap" class="form-label">Long Swap(English)</label>
                                        <input type="text" name="long_swap" class="form-control" id="long_swap">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="short_swap" class="form-label">Short Swap (English)</label>
                                        <input type="text" name="short_swap" class="form-control" id="short_swap">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="holding_period" class="form-label">Holding Period (English)</label>
                                        <input type="text" name="holding_period" class="form-control" id="holding_period">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="trading_hours" class="form-label">Trading Hours (English)</label>
                                        <input type="text" name="trading_hours" class="form-control" id="trading_hours">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer mt-4">
                                <button type="button" class="btn btn-primary" id="next">Next</button>
                            </div>
                    </div>
                    <div id="japanese_nav" class="tab-pane" role="tabpanel" aria-labelledby="jpn-tab"><br>

                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_symbol" class="form-label">Symbol (Japanise)</label>
                                    <input type="text" name="ja_symbol" class="form-control" id="ja_symbol">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_description" class="form-label">Description (Japanise)</label>
                                    <input type="text" name="ja_description" class="form-control" id="ja_description">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_type" class="form-label">Type (Japanise)</label>
                                    <input type="text" name="ja_type" class="form-control" id="ja_type">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_currency_base" class="form-label">Currency Base (Japanise)</label>
                                    <input type="text" name="ja_currency_base" class="form-control" id="ja_currency_base">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_margin" class="form-label">Margin Currency (Japanise)</label>
                                    <input type="text" name="ja_margin" class="form-control" id="ja_margin">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_max_levarage" class="form-label">Max Leverage (Japanise)</label>
                                    <input type="text" name="ja_max_levarage" class="form-control" id="ja_max_levarage">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_contract" class="form-label">Contract Size (Japanise)</label>
                                    <input type="text" name="ja_contract" class="form-control" id="ja_contract">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_min_trade_size" class="form-label">Min Trade Size (Japanise)</label>
                                    <input type="text" name="ja_min_trade_size" class="form-control" id="ja_min_trade_size">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_max_trade_size" class="form-label">Max Trade Size (Japanise)</label>
                                    <input type="text" name="ja_max_trade_size" class="form-control" id="ja_max_trade_size">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_day_swap" class="form-label">3 Day Swap (Japanise)</label>
                                    <input type="text" name="ja_day_swap" class="form-control" id="ja_day_swap">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_long_swap" class="form-label">Long Swap (Japanise)</label>
                                    <input type="text" name="ja_long_swap" class="form-control" id="ja_long_swap">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_short_swap" class="form-label">Short Swap (Japanise)</label>
                                    <input type="text" name="ja_short_swap" class="form-control" id="ja_short_swap">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_holding_period" class="form-label">Holding Period (Japanise)</label>
                                    <input type="text" name="ja_holding_period" class="form-control" id="ja_holding_period">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_trading_hours" class="form-label">Trading Hours (Japanise)</label>
                                    <input type="text" name="ja_trading_hours" class="form-control" id="ja_trading_hours">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-4">
                            <button type="button" class="btn btn-secondary share_close" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
{!! $dataTable->scripts() !!}

<script src="{{ asset('custom.js') }}"></script>
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
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function () {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
            };

            input.click();
        },
    });
</script>

<script>
    $(document).on('click', '.share_add', function() {
        $('#share_form')[0].reset();
        $('#share_id').attr("value", "");
        $('#shareModal').modal('show');
    });

    $(document).on('click', '.share_close', function() {
        $('#shareModal').modal('hide');
        $('#share_form')[0].reset();
        $('.invalid-feedback').html("");
    });

    $('#share_form').validate({
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        rules: {

        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        },
        submitHandler: function(form) {
            $('.invalid-feedback').html('');
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.add_share') }}",
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function(data) {
                    window.LaravelDataTables["share-table"].draw();
                    $('#shareModal').modal('toggle');
                    Swal.fire(
                        'Good job!',
                        'Category Added Successfully',
                        'success'
                    )
                },
                error: function(error) {
                    var errors = $.parseJSON(error.responseText);
                    $.each(errors.errors, function(key, value) {
                        console.log(key, value[0]);
                        $('#share_form').find('#' + key).nextAll('span').html(value[0]);
                    });
                }
            });
        },
    });

    $('#myTab a').on('click', function(e) {
        e.preventDefault()
        $(this).tab('show')
    })

    $('#next').on('click', function(e) {
        $('#English').removeClass('active');
        $('#english_nav').removeClass('active');
        $('#Japanese').addClass('active');
        $('#japanese_nav').addClass('active');
    })

    $(document).on('click', '.edit_share', function() {
        id = $(this).attr('share_id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('admin.get_share') }}",
            type: 'POST',
            data: {
                'id': id
            },
            success: function(res) {
                console.log(res);
                if (res) {
                    $('#shareModal').modal('show');
                    $('#share_id').val(res.id);
                    $('#category_id').val(res.category_id);
                    $('#symbol').val(res.symbol);
                    $('#ja_symbol').val(res.ja_symbol);
                    $('#description').val(res.description);
                    $('#ja_description').val(res.ja_description);
                    $('#long_swap').val(res.long_swap);
                    $('#ja_long_swap').val(res.ja_long_swap);
                    $('#short_swap').val(res.short_swap);
                    $('#ja_short_swap').val(res.ja_short_swap);
                    $('#holding_period').val(res.holding_period);
                    $('#ja_holding_period').val(res.ja_holding_period);
                    $('#margin').val(res.margin);
                    $('#ja_margin').val(res.ja_margin);
                    $('#contract').val(res.contract);
                    $('#ja_contract').val(res.ja_contract);
                    $('#type').val(res.type);
                    $('#ja_type').val(res.ja_type);
                    $('#currency_base').val(res.currency_base);
                    $('#ja_currency_base').val(res.ja_currency_base);
                    $('#min_trade_size').val(res.min_trade_size);
                    $('#ja_min_trade_size').val(res.ja_min_trade_size);
                    $('#max_trade_size').val(res.max_trade_size);
                    $('#ja_max_trade_size').val(res.ja_max_trade_size);
                    $('#max_levarage').val(res.max_levarage);
                    $('#ja_max_levarage').val(res.ja_max_levarage);
                    $('#day_swap').val(res.day_swap);
                    $('#ja_day_swap').val(res.ja_day_swap);
                    $('#trading_hours').val(res.trading_hours);
                    $('#ja_trading_hours').val(res.ja_trading_hours);
                }
            }
        });
    });

    $(document).on('click', '.delete_share', function() {
        id = $(this).attr('share_id');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('admin.delete_share') }}",
            type: 'POST',
            data: {
                'id': id
            },
            success: function(res) {
                if (res) {
                    window.LaravelDataTables["share-table"].draw();
                }
            }
        });
    });
</script>
@endpush