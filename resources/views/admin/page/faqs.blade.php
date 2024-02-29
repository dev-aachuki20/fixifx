@extends('admin.layouts.master')

@section('title', $slug)

@section('content')

<div class="animated fadeIn">
    <!-- ----------- Header Section ------------------- -->
    @include('admin.common.header_section')

    <!-- SECTION 1 -->
    @include('admin.common.title_section')

    <!-- SECTION 2 -->
    @php
    $faq_sec_2 = isset($faqs[2]) ? $faqs[2] : [];
    isset($section) ? $section2 = $section->where('section_no', 2)->first() : ''
    @endphp
    <form action="{{ route('admin.save_multiple_section') }}" method="post">
        @csrf

        <input type="hidden" name="remove_faq_ids" class="faq_remove_ids" value="">

        <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec2">
            <div class="accordion-item">
                <h2 class="accordion-header" id="Sec2">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_2" aria-expanded="true" aria-controls="sec_2">
                        <i class="ri-global-line me-2"></i>Faq Section 2
                    </button>
                </h2>
                <div id="sec_2" class="accordion-collapse collapse" aria-labelledby="Sec2" data-bs-parent="#sec2">
                    <div class="accordion-body">
                        <input type="hidden" name="page_id" value="{{$page_id}}">
                        <input type="hidden" name="section_no" class="sec_no" value="2">

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

                        @if($faq_sec_2->count())
                        @foreach($faq_sec_2 as $k2 => $faq2)

                        <div class="faq_section_row">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                    <button type="button" class="btn btn-danger remove_faq m-1 {{$k2 > 0 ? '' : 'd-none'}}"><i class="ri-subtract-fill"></i></button>
                                </div>
                            </div>

                            <input type="hidden" class="faq_id" name="faq[{{$k2}}][faq_id]" value="{{$faq2->id}}">

                            <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box" id="sub2_section{{$k2}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="Sub2_section_{{$k2}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub2_section_{{$k2}}" aria-expanded="false" aria-controls="sub2_section_{{$k2}}">
                                            <i class="ri-global-line me-2"></i> <span class="acc_header">Question {{ $k2+1 }}</span>
                                        </button>
                                    </h2>
                                    <div id="sub2_section_{{$k2}}" class="accordion-collapse collapse" aria-labelledby="sub2_section_{{$k2}}" data-bs-parent="#sub2_section{{$k2}}">
                                        <div class="accordion-body">
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Question (English)</label>
                                                        <input type="text" class="form-control en_question" name="faq[{{$k2}}][en_question]" value="{{ $faq2->en_question }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Question (Japanese)</label>
                                                        <input type="text" class="form-control ja_question" name="faq[{{$k2}}][ja_question]" value="{{ $faq2->ja_question }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Answer (English)</label>
                                                        <textarea name="faq[{{$k2}}][en_answer]" class="ckeditor en_answer" cols="100" rows="7">{{ $faq2->en_answer }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Answer (Japanese)</label>
                                                        <textarea name="faq[{{$k2}}][ja_answer]" class="ckeditor ja_answer" cols="100" rows="7">{{ $faq2->ja_answer }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="faq_section_row">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                    <button type="button" class="btn btn-danger remove_faq m-1 d-none"><i class="ri-subtract-fill"></i></button>
                                </div>
                            </div>

                            <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sub_section0">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="sub_section0">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#Sub_section_0" aria-expanded="true" aria-controls="Sub_section_0">
                                            <i class="ri-global-line me-2"></i><span class="acc_header">Question 1</span>
                                        </button>
                                    </h2>
                                    <div id="Sub_section_0" class="accordion-collapse collapse" aria-labelledby="sub_section0" data-bs-parent="#sub_section0">
                                        <div class="accordion-body">
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (English)</label>
                                                        <input type="text" class="form-control en_question" name="faq[0][en_question]" value="{{ old('en_title', isset($section2) ? $section2->en_title : '') }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (Japanese)</label>
                                                        <input type="text" class="form-control ja_question" name="faq[0][ja_question]" value="{{ old('ja_title', isset($section2) ? $section2->ja_title : '') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (English)</label>
                                                        <textarea name="faq[0][en_answer]" class="ckeditor_custom en_answer" cols="100" rows="7"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (Japanese)</label>
                                                        <textarea name="faq[0][ja_answer]" class="ckeditor_custom ja_answer" cols="100" rows="7"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <input type="submit" value="Save" id="common_save" class="btn btn-primary my-4">
                    </div>
                </div>

            </div>
        </div>
    </form>

    <!-- SECTION 3 -->
    @php
    $faq_sec_3 = isset($faqs[3]) ? $faqs[3] : [];
    isset($section) ? $section3 = $section->where('section_no', 3)->first() : ''
    @endphp
    <form action="{{ route('admin.save_multiple_section') }}" method="post">
        @csrf

        <input type="hidden" name="remove_faq_ids" class="faq_remove_ids" value="">

        <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec3">
            <div class="accordion-item">
                <h2 class="accordion-header" id="Sec3">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_3" aria-expanded="true" aria-controls="sec_3">
                        <i class="ri-global-line me-2"></i>Faq Section 3
                    </button>
                </h2>
                <div id="sec_3" class="accordion-collapse collapse" aria-labelledby="Sec3" data-bs-parent="#sec3">
                    <div class="accordion-body">
                        <input type="hidden" name="page_id" value="{{$page_id}}">
                        <input type="hidden" name="section_no" class="sec_no" value="3">

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
                        @if(count($faq_sec_3))
                        @foreach($faq_sec_3 as $k3 => $faq3)
                        <div class="faq_section_row">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                    <button type="button" class="btn btn-danger remove_faq m-1 {{$k3 > 0 ? '' : 'd-none' }}"><i class="ri-subtract-fill"></i></button>
                                </div>
                            </div>

                            <input type="hidden" class="faq_id" name="faq[{{$k3}}][faq_id]" value="{{$faq3->id}}">

                            <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box" id="sub3_section{{$k3}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="Sub3_section_{{$k3}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub3_section_{{$k3}}" aria-expanded="false" aria-controls="sub3_section_{{$k3}}">
                                            <i class="ri-global-line me-2"></i> <span class="acc_header">Question {{ $k3+1 }}</span>
                                        </button>
                                    </h2>
                                    <div id="sub3_section_{{$k3}}" class="accordion-collapse collapse" aria-labelledby="sub3_section_{{$k3}}" data-bs-parent="#sub3_section{{$k3}}">
                                        <div class="accordion-body">
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Question (English)</label>
                                                        <input type="text" class="form-control en_question" name="faq[{{$k3}}][en_question]" value="{{ $faq3->en_question }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Question (Japanese)</label>
                                                        <input type="text" class="form-control ja_question" name="faq[{{$k3}}][ja_question]" value="{{ $faq3->ja_question }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Answer (English)</label>
                                                        <textarea name="faq[{{$k3}}][en_answer]" class="ckeditor en_answer" cols="100" rows="7">{{ $faq3->en_answer }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Answer (Japanese)</label>
                                                        <textarea name="faq[{{$k3}}][ja_answer]" class="ckeditor ja_answer" cols="100" rows="7">{{ $faq3->ja_answer }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="faq_section_row">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                    <button type="button" class="btn btn-danger remove_faq m-1 d-none"><i class="ri-subtract-fill"></i></button>
                                </div>
                            </div>

                            <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sub_section0">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="sub_section0">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#Sub_section_0" aria-expanded="true" aria-controls="Sub_section_0">
                                            <i class="ri-global-line me-2"></i><span class="acc_header">Question 1</span>
                                        </button>
                                    </h2>
                                    <div id="Sub_section_0" class="accordion-collapse collapse" aria-labelledby="sub_section0" data-bs-parent="#sub_section0">
                                        <div class="accordion-body">
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (English)</label>
                                                        <input type="text" class="form-control en_question" name="faq[0][en_question]" value="{{ old('en_title', isset($section3) ? $section3->en_title : '') }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (Japanese)</label>
                                                        <input type="text" class="form-control ja_question" name="faq[0][ja_question]" value="{{ old('ja_title', isset($section3) ? $section3->ja_title : '') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (English)</label>
                                                        <textarea name="faq[0][en_answer]"  class="en_answer ckeditor_custom" cols="100" rows="7"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (Japanese)</label>
                                                        <textarea name="faq[0][ja_answer]" class="ja_answer ckeditor_custom" cols="100" rows="7"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <input type="submit" value="Save" id="common_save" class="btn btn-primary my-4">
                    </div>
                </div>

            </div>
        </div>
    </form>

    <!-- SECTION 4 -->
    @php
    $faq_sec_4 = isset($faqs[4]) ? $faqs[4] : [];
    isset($section) ? $section4 = $section->where('section_no', 4)->first() : ''
    @endphp
    <form action="{{ route('admin.save_multiple_section') }}" method="post">
        @csrf

        <input type="hidden" name="remove_faq_ids" class="faq_remove_ids" value="">

        <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec4">
            <div class="accordion-item">
                <h2 class="accordion-header" id="Sec4">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_4" aria-expanded="true" aria-controls="sec_4">
                        <i class="ri-global-line me-2"></i>Faq Section 4
                    </button>
                </h2>
                <div id="sec_4" class="accordion-collapse collapse" aria-labelledby="Sec4" data-bs-parent="#sec4">
                    <div class="accordion-body">
                        <input type="hidden" name="page_id" value="{{$page_id}}">
                        <input type="hidden" name="section_no" class="sec_no" value="4">

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
                        @if(count($faq_sec_4))
                        @foreach($faq_sec_4 as $k4 => $faq4)
                        <div class="faq_section_row">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                    <button type="button" class="btn btn-danger remove_faq m-1 {{$k4 > 0 ? '' : 'd-none' }}"><i class="ri-subtract-fill"></i></button>
                                </div>
                            </div>

                            <input type="hidden" class="faq_id" name="faq[{{$k4}}][faq_id]" value="{{$faq4->id}}">
                            <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box" id="sub4_section{{$k4}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="Sub4_section_{{$k4}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub4_section_{{$k4}}" aria-expanded="false" aria-controls="sub4_section_{{$k4}}">
                                            <i class="ri-global-line me-2"></i> <span class="acc_header">Question {{ $k4+1 }}</span>
                                        </button>
                                    </h2>
                                    <div id="sub4_section_{{$k4}}" class="accordion-collapse collapse" aria-labelledby="sub4_section_{{$k4}}" data-bs-parent="#sub4_section{{$k4}}">
                                        <div class="accordion-body">
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Question (English)</label>
                                                        <input type="text" class="form-control en_question" name="faq[{{$k4}}][en_question]" value="{{ $faq4->en_question }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Question (Japanese)</label>
                                                        <input type="text" class="form-control ja_question" name="faq[{{$k4}}][ja_question]" value="{{ $faq4->ja_question }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Answer (English)</label>
                                                        <textarea name="faq[{{$k4}}][en_answer]" class="ckeditor en_answer" cols="100" rows="7">{{ $faq4->en_answer }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Answer (Japanese)</label>
                                                        <textarea name="faq[{{$k4}}][ja_answer]" class="ckeditor ja_answer" cols="100" rows="7">{{ $faq4->ja_answer }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="faq_section_row">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                    <button type="button" class="btn btn-danger remove_faq m-1 d-none"><i class="ri-subtract-fill"></i></button>
                                </div>
                            </div>

                            <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sub_section0">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="sub_section0">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#Sub_section_0" aria-expanded="true" aria-controls="Sub_section_0">
                                            <i class="ri-global-line me-2"></i><span class="acc_header">Question 1</span>
                                        </button>
                                    </h2>
                                    <div id="Sub_section_0" class="accordion-collapse collapse" aria-labelledby="sub_section0" data-bs-parent="#sub_section0">
                                        <div class="accordion-body">
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (English)</label>
                                                        <input type="text" class="form-control en_question" name="faq[0][en_question]" value="{{ old('en_title', isset($section4) ? $section4->en_title : '') }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (Japanese)</label>
                                                        <input type="text" class="form-control ja_question" name="faq[0][ja_question]" value="{{ old('ja_title', isset($section4) ? $section4->ja_title : '') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (English)</label>
                                                        <textarea name="faq[0][en_answer]" class="ckeditor_custom en_answer" cols="100" rows="7"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (Japanese)</label>
                                                        <textarea name="faq[0][ja_answer]" class="ckeditor_custom ja_answer" cols="100" rows="7"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <input type="submit" value="Save" id="common_save" class="btn btn-primary my-4">
                    </div>
                </div>

            </div>
        </div>
    </form>

    <!-- SECTION 5 -->
    @php
    $faq_sec_5 = isset($faqs[5]) ? $faqs[5] : [];
    isset($section) ? $section5 = $section->where('section_no', 5)->first() : ''
    @endphp
    <form action="{{ route('admin.save_multiple_section') }}" method="post">
        @csrf

        <input type="hidden" name="remove_faq_ids" class="faq_remove_ids" value="">

        <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec5">
            <div class="accordion-item">
                <h2 class="accordion-header" id="Sec5">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_5" aria-expanded="true" aria-controls="sec_5">
                        <i class="ri-global-line me-2"></i>Faq Section 5
                    </button>
                </h2>
                <div id="sec_5" class="accordion-collapse collapse" aria-labelledby="Sec5" data-bs-parent="#sec5">
                    <div class="accordion-body">
                        <input type="hidden" name="page_id" value="{{$page_id}}">
                        <input type="hidden" name="section_no" class="sec_no" value="5">

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
                        @if(count($faq_sec_5))
                        @foreach($faq_sec_5 as $k5 => $faq5)
                        <div class="faq_section_row">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                    <button type="button" class="btn btn-danger remove_faq m-1 {{$k5 > 0 ? '' : 'd-none' }}"><i class="ri-subtract-fill"></i></button>
                                </div>
                            </div>

                            <input type="hidden" class="faq_id" name="faq[{{$k5}}][faq_id]" value="{{$faq5->id}}">

                            <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box" id="sub5_section{{$k5}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="Sub5_section_{{$k5}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub5_section_{{$k5}}" aria-expanded="false" aria-controls="sub5_section_{{$k5}}">
                                            <i class="ri-global-line me-2"></i> <span class="acc_header">Question {{ $k5+1 }}</span>
                                        </button>
                                    </h2>
                                    <div id="sub5_section_{{$k5}}" class="accordion-collapse collapse" aria-labelledby="sub5_section_{{$k5}}" data-bs-parent="#sub5_section{{$k5}}">
                                        <div class="accordion-body">
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Question (English)</label>
                                                        <input type="text" class="form-control en_question" name="faq[{{$k5}}][en_question]" value="{{ $faq5->en_question }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Question (Japanese)</label>
                                                        <input type="text" class="form-control ja_question" name="faq[{{$k5}}][ja_question]" value="{{ $faq5->ja_question }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Answer (English)</label>
                                                        <textarea name="faq[{{$k5}}][en_answer]" class="ckeditor en_answer" cols="100" rows="7">{{ $faq5->en_answer }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Answer (Japanese)</label>
                                                        <textarea name="faq[{{$k5}}][ja_answer]" class="ckeditor ja_answer" cols="100" rows="7">{{ $faq5->ja_answer }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="faq_section_row">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                    <button type="button" class="btn btn-danger remove_faq m-1 d-none"><i class="ri-subtract-fill"></i></button>
                                </div>
                            </div>

                            <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sub_section0">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="sub_section0">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#Sub_section_0" aria-expanded="true" aria-controls="Sub_section_0">
                                            <i class="ri-global-line me-2"></i><span class="acc_header">Question 1</span>
                                        </button>
                                    </h2>
                                    <div id="Sub_section_0" class="accordion-collapse collapse" aria-labelledby="sub_section0" data-bs-parent="#sub_section0">
                                        <div class="accordion-body">
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (English)</label>
                                                        <input type="text" class="form-control en_question" name="faq[0][en_question]" value="{{ old('en_title', isset($section4) ? $section4->en_title : '') }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (Japanese)</label>
                                                        <input type="text" class="form-control ja_question" name="faq[0][ja_question]" value="{{ old('ja_title', isset($section4) ? $section4->ja_title : '') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (English)</label>
                                                        <textarea name="faq[0][en_answer]" class="ckeditor_custom en_answer" cols="100" rows="7"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (Japanese)</label>
                                                        <textarea name="faq[0][ja_answer]" class="ckeditor_custom ja_answer" cols="100" rows="7"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <input type="submit" value="Save" id="common_save" class="btn btn-primary my-4">
                    </div>
                </div>

            </div>
        </div>
    </form>

    <!-- SECTION 6 -->
    @php
    $faq_sec_6 = isset($faqs[6]) ? $faqs[6] : [];
    isset($section) ? $section6 = $section->where('section_no', 6)->first() : ''
    @endphp
    <form action="{{ route('admin.save_multiple_section') }}" method="post">
        @csrf

        <input type="hidden" name="remove_faq_ids" class="faq_remove_ids" value="">

        <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec6">
            <div class="accordion-item">
                <h2 class="accordion-header" id="Sec6">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_6" aria-expanded="true" aria-controls="sec_6">
                        <i class="ri-global-line me-2"></i>Faq Section 6
                    </button>
                </h2>
                <div id="sec_6" class="accordion-collapse collapse" aria-labelledby="Sec6" data-bs-parent="#sec6">
                    <div class="accordion-body">
                        <input type="hidden" name="page_id" value="{{$page_id}}">
                        <input type="hidden" name="section_no" class="sec_no" value="6">

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
                        @if(count($faq_sec_6))
                        @foreach($faq_sec_6 as $k6 => $faq6)
                        <div class="faq_section_row">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                    <button type="button" class="btn btn-danger remove_faq m-1 {{$k6 > 0 ? '' : 'd-none' }}"><i class="ri-subtract-fill"></i></button>
                                </div>
                            </div>

                            <input type="hidden" class="faq_id" name="faq[{{$k6}}][faq_id]" value="{{$faq6->id}}">

                            <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box" id="sub6_section{{$k6}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="Sub6_section_{{$k6}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub6_section_{{$k6}}" aria-expanded="false" aria-controls="sub6_section_{{$k6}}">
                                            <i class="ri-global-line me-2"></i> <span class="acc_header">Question {{ $k6+1 }}</span>
                                        </button>
                                    </h2>
                                    <div id="sub6_section_{{$k6}}" class="accordion-collapse collapse" aria-labelledby="sub6_section_{{$k6}}" data-bs-parent="#sub6_section{{$k6}}">
                                        <div class="accordion-body">
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Question (English)</label>
                                                        <input type="text" class="form-control en_question" name="faq[{{$k6}}][en_question]" value="{{ $faq6->en_question }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Question (Japanese)</label>
                                                        <input type="text" class="form-control ja_question" name="faq[{{$k6}}][ja_question]" value="{{ $faq6->ja_question }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Answer (English)</label>
                                                        <textarea name="faq[{{$k6}}][en_answer]" class="ckeditor en_answer" cols="100" rows="7">{{ $faq6->en_answer }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Answer (Japanese)</label>
                                                        <textarea name="faq[{{$k6}}][ja_answer]" class="ckeditor ja_answer" cols="100" rows="7">{{ $faq6->ja_answer }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="faq_section_row">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                    <button type="button" class="btn btn-danger remove_faq m-1 d-none"><i class="ri-subtract-fill"></i></button>
                                </div>
                            </div>

                            <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sub_section0">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="sub_section0">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#Sub_section_0" aria-expanded="true" aria-controls="Sub_section_0">
                                            <i class="ri-global-line me-2"></i><span class="acc_header">Question 1</span>change_name
                                        </button>
                                    </h2>
                                    <div id="Sub_section_0" class="accordion-collapse collapse" aria-labelledby="sub_section0" data-bs-parent="#sub_section0">
                                        <div class="accordion-body">
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (English)</label>
                                                        <input type="text" class="form-control en_question" name="faq[0][en_question]" value="{{ old('en_title', isset($section4) ? $section4->en_title : '') }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (Japanese)</label>
                                                        <input type="text" class="form-control ja_question" name="faq[0][ja_question]" value="{{ old('ja_title', isset($section4) ? $section4->ja_title : '') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (English)</label>
                                                        <textarea name="faq[0][en_answer]" class="ckeditor en_answer" cols="100" rows="7"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (Japanese)</label>
                                                        <textarea name="faq[0][ja_answer]" class="ckeditor ja_answer" cols="100" rows="7"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <input type="submit" value="Save" id="common_save" class="btn btn-primary my-4">
                    </div>
                </div>

            </div>
        </div>
    </form>

</div>

@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>

<script>
    $(document).on('click', '.add_faq', function() {
        clone_div = $(this).parents('form').find(".faq_section_row:first").clone();
        clone_div.find('.remove_faq').removeClass('d-none');
        clone_div.insertAfter($(this).parents('form').find(".faq_section_row:last"));
        clone_div.find('.faq_id').remove();
        clone_div.find('.en_question, .ja_question, .en_answer, .ja_answer').val('');
        change_name($(this));
    });

    $(document).on('click', '.remove_faq', function() {
        $(this).parent().parent().parent().remove();
    });

    function change_name(this_var) {
        var n = 0;
        this_var.parents('form').find(".faq_section_row").each(function() {
            CKEDITOR.replaceAll('ckeditor');
            $(this).find('.accordion').attr('id', 'sub_section' + n)
            $(this).find('.accordion-header').attr('id', 'Sub_section_' + n)
            $(this).find('.accordion-button').attr('data-bs-target', '#sub_section_' + n).attr('aria-controls', 'sub_section_' + n)
            $(this).find('.accordion-collapse').attr('id', 'sub_section_' + n).attr('data-bs-parent', '#sub_section' + n).attr('aria-labelledby', 'sub_section_' + n)

            $(this).find('.acc_header').html('Question ' + (n + 1));

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

    var remove_faq_ids = [];
    $(document).on('click', '.remove_faq', function() {
        $(this).parents('.faq_section_row').remove();
        remove_faq_ids.push($(this).parent().parent().parent().find('.faq_id').val());
        $('.faq_remove_ids').val(remove_faq_ids);
    });
   

</script>
@endpush