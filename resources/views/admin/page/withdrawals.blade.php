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
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sec_2" aria-expanded="true"
                    aria-controls="sec_2">
                    <i class="ri-global-line me-2"></i>Section 2
                </button>
            </h2>
            <div id="sec_2" class="accordion-collapse collapse"
                aria-labelledby="Sec2" data-bs-parent="#sec2">
                <div class="accordion-body">
                    
                    @php isset($section) ? $section2 = $section->where('section_no', 2)->first() : '' @endphp
                    <form action="{{ route('admin.save_section', ['sec_no' => 2]) }}" method="post">
                    @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">
                    
                        @if(isset($section2))
                        <input type="hidden" name="section_id" value="{{ $section2->id }}">
                        @endif
                        {{-- <div class="row gy-4">
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
                        </div> --}}
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox"
                                        id="customSwitchsizelg" name="status" {{ isset($section2) ? (($section2->status == 1) ? 'checked' : '') : 'checked' }}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
<script type="text/javascript">
    $(document).on('click','.add_faq', function(){
        clone_div = $(".faq_section_row:first").clone();
        clone_div.find('.remove_faq').removeClass('d-none').addClass('d-block');
        clone_div.insertAfter(".faq_section_row:last");
        change_name();
    });

    $(document).on('click','.remove_faq', function(){
        $(this).parent().parent().parent().remove();
    });

    function change_name(){
        n=0
        $(".faq_section_row").each(function() {
            // CKEDITOR.replaceAll('desc_ckeditor');

            $(this).find('.accordion').attr('id', 'sub_section'+n)  
            $(this).find('.accordion-header').attr('id', 'Sub_section_'+n) 
            $(this).find('.accordion-button').attr('data-bs-target', '#sub_section_'+n).attr('aria-controls', 'sub_section_'+n)
            $(this).find('.accordion-collapse').attr('id', 'sub_section_'+n).attr('data-bs-parent', '#sub_section'+n).attr('aria-labelledby', 'sub_section_'+n)
            $(this).find('form').attr('action', '{{ url("PrexSecureCpanel/save_section") }}/'+n);
            $(this).find('.acc_header').html('Sub Section '+(n));
            
            $(this).find('.payment_name').attr('name', 'section['+n+'][payment_name]');
            $(this).find('.payment_link').attr('name', 'section['+n+'][payment_link]');
            $(this).find('.en_desc').attr('name', 'section['+n+'][en_desc]');
            $(this).find('.ja_desc').attr('name', 'section['+n+'][ja_desc]');
            $(this).find('.payment_logo').attr('name', 'section['+n+'][payment_logo]');
            
            n++;
        });
        
        setTimeout(function() {
            $('.faq_section_row').find('.desc_ckeditor').nextAll().not($('.faq_section_row').find('.desc_ckeditor').next()).remove();
        }, 100);
    }
</script>
@endpush