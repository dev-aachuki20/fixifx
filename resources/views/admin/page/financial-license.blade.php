@extends('admin.layouts.master')

@section('title', $slug)

@section('content')

<div class="animated fadeIn">
    <!-- ----------- Header Section ------------------- -->
    @include('admin.common.header_section')

    <!-- SECTION 1 -->
    @include('admin.common.title_section')

    <!-- SUB SECTIONs -->
    <form action="{{ route('admin.save_multiple_section') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec2">
            <div class="accordion-item">
                <h2 class="accordion-header" id="Sec2">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_2" aria-expanded="true" aria-controls="sec_2">
                        <i class="ri-global-line me-2"></i>Section 2
                    </button>
                </h2>
                <div id="sec_2" class="accordion-collapse collapse" aria-labelledby="Sec2" data-bs-parent="#sec2">
                    <div class="accordion-body">
                        <input type="hidden" name="remove_sec_ids" class="remove_sec_ids" value="">

                        @if($section->where('section_no', '!=', 1)->count())
                        @for($i=1;$i<=$section->where('section_no', '!=', 1)->count();$i++)
                            <div class="faq_section_row">
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                        <button type="button" class="btn btn-danger remove_faq m-1 {{$i > 1 ? '' : 'd-none'}}"><i class="ri-subtract-fill"></i></button>
                                    </div>
                                </div>
                                @php isset($section) ? ${'section'.($i+1)} = $section->where('section_no', $i+1)->first() : '' @endphp
                                <input type="hidden" name="page_id" value="{{$page_id}}">
                                <input type="hidden" name="section[{{$i}}][sec_no]" class="sec_no" value="{{$i+1}}">

                                @if(isset(${'section'.($i+1)}))
                                <input type="hidden" name="section[{{$i}}][section_id]" class="section_id" value="{{ ${'section'.($i+1)}->id }}">
                                @endif 
                                <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3" id="sub_section{{$i}}">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="Sub_section_{{$i}}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_section_{{$i}}" aria-expanded="false" aria-controls="sub_section_{{$i}}">
                                                <i class="ri-global-line me-2"></i> <span class="acc_header">{{ isset(${'section'.($i+1)}) ? ${'section'.($i+1)}->en_title : 'Sub Section '.$i }}</span>
                                            </button>
                                        </h2>
                                        <div id="sub_section_{{$i}}" class="accordion-collapse collapse" aria-labelledby="sub_section_{{$i}}" data-bs-parent="#sub_section{{$i}}">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                                            <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                                            <input class="form-check-input code-switcher status" type="checkbox" id="customSwitchsizelg" name="section[{{$i}}][status]" {{ isset(${'section'.($i+1)}) ? ((${'section'.($i+1)}->status == 1) ? 'checked' : '') : 'checked' }}>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row gy-4 mt-1">
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div>
                                                            <label for="title" class="form-label">Title (English)</label>
                                                            <input type="text" class="form-control en_title" name="section[{{$i}}][en_title]" value="{{ isset(${'section'.($i+1)}) ? ${'section'.($i+1)}->en_title : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div>
                                                            <label for="title" class="form-label">Title (Japanese)</label>
                                                            <input type="text" class="form-control ja_title" name="section[{{$i}}][ja_title]" value="{{ isset(${'section'.($i+1)}) ? ${'section'.($i+1)}->ja_title : '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row gy-4 mt-1">
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div>
                                                            <label for="title" class="form-label">Description (English)</label>
                                                            <textarea name="section[{{$i}}][en_desc]" class="ckeditor en_desc" cols="100" rows="5">{{ isset(${'section'.($i+1)}) ? ${'section'.($i+1)}->en_desc : '' }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div>
                                                            <label for="title" class="form-label">Description (Japanese)</label>
                                                            <textarea name="section[{{$i}}][ja_desc]" class="ckeditor ja_desc" cols="100" rows="5">{{ isset(${'section'.($i+1)}) ? ${'section'.($i+1)}->ja_desc : '' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row gy-4 mt-1">
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div>
                                                            <label for="title" class="form-label">Image</label>
                                                            <input type="file" name="section[{{$i}}][image]" class="form-control image">
                                                        </div>
                                                    </div>
                                                    @if(isset(${'section'.($i+1)}) && ${'section'.($i+1)}->image)
                                                    <div class="col-xxl-6 col-md-6 imageDiv">
                                                        <img src="{{ ${'section'.($i+1)}->image }}" alt="" width="50px" height="50px" loading="lazy">
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        @else
                        <div class="faq_section_row">
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary add_faq my-2"><i class="ri-add-fill"></i></button>
                                    <button type="button" class="btn btn-danger remove_faq m-1 d-none"><i class="ri-subtract-fill"></i></button>
                                </div>    
                            </div>
                            
                            <input type="hidden" name="page_id" value="{{$page_id}}">   
                            <input type="hidden" name="section[0][sec_no]" value="2">

                            <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3" id="sub_section3">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="Sub_section_3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_section_3" aria-expanded="false" aria-controls="sub_section_3">
                                            <i class="ri-global-line me-2"></i> <span class="acc_header">Sub Section 1</span>
                                        </button>
                                    </h2>
                                   <div id="sub_section_3" class="accordion-collapse collapse" aria-labelledby="sub_section_3" data-bs-parent="#sub_section3">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                                        <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                                        <input class="form-check-input code-switcher" type="checkbox" id="customSwitchsizelg" name="section[0][status]" {{ isset($section0) ? (($section0->status == 1) ? 'checked' : '') : 'checked' }}>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (English)</label>
                                                        <input type="text" class="form-control en_title" name="section[0][en_title]" value="">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (Japanese)</label>
                                                        <input type="text" class="form-control ja_title" name="section[0][ja_title]" value="">
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
                                                        <label for="title" class="form-label">Image</label>
                                                        <input type="file" name="section[0][image]" class="form-control image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <input type="submit" value="Save" id="common_save" class="btn btn-primary my-3">
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
    // CKEDITOR.replace('ckeditor');

    $(document).on('click','.add_faq', function(){
        clone_div = $(".faq_section_row:first").clone();
        clone_div.find('.remove_faq').removeClass('d-none');
        clone_div.insertAfter(".faq_section_row:last");
        clone_div.find('.en_title, .ja_title, .en_desc, .ja_desc, .section_id').val('');
        clone_div.find('.status').prop('checked', false);
        clone_div.find('.imageDiv').hide();
        change_name();
    });

    var remove_payment_ids = [];
    $(document).on('click','.remove_faq', function(){
        $(this).parent().parent().parent().remove();
        remove_payment_ids.push($(this).parents('.faq_section_row').find('.section_id').val());
        $('.remove_sec_ids').val(remove_payment_ids);
    });

    function change_name() {
        var n = 2;
        $(".faq_section_row").each(function() {
            CKEDITOR.replaceAll('ckeditor');

            $(this).find('.accordion').attr('id', 'sub_section' + n)
            $(this).find('.accordion-header').attr('id', 'Sub_section_' + n)
            $(this).find('.accordion-button').attr('data-bs-target', '#sub_section_' + n).attr('aria-controls', 'sub_section_' + n)
            $(this).find('.accordion-collapse').attr('id', 'sub_section_' + n).attr('data-bs-parent', '#sub_section' + n).attr('aria-labelledby', 'sub_section_' + n)
            $(this).find('form').attr('action', '{{ url("PrexSecureCpanel/save_section") }}/' + n);
            $(this).find('.acc_header').html('Sub Section ' + (n - 1));

            $(this).find('.section_id').attr('name', 'section[' + (n - 2) + '][section_id]');
            $(this).find('.sec_no').attr('name', 'section[' + (n - 2) + '][sec_no]');
            $(this).find('.en_title').attr('name', 'section[' + (n - 2) + '][en_title]');
            $(this).find('.status').attr('name', 'section[' + (n - 2) + '][status]');
            $(this).find('.image').attr('name', 'section[' + (n - 2) + '][image]')
            $(this).find('.ja_title').attr('name', 'section[' + (n - 2) + '][ja_title]');
            $(this).find('.en_desc').attr('name', 'section[' + (n - 2) + '][en_desc]');
            $(this).find('.ja_desc').attr('name', 'section[' + (n - 2) + '][ja_desc]');
            $(this).find('.sec_no').val(n);

            n++;
        });

        setTimeout(function() {
            $('.faq_section_row').find('.ckeditor').nextAll().not($('.faq_section_row').find('.ckeditor').next()).remove();
        }, 100);
    }
</script>
@endpush