@extends('admin.layouts.master')

@section('title', $slug)

@section('content')

<div class="animated fadeIn">
    <!-- ----------- Header Section ------------------- -->
    @include('admin.common.header_section')

    <!-- SECTION 1 -->
    @include('admin.common.title_section')

    <!-- SECTION 2 -->
    <form action="{{ route('admin.save_payment_type') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec2">
            <div class="accordion-item">
                <h2 class="accordion-header" id="Sec2">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_2" aria-expanded="true" aria-controls="sec_2">
                        <i class="ri-global-line me-2"></i>Payment Types
                    </button>
                </h2>
                <div id="sec_2" class="accordion-collapse collapse" aria-labelledby="Sec2" data-bs-parent="#sec2">
                    <div class="accordion-body">
                        <input type="hidden" name="page_id" value="{{$page_id}}">

                        <input type="hidden" name="remove_payment_id" id="remove_payment_id" value="">

                        @if(count($payments))
                        @foreach($payments as $k => $payment)
                        <div class="faq_section_row my-3">
                            <div class="row my-2">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary add_faq"><i class="ri-add-fill"></i></button>
                                    <button type="button" class="btn btn-danger remove_faq {{$k > 0 ? '' : 'd-none'}}"><i class="ri-subtract-fill"></i></button>
                                </div>
                            </div>

                            <input type="hidden" name="section[{{$k}}][payment_id]" class="payment_id" value="{{ $payment->id }}">

                            <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box" id="sub_section{{$k}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="Sub_section_{{$k}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_section_{{$k}}" aria-expanded="false" aria-controls="sub_section_{{$k}}">
                                            <i class="ri-global-line me-2"></i> <span class="acc_header">{{ isset($payment) ? $payment->payment_name : 'Payment Section '.($k+1) }}</span>
                                        </button>
                                    </h2>
                                    <div id="sub_section_{{$k}}" class="accordion-collapse collapse" aria-labelledby="sub_section_{{$k}}" data-bs-parent="#sub_section{{$k}}">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                                        <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                                        <input class="form-check-input code-switcher payment_status" type="checkbox" id="customSwitchsizelg" name="section[{{$k}}][status]" {{ isset($payment) ? (($payment->status == 1) ? 'checked' : '') : 'checked' }}>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Payment Type (English)</label>
                                                        <input type="text" class="form-control payment_name" name="section[{{$k}}][payment_name]" value="{{ isset($payment) ? $payment->payment_name : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Payment Type (Japanese)</label>
                                                        <input type="text" class="form-control ja_payment_name" name="section[{{$k}}][ja_payment_name]" value="{{ isset($payment) ? $payment->ja_payment_name : '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">

                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Payment link</label>
                                                        <input type="text" class="form-control payment_link" name="section[{{$k}}][payment_link]" value="{{ isset($payment) ? $payment->payment_link : '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (English)</label>
                                                        <textarea name="section[{{$k}}][en_desc]" class="ckeditor en_desc" cols="100" rows="5">{{ isset($payment) ? $payment->en_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (Japanese)</label>
                                                        <textarea name="section[{{$k}}][ja_desc]" class="ckeditor ja_desc" cols="100" rows="5">{{ isset($payment) ? $payment->ja_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Payment Logo</label>
                                                        <input type="file" class="form-control payment_logo" name="section[{{$k}}][logo]">
                                                    </div>
                                                </div>
                                                @if(isset($payment) && $payment->logo)
                                                <div class="col-xxl-6 col-md-6 imageDiv">
                                                    <img src="{{ $payment->logo }}" alt="" loading="lazy" width="100px" height="100px">
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
                        @else
                        <div class="faq_section_row">
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                    <button type="button" class="btn btn-danger remove_faq m-1 d-none"><i class="ri-subtract-fill"></i></button>
                                </div>
                            </div>

                            <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3" id="sub_section3">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="Sub_section_3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_section_3" aria-expanded="false" aria-controls="sub_section_3">
                                            <i class="ri-global-line me-2"></i> Payment Section
                                        </button>
                                    </h2>
                                    <div id="sub_section_3" class="accordion-collapse collapse" aria-labelledby="sub_section_3" data-bs-parent="#sub_section3">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                                        <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                                        <input class="form-check-input code-switcher payment_status" type="checkbox" id="customSwitchsizelg" name="section[0][status]" checked="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Payment Type(English)</label>
                                                        <input type="text" class="form-control payment_name" name="section[0][payment_name]" value="">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Payment Type (Japanese)</label>
                                                        <input type="text" class="form-control ja_payment_name" name="section[0][ja_payment_name]" value="">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Payment link</label>
                                                        <input type="text" class="form-control payment_link" name="section[0][payment_link]">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (English)</label>
                                                        <textarea name="section[0][en_desc]" class="ckeditor en_desc" cols="100" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (Japanese)</label>
                                                        <textarea name="section[0][ja_desc]" class="ckeditor ja_desc" cols="100" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Payment Logo</label>
                                                        <input type="file" class="form-control payment_logo" name="section[0][logo]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <input type="submit" value="Save" id="common_save" class="btn btn-primary m-4">
                    </div>
                </div>

            </div>
        </div>
    </form>

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
</div>

@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>

<script type="text/javascript">
    $(document).on('click', '.add_faq', function() {
        clone_div = $(".faq_section_row:first").clone();
        clone_div.find('.remove_faq').removeClass('d-none');
        clone_div.find('.payment_name, .ja_payment_name, .payment_link, .ckeditor').val('');
        clone_div.find('.imageDiv').hide();
        clone_div.find('.payment_status').prop('checked', false);
        clone_div.insertAfter(".faq_section_row:last");
        change_name();
    });

    var remove_payment_ids = [];
    $(document).on('click', '.remove_faq', function() {
        $(this).parent().parent().parent().remove();
        remove_payment_ids.push($(this).parents('.faq_section_row').find('.payment_id').val());
        $('#remove_payment_id').val(remove_payment_ids);
    });

    function change_name() {
        n = 0
        $(".faq_section_row").each(function() {
            CKEDITOR.replaceAll('ckeditor');

            $(this).find('.accordion').attr('id', 'sub_section' + n)
            $(this).find('.accordion-header').attr('id', 'Sub_section_' + n)
            $(this).find('.accordion-button').attr('data-bs-target', '#sub_section_' + n).attr('aria-controls', 'sub_section_' + n)
            $(this).find('.accordion-collapse').attr('id', 'sub_section_' + n).attr('data-bs-parent', '#sub_section' + n).attr('aria-labelledby', 'sub_section_' + n)
            $(this).find('form').attr('action', '{{ url("PrexSecureCpanel/save_section") }}/' + n);
            $(this).find('.acc_header').html('Payment Type ' + (n + 1));

            $(this).find('.payment_name').attr('name', 'section[' + n + '][payment_name]');
            $(this).find('.ja_payment_name').attr('name', 'section[' + n + '][ja_payment_name]');
            $(this).find('.payment_link').attr('name', 'section[' + n + '][payment_link]');
            $(this).find('.en_desc').attr('name', 'section[' + n + '][en_desc]');
            $(this).find('.ja_desc').attr('name', 'section[' + n + '][ja_desc]');
            $(this).find('.payment_logo').attr('name', 'section[' + n + '][payment_logo]');
            $(this).find('.payment_status').attr('name', 'section[' + n + '][status]');

            n++;
        });

        setTimeout(function() {
            $('.faq_section_row').find('.ckeditor').nextAll().not($('.faq_section_row').find('.ckeditor').next()).remove();
        }, 100);
    }
</script>
@endpush