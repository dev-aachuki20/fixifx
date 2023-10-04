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
                    <form action="{{ route('admin.save_section', ['sec_no' => 2]) }}" method="post" enctype=multipart/form-data>
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

                        @for($i=1; $i<=4; $i++) @php $sub_section2=$section2->subSection[$i-1] ?? '' @endphp

                            @if($sub_section2)
                            <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" value="{{ $sub_section2->id }}">
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
                                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ isset($sub_section2) ? (($sub_section2->status == 1) ? 'checked' : '') : 'checked' }}>
                                            </div>

                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Count text (English)</label>
                                                        <input type="text" class="form-control" id="en_count_text" name="sub_section[{{$i}}][en_count_text]" value="{{ $sub_section2 ? $sub_section2->en_count_text : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Count text (Japanese)</label>
                                                        <input type="text" class="form-control" id="ja_count_text" name="sub_section[{{$i}}][ja_count_text]" value="{{ $sub_section2 ? $sub_section2->ja_count_text : '' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Short text (English)</label>
                                                        <input type="text" class="form-control" id="en_short_text" name="sub_section[{{$i}}][en_short_text]" value="{{ $sub_section2 ? $sub_section2->en_short_text : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Short text (Japanese)</label>
                                                        <input type="text" class="form-control" id="ja_short_text" name="sub_section[{{$i}}][ja_short_text]" value="{{ $sub_section2 ? $sub_section2->ja_short_text : '' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row gy-4 mt-1precious-metals">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (English)</label>
                                                        <input type="text" class="form-control" id="title" name="sub_section[{{$i}}][en_title]" value="{{ $sub_section2 ? $sub_section2->en_title : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (Japanese)</label>
                                                        <input type="text" class="form-control" id="ja_title" name="sub_section[{{$i}}][ja_title]" value="{{ $sub_section2 ? $sub_section2->ja_title : '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (English)</label>
                                                        <textarea name="sub_section[{{$i}}][en_desc]" class="form-control" cols="100" rows="5">{{ $sub_section2 ? $sub_section2->en_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (Japanese)</label>
                                                        <textarea name="sub_section[{{$i}}][ja_desc]" class="form-control" cols="100" rows="5">{{ $sub_section2 ? $sub_section2->ja_desc : '' }}</textarea>
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
                                                @if(isset($sub_section2->image) && $sub_section2->image)
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <img src="{{ $sub_section2->image }}" alt="" height="100px" loading="lazy" width="100px">
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
                    <form action="{{ route('admin.save_section', ['sec_no' => 3]) }}" method="post">
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
                        <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>
                    <div class="card mt-2">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary cfd_add" data-toggle="modal" data-target="#spreadModal">Add</button>
                        </div>
                        <div class="card-body">
                            {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap','style' => 'width: 100%']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cfdModal" tabindex="-1" role="dialog" aria-labelledby="spreadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="spreadModalLabel">Add Share & Bonds</h5>
                <button type="button" class="btn btn-primary cfd_close" data-dismiss="modal" aria-label="Close">
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
                        <form id="cfd_form" method="post" action="{{ route('admin.add_cfd') }}">
                            @csrf

                            <input type="hidden" name="cfd_id" id="cfd_id" value="">
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
                                        <label for="margin_currency" class="form-label">Margin Currency (English)</label>
                                        <input type="text" name="margin_currency" class="form-control" id="margin_currency">
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
                                        <label for="contract_size" class="form-label">Contract Size (English)</label>
                                        <input type="text" name="contract_size" class="form-control" id="contract_size">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="max_volume_trade" class="form-label">Max Trade Size (English)</label>
                                        <input type="text" name="max_volume_trade" class="form-control" id="max_volume_trade">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="min_volume_trade" class="form-label">Min Trade Size (English)</label>
                                        <input type="text" name="min_volume_trade" class="form-control" id="min_volume_trade">
                                        <span class="invalid-feedback d-block"></span>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="day_swap" class="form-label">Day Swap (English)</label>
                                        <input type="text" name="day_swap" class="form-control" id="day_swap">
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
                                    <label for="ja_type" class="form-label">Type (Japanese)</label>
                                    <input type="text" name="ja_type" class="form-control" id="ja_type">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_currency_base" class="form-label">Currency Base (Japanese)</label>
                                    <input type="text" name="ja_currency_base" class="form-control" id="ja_currency_base">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_margin_currency" class="form-label">Margin Currency (Japanese)</label>
                                    <input type="text" name="ja_margin_currency" class="form-control" id="ja_margin_currency">
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
                                    <label for="ja_contract_size" class="form-label">Contract Size (Japanese)</label>
                                    <input type="text" name="ja_contract_size" class="form-control" id="ja_contract_size">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_max_volume_trade" class="form-label">Max Trade Size (Japanese)</label>
                                    <input type="text" name="ja_max_volume_trade" class="form-control" id="ja_max_volume_trade">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_min_volume_trade" class="form-label">Min Trade Size (Japanese)</label>
                                    <input type="text" name="ja_min_volume_trade" class="form-control" id="ja_min_volume_trade">
                                    <span class="invalid-feedback d-block"></span>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="ja_day_swap" class="form-label">Day Swap (Japanese)</label>
                                    <input type="text" name="ja_day_swap" class="form-control" id="ja_day_swap">
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
                            <button type="button" class="btn btn-secondary cfd_close" data-dismiss="modal">Close</button>
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
<script type="text/javascript">
    $(document).on('click', '.cfd_add', function() {
        $('#cfd_form')[0].reset();
        $('#cfd_id').attr("value", "");
        $('#cfdModal').modal('show');
    });

    $(document).on('click', '.cfd_close', function() {
        $('#cfdModal').modal('hide');
        $('#cfd_form')[0].reset();
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


    $(document).on('click', '.edit_cfd', function() {
        id = $(this).attr('cfd_id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('admin.get_cfd') }}",
            type: 'POST',
            data: {
                'id': id
            },
            success: function(res) {
                if (res) {
                    $('#cfdModal').modal('show');
                    $('#cfd_id').val(res.id);
                    $('#symbol').val(res.symbol);
                    $('#ja_symbol').val(res.ja_symbol);
                    $('#descriptions').val(res.description);
                    $('#ja_descriptions').val(res.ja_description);
                    $('#type').val(res.type);
                    $('#ja_type').val(res.ja_type);
                    $('#currency_base').val(res.currency_base);
                    $('#ja_currency_base').val(res.ja_currency_base);
                    $('#margin_currency').val(res.margin_currency);
                    $('#ja_margin_currency').val(res.ja_margin_currency);
                    $('#max_levarage').val(res.max_levarage);
                    $('#ja_max_levarage').val(res.ja_max_levarage);
                    $('#contract_size').val(res.contract_size);
                    $('#ja_contract_size').val(res.ja_contract_size);
                    $('#max_volume_trade').val(res.max_volume_trade);
                    $('#ja_max_volume_trade').val(res.ja_max_volume_trade);
                    $('#min_volume_trade').val(res.min_volume_trade);
                    $('#ja_min_volume_trade').val(res.ja_min_volume_trade);
                    $('#day_swap').val(res.day_swap);
                    $('#ja_day_swap').val(res.ja_day_swap);
                    $('#trading_hours').val(res.trading_hours);
                    $('#ja_trading_hours').val(res.ja_trading_hours);
                }
            }
        });
    });

    $(document).on('click', '.delete_cfd', function() {
        id = $(this).attr('cfd_id');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('admin.delete_cfd') }}",
            type: 'POST',
            data: {
                'id': id
            },
            success: function(res) {
                if (res) {
                    window.LaravelDataTables["cfd-table"].draw();
                }
            }
        });
    });


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