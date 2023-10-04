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
                    <form action="{{ route('admin.save_section', ['sec_no' => 2]) }}" method="post">
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
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec3">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec3">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_3" aria-expanded="true" aria-controls="sec_3">
                    <i class="ri-global-line me-2"></i>Section 3
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

                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="customSwitchsizelg" name="status" {{ isset($section3) ? (($section3->status == 1) ? 'checked' : '') : 'checked' }}>
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

                        @for($i=1; $i<=5; $i++) @php $sub_section3=$section3->subSection[$i-1] ?? '' @endphp
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
                                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ isset($sub_section3) ? (($sub_section3->status == 1) ? 'checked' : '') : 'checked' }}>
                                            </div>

                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Count text (English)</label>
                                                        <input type="text" class="form-control" id="en_count_text" name="sub_section[{{$i}}][en_count_text]" value="{{ $sub_section3 ? $sub_section3->en_count_text : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Count text (Japanese)</label>
                                                        <input type="text" class="form-control" id="ja_count_text" name="sub_section[{{$i}}][ja_count_text]" value="{{ $sub_section3 ? $sub_section3->ja_count_text : '' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Short text (English)</label>
                                                        <input type="text" class="form-control" id="en_short_text" name="sub_section[{{$i}}][en_short_text]" value="{{ $sub_section3 ? $sub_section3->en_short_text : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Short text (Japanese)</label>
                                                        <input type="text" class="form-control" id="ja_short_text" name="sub_section[{{$i}}][ja_short_text]" value="{{ $sub_section3 ? $sub_section3->ja_short_text : '' }}">
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
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (English)</label>
                                                        <textarea name="sub_section[{{$i}}][en_desc]" class="form-control" cols="100" rows="5">{{ $sub_section3 ? $sub_section3->en_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (Japanese)</label>
                                                        <textarea name="sub_section[{{$i}}][ja_desc]" class="form-control" cols="100" rows="5">{{ $sub_section3 ? $sub_section3->ja_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Image</label>
                                                        <input type="file" class="form-control" id="image" name="sub_section[{{$i}}][image]">
                                                    </div>
                                                </div>
                                                @if(isset($sub_section3->image) && $sub_section3->image)
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <img src="{{ $sub_section3->image }}" alt="" loading="lazy" height="100px" width="100px">
                                                    </div>
                                                </div>
                                                @endif
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
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec8">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec8">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_8" aria-expanded="true" aria-controls="sec_8">
                    <i class="ri-global-line me-2"></i>Section 4
                </button>
            </h2>
            <div id="sec_8" class="accordion-collapse collapse" aria-labelledby="Sec8" data-bs-parent="#sec8">
                <div class="accordion-body">
                    @php isset($section) ? $section8 = $section->where('section_no', 4)->first() : '' @endphp
                    <form action="{{ route('admin.save_section', ['sec_no' => 4]) }}" method="post">
                        @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        @if(isset($section8))
                        <input type="hidden" name="section_id" value="{{ $section8->id }}">
                        @endif

                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="customSwitchsizelg" name="status" {{ isset($section8) ? (($section8->status == 1) ? 'checked' : '') : 'checked' }}>
                                </div>
                            </div>
                        </div>

                        <div class="row gy-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_title" value="{{ old('en_title', isset($section8) ? $section8->en_title : '') }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (Japanese)</label>
                                    <input type="text" class="form-control" id="ja_title" name="ja_title" value="{{ old('ja_title', isset($section8) ? $section8->ja_title : '') }}">
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>
                    <div class="card mt-2">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary forex_add" data-toggle="modal" data-target="#spreadModal">Add</button>
                        </div>
                        <div class="card-body">
                            {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap','style' => 'width: 100%']) !!}
                        </div>
                    </div>
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
                                    <div class="row">
                                        <div class="col-6"><span class="faq_header">Question {{$k+1}}</span></div>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-danger remove_faq mx-1 {{ $k>0 ? '' : 'd-none'  }}" style="float: right;"><i class="ri-subtract-fill"></i></button>
                                            <button type="button" class="btn btn-primary add_faq" style="float: right;"><i class="ri-add-fill"></i></button>
                                        </div>
                                    </div>
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
                                                <textarea name="faq[{{$k}}][en_answer]" class="ckeditor en_answer" id="answer" cols="30" rows="10">{{ $faq->en_answer }}</textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="dec" class="form-label">Answer (Japanese)</label>
                                                <textarea name="faq[{{$k}}][ja_answer]" class="ckeditor ja_answer" id="answer" cols="30" rows="10">{{ $faq->ja_answer }}</textarea>
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
                                    <div class="row">
                                        <div class="col-6"><span class="faq_header">Question 1</span></div>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-danger remove_faq mx-1 d-none" style="float: right;"><i class="ri-subtract-fill"></i></button>
                                            <button type="button" class="btn btn-primary add_faq" style="float: right;"><i class="ri-add-fill"></i></button>
                                        </div>
                                    </div>
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
                                                <textarea name="faq[0][en_answer]" class="ckeditor en_answer" id="answer" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="dec" class="form-label">Answer (Japanese)</label>
                                                <textarea name="faq[0][ja_answer]" class="ckeditor ja_answer" id="answer" cols="30" rows="10"></textarea>
                                            </div>
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
<div class="modal fade" id="forexModal" tabindex="-1" role="dialog" aria-labelledby="spreadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="spreadModalLabel">Add Share & Bonds</h5>
                <button type="button" class="btn btn-primary forex_close" data-dismiss="modal" aria-label="Close">
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
                        <form id="forex_form" method="post" action="{{ route('admin.add_forex') }}">
                            @csrf

                            <input type="hidden" name="forex_id" id="forex_id" value="">
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
                                        <input type="text" name="description" class="form-control" id="descriptions">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="currency_base" class="form-label">Currency Base (English)</label>
                                        <input type="text" name="currency_base" class="form-control" id="currency_base">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="margin_currency" class="form-label">Margin Currency (English)</label>
                                        <input type="text" name="margin_currency" class="form-control" id="margin_currency">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="contract_size" class="form-label">Contract Size (English)</label>
                                        <input type="text" name="contract_size" class="form-control" id="contract_size">
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
                                        <label for="max_volume_trade" class="form-label">Max Trade Size (English)</label>
                                        <input type="text" name="max_volume_trade" class="form-control" id="max_volume_trade">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="min_volume_trade" class="form-label">Min Trade Size (English)</label>
                                        <input type="text" name="min_volume_trade" class="form-control" id="min_volume_trade">
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
                                        <label for="grant_date" class="form-label">Grant Date (English)</label>
                                        <input type="text" name="grant_date" class="form-control" id="grant_date">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
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
                                    <label for="ja_symbol" class="form-label">Symbol (Japanese)</label>
                                    <input type="text" name="ja_symbol" class="form-control" id="ja_symbol">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_description" class="form-label">Description (Japanese)</label>
                                    <input type="text" name="ja_description" class="form-control" id="ja_descriptions">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_currency_base" class="form-label">Currency Base (Japanese)</label>
                                    <input type="text" name="ja_currency_base" class="form-control" id="ja_currency_base">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_margin_currency" class="form-label">Margin Currency (Japanese)</label>
                                    <input type="text" name="ja_margin_currency" class="form-control" id="ja_margin_currency">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_contract_size" class="form-label">Contract Size (Japanese)</label>
                                    <input type="text" name="ja_contract_size" class="form-control" id="ja_contract_size">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_max_levarage" class="form-label">Max Leverage (Japanese)</label>
                                    <input type="text" name="ja_max_levarage" class="form-control" id="ja_max_levarage">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_max_volume_trade" class="form-label">Max Trade Size (Japanese)</label>
                                    <input type="text" name="ja_max_volume_trade" class="form-control" id="ja_max_volume_trade">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_min_volume_trade" class="form-label">Min Trade Size (Japanese)</label>
                                    <input type="text" name="ja_min_volume_trade" class="form-control" id="ja_min_volume_trade">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_long_swap" class="form-label">Long Swap(Japanese)</label>
                                    <input type="text" name="ja_long_swap" class="form-control" id="ja_long_swap">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_short_swap" class="form-label">Short Swap (Japanese)</label>
                                    <input type="text" name="ja_short_swap" class="form-control" id="ja_short_swap">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_holding_period" class="form-label">Holding Period (Japanese)</label>
                                    <input type="text" name="ja_holding_period" class="form-control" id="ja_holding_period">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_grant_date" class="form-label">Grant Date (Japanese)</label>
                                    <input type="text" name="ja_grant_date" class="form-control" id="ja_grant_date">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_trading_hours" class="form-label">Trading Hours (Japanese)</label>
                                    <input type="text" name="ja_trading_hours" class="form-control" id="ja_trading_hours">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-4">
                            <button type="button" class="btn btn-secondary forex_close" data-dismiss="modal">Close</button>
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

<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).on('click', '.forex_add', function() {
        $('#forex_form')[0].reset();
        $('#forex_id').attr("value", "");
        $('#forexModal').modal('show');
    });

    $(document).on('click', '.forex_close', function() {
        $('#forexModal').modal('hide');
        $('#forex_form')[0].reset();
        $('.invalid-feedback').html("");
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


    $(document).on('click', '.edit_forex', function() {
        id = $(this).attr('forex_id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('admin.get_forex') }}",
            type: 'POST',
            data: {
                'id': id
            },
            success: function(res) {
                console.log(res.description);
                if (res) {
                    $('#forexModal').modal('show');
                    $('#forex_id').val(res.id);
                    $('#symbol').val(res.symbol);
                    $('#ja_symbol').val(res.ja_symbol);
                    $('#descriptions').val(res.description);
                    $('#ja_descriptions').val(res.ja_description);
                    $('#currency_base').val(res.currency_base);
                    $('#ja_currency_base').val(res.ja_currency_base);
                    $('#margin_currency').val(res.margin_currency);
                    $('#ja_margin_currency').val(res.ja_margin_currency);
                    $('#contract_size').val(res.contract_size);
                    $('#ja_contract_size').val(res.ja_contract_size);
                    $('#max_levarage').val(res.max_levarage);
                    $('#ja_max_levarage').val(res.ja_max_levarage);
                    $('#min_volume_trade').val(res.min_volume_trade);
                    $('#ja_min_volume_trade').val(res.ja_min_volume_trade);
                    $('#max_volume_trade').val(res.max_volume_trade);
                    $('#ja_max_volume_trade').val(res.ja_max_volume_trade);
                    $('#long_swap').val(res.long_swap);
                    $('#ja_long_swap').val(res.ja_long_swap);
                    $('#short_swap').val(res.short_swap);
                    $('#ja_short_swap').val(res.ja_short_swap);
                    $('#holding_period').val(res.holding_period);
                    $('#ja_holding_period').val(res.ja_holding_period);
                    $('#grant_date').val(res.grant_date);
                    $('#ja_grant_date').val(res.ja_grant_date);
                    $('#trading_hours').val(res.trading_hours);
                    $('#ja_trading_hours').val(res.ja_trading_hours);
                }
            }
        });
    });

    $(document).on('click', '.delete_forex', function() {
        id = $(this).attr('forex_id');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('admin.delete_forex') }}",
            type: 'POST',
            data: {
                'id': id
            },
            success: function(res) {
                if (res) {
                    window.LaravelDataTables["forex-table"].draw();
                }
            }
        });
    });
    $(document).on('click', '.add_faq', function() {
        clone_div = $(".faq_section_row:first").clone();
        clone_div.find('.remove_faq').removeClass('d-none').addClass('d-block');
        clone_div.insertAfter(".faq_section_row:last");
        clone_div.find('.en_question, .ja_question, .ckeditor').val('');
        clone_div.find('.faq_id').remove();
        CKEDITOR.replaceAll($(this).find('.ckeditor'));
        change_name();
    });

    var remove_faq_ids = [];
    $(document).on('click', '.remove_faq', function() {
        $(this).parents('.faq_section_row').remove();
        remove_faq_ids.push($(this).parent().parent().parent().find('.faq_id').val());
        $('.faq_remove_ids').val(remove_faq_ids);
    });

    function change_name() {
        var n = 0;
        $(".faq_section_row").each(function() {
            //CKEDITOR.replaceAll('ckeditor');

            $(this).find('.faq_header').html("Question " + (n + 1));
            $(this).find('.en_question').attr('name', 'faq[' + n + '][en_question]');
            $(this).find('.ja_question').attr('name', 'faq[' + n + '][ja_question]');
            $(this).find('.en_answer').attr('name', 'faq[' + n + '][en_answer]');
            $(this).find('.ja_answer').attr('name', 'faq[' + n + '][ja_answer]');
            n++;
        });


        setTimeout(function() {
            $('.faq_section_row').find('.ckeditor').nextAll().not($('.faq_section_row').find('.ckeditor').next()).remove();
        }, 1000);
    }
</script>
@endpush