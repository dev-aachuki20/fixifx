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



                        <div class="row">

                            <div class="row mt-4 m-2">

                                <div class="col-3"><label for="title" class="form-label">Title (English)</label></div>

                                <div class="col-3"><label for="title" class="form-label">Title (Japanese)</label></div>

                                <div class="col-3"><label for="title" class="form-label">Value</label></div>

                                <div class="col-3"><button type="button" class="btn btn-primary add_contact" title="add contact details"><i class="ri-add-fill"></i></button></div>

                            </div>



                            <input type="hidden" name="contact_remove_ids" class="contact_remove_ids">

                            @if(count($contact_data))

                            @foreach($contact_data as $k => $contact)

                            <div class="contact_row">

                                <div class="row my-2">

                                    <input type="hidden" name="contact[{{$k}}][contact_id]" class="contact_id" value="{{$contact->id}}">

                                    <div class="col-3"><input type="text" class="form-control en_title" name="contact[{{$k}}][en_title]" value="{{$contact->en_title}}"></div>

                                    <div class="col-3"><input type="text" class="form-control ja_title" name="contact[{{$k}}][ja_title]" value="{{$contact->ja_title}}"></div>

                                    <div class="col-3"><input type="text" class="form-control contact_value" name="contact[{{$k}}][value]" value="{{$contact->value}}"></div>

                                    <div class="col-3"><button type="button" class="btn btn-danger remove_contact mx-1 {{ ($k > 0) ? '' : 'd-none' }}" title="remove contact detils">&times;</button></div>

                                </div>

                            </div>

                            @endforeach

                            @else

                            <div class="contact_row">

                                <div class="row my-2">

                                    <div class="col-3"><input type="text" class="form-control en_title" name="contact[0][en_title]" value=""></div>

                                    <div class="col-3"><input type="text" class="form-control ja_title" name="contact[0][ja_title]" value=""></div>

                                    <div class="col-3"><input type="text" class="form-control contact_value" name="contact[0][value]" value=""></div>

                                    <div class="col-3"><button type="button" class="btn btn-danger d-none remove_contact mx-1" title="remove contact detils">&times;</button></div>

                                </div>

                            </div>

                            @endif

                        </div>



                        <input type="submit" value="Save" class="btn btn-primary my-4">

                    </form>

                </div>

            </div>

        </div>

    </div>

    <!-- section 3  contact and country -->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec3">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec3">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_3" aria-expanded="true" aria-controls="sec_3">
                    <i class="ri-global-line me-2"></i>Country details
                </button>
            </h2>
            <div id="sec_3" class="accordion-collapse collapse" aria-labelledby="Sec3" data-bs-parent="#sec3">
                <div class="accordion-body">
                    @php isset($section) ? $section3 = $section->where('section_no', 3)->first() : '' @endphp
                    <form action="{{ route('admin.save_section', ['sec_no' => 3]) }}" method="post" enctype="multipart/form-data">
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

                        <div class="row gy-2">
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
                        <div class="row mt-2">
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
                        <!-- subsection -->
                        @for($i=1; $i<=4; $i++) @php $sub_section3=$section3->subSection[$i-1] ?? false;
                            @endphp

                            @if($sub_section3)
                            <input type="hidden" name="sub_section[{{$i}}][sub_section_id]" value="{{ $sub_section3->id }}">
                            @endif

                            <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3" id="sub_sec_{{$i}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="sub_sec_{{$i}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_sec{{$i}}" aria-expanded="false" aria-controls="sub_sec{{$i}}">
                                            <i class="ri-global-line me-2"></i> {{ $sub_section3 ? $sub_section3->en_title : 'Sub Section ' . $i }}
                                        </button>
                                    </h2>
                                    <div id="sub_sec{{$i}}" class="accordion-collapse collapse" aria-labelledby="sub_sec_{{$i}}" data-bs-parent="#sub_sec_{{$i}}">
                                        <div class="accordion-body">

                                            <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                                <label for="dropdown-base-example" class="form-label text-muted">Status</label>
                                                <input class="form-check-input code-switcher" type="checkbox" id="dropdown-base-example" name="sub_section[{{$i}}][status]" {{ isset($sub_section3) && $sub_section3 ? (($sub_section3->status == 1) ? 'checked' : '') : 'checked' }}>
                                            </div>

                                            <div class="row">
                                                <div class="col-xxl-6 col-md-6 mb-3">
                                                    <label for="title" class="form-label mx-2">Image</label>
                                                    <div class="s-preview-img my-product-img">
                                                        @if(isset($sub_section3) && is_object($sub_section3) && $sub_section3->image)
                                                        <input type="hidden" name="sub_section[{{$i}}][image_old]" value="{{$sub_section3->image}}">
                                                        @endif
                                                        <input type="file" name="sub_section[{{$i}}][image]" class="form-control custom_img">
                                                        <img src="{{ isset($sub_section3->image) ? $sub_section3->image : '' }}" class="img-fluid" id="main_image_{{$i}}" alt="" loading="lazy" />
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
                                                        <label for="title" class="form-label">Office Name (English)</label>
                                                        <input type="text" class="form-control" id="title" name="sub_section[{{$i}}][en_title]" value="{{ $sub_section3 ? $sub_section3->en_title : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Office Name (Japanese)</label>
                                                        <input type="text" class="form-control" id="ja_title" name="sub_section[{{$i}}][ja_title]" value="{{ $sub_section3 ? $sub_section3->ja_title : '' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row gy-4 my-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Email (English)</label>
                                                        <input type="text" class="form-control" id="en_short_text" name="sub_section[{{$i}}][en_short_text]" value="{{ $sub_section3 ? $sub_section3->en_short_text : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Email (Japanese)</label>
                                                        <input type="text" class="form-control" id="ja_short_text" name="sub_section[{{$i}}][ja_short_text]" value="{{ $sub_section3 ? $sub_section3->ja_short_text : '' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="dec" class="form-label">Office Address (English)</label>
                                                        <textarea name="sub_section[{{$i}}][en_desc]" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', isset($sub_section3) ? $sub_section3->en_desc : '') }}</textarea>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="dec" class="form-label">Office Address (Japanese)</label>
                                                        <textarea name="sub_section[{{$i}}][ja_desc]" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_desc', isset($sub_section3) ? $sub_section3->ja_desc : '') }}</textarea>
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

<script>
    $(document).on('click', '.add_contact', function() {

        clone_div = $(".contact_row:first").clone();

        clone_div.find('.remove_contact').removeClass('d-none').addClass('d-block');

        clone_div.insertAfter(".contact_row:last");

        clone_div.find('.contact_id').remove();

        clone_div.find('.en_title, .ja_title, .contact_value').val('');

        change_name();

    });



    function change_name() {

        var n = 0;

        $(".contact_row").each(function() {

            $(this).find('.contact_id').attr('name', 'contact[' + n + '][contact_id]');

            $(this).find('.en_title').attr('name', 'contact[' + n + '][en_title]');

            $(this).find('.ja_title').attr('name', 'contact[' + n + '][ja_title]');

            $(this).find('.contact_value').attr('name', 'contact[' + n + '][value]');



            n++;

        });

    }



    var remove_contact_ids = [];

    $(document).on('click', '.remove_contact', function() {

        $(this).parent().parent().remove();

        remove_contact_ids.push($(this).parent().parent().find('.contact_id').val());

        $('.contact_remove_ids').val(remove_contact_ids);

    });
</script>

@endpush