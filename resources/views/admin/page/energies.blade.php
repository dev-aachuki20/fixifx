@extends('admin.layouts.master')

@section('title', $slug)

@section('content')

<div class="animated fadeIn">
    <!-- ----------- Header Section ------------------- -->
    @include('admin.common.header_section')

    <!-- SECTION 1 -->
    @include('admin.common.title_section')

    <!-- SECTION 2 to 6 -->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="home3">
        <div class="accordion-item">
            <h2 class="accordion-header" id="HomeSection3">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#home_section_3" aria-expanded="true"
                    aria-controls="home_section_3">
                    <i class="ri-global-line me-2"></i>Section 2 
                </button>
            </h2>
            <div id="home_section_3" class="accordion-collapse collapse"
                aria-labelledby="HomeSection3" data-bs-parent="#home3">
                <div class="accordion-body">
                    
                    @for($i=2; $i<=7; $i++)
                        @php isset($section) ? ${'section'.$i} = $section->where('section_no', $i)->first() : '' @endphp
                        <form action="{{ route('admin.save_section', ['sec_no' => $i]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="page_id" value="{{$page_id}}">   
                            @if(isset(${'section'.$i}))
                            <input type="hidden" name="section_id" value="{{ ${'section'.$i}->id }}">
                            @endif     
                            <div class="accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3"id="sub_sec_{{$i}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="sub_sec_{{$i}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub_sec{{$i}}" aria-expanded="false" aria-controls="sub_sec{{$i}}">
                                            <i class="ri-global-line me-2"></i> {{ ${'section'.$i} ? ${'section'.$i}->en_title : 'Sub Section '.$i }}
                                        </button>
                                    </h2>
                                    <div id="sub_sec{{$i}}"
                                        class="accordion-collapse collapse" aria-labelledby="sub_sec_{{$i}}" data-bs-parent="#sub_sec_{{$i}}">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                                        <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                                        <input class="form-check-input code-switcher" type="checkbox"
                                                            id="customSwitchsizelg" name="status" {{ isset(${'section'.($i)}) ? ((${'section'.($i)}->status == 1) ? 'checked' : '') : 'checked' }}>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Image</label>
                                                        <input type="file" class="form-control" id="image" name="image">
                                                    </div>
                                                </div>
                                                @if(isset(${'section'.$i}) && ${'section'.$i}->image)
                                                <div class="col-xxl-6 col-md-6">
                                                   <input type="hidden" name="image" value="{{${'section'.($i)}->getRawOriginal('image')}}">
                                                    <img src="{{ ${'section'.$i}->image }}" alt="" width="100px" height="100px" loading="lazy">
                                                </div>
                                                @endif
                                            </div>

                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Count text (English)</label>
                                                        <input type="text" class="form-control" id="en_count_text" name="en_count_text" value="{{ ${'section'.$i} ? ${'section'.$i}->en_count_text : ''}}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Count text (Japanese)</label>
                                                        <input type="text" class="form-control" id="ja_count_text" name="ja_count_text" value="{{ ${'section'.$i} ? ${'section'.$i}->ja_count_text : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Short text (English)</label>
                                                        <input type="text" class="form-control" id="en_short_text" name="en_short_text" value="{{ ${'section'.$i} ? ${'section'.$i}->en_short_text : ''}}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Short text (Japanese)</label>
                                                        <input type="text" class="form-control" id="ja_short_text" name="ja_short_text" value="{{ ${'section'.$i} ? ${'section'.$i}->ja_short_text : ''}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (English)</label>
                                                        <input type="text" class="form-control" id="title" name="en_title" value="{{ ${'section'.$i} ? ${'section'.$i}->en_title : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Title (Japanese)</label>
                                                        <input type="text" class="form-control" id="ja_title" name="ja_title" value="{{ ${'section'.$i} ? ${'section'.$i}->ja_title : '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gy-4 mt-1">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (English)</label>
                                                        <textarea name="en_desc" class="ckeditor_custom" cols="100" rows="5">{{ ${'section'.$i} ? ${'section'.$i}->en_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="title" class="form-label">Description (Japanese)</label>
                                                        <textarea name="ja_desc" class="ckeditor_custom" cols="100" rows="5">{{ ${'section'.$i} ? ${'section'.$i}->ja_desc : '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" value="Save" class="btn btn-primary my-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>    
                    @endfor 

                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 8 -->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec8">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec8">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sec_8" aria-expanded="true"
                    aria-controls="sec_8">
                    <i class="ri-global-line me-2"></i>Section 8 
                </button>
            </h2>
            <div id="sec_8" class="accordion-collapse collapse" aria-labelledby="Sec8" data-bs-parent="#sec8">
                <div class="accordion-body">
                    @php isset($section) ? $section8 = $section->where('section_no', 8)->first() : '' @endphp
                    <form action="{{ route('admin.save_section', ['sec_no' => 8]) }}" method="post">
                    @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">
                        
                        @if(isset($section8))
                        <input type="hidden" name="section_id" value="{{ $section8->id }}">
                        @endif
                        
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox"
                                        id="customSwitchsizelg" name="status" {{ isset($section8) ? (($section8->status == 1) ? 'checked' : '') : 'checked' }}>
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
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (English)</label>
                                    <textarea name="en_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', isset($section8) ? $section8->en_desc : '') }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (Japanese)</label>
                                    <textarea name="ja_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_desc', isset($section8) ? $section8->ja_desc : '') }}</textarea>
                                </div>
                            </div>
                        </div> 

                        <input type="submit" value="Save" class="btn btn-primary my-4">
                    </form>    
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 9 -->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec9">
        <div class="accordion-item">
            <h2 class="accordion-header" id="Sec9">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sec_9" aria-expanded="true"
                    aria-controls="sec_9">
                    <i class="ri-global-line me-2"></i>Section 9 
                </button>
            </h2>
            <div id="sec_9" class="accordion-collapse collapse" aria-labelledby="Sec9" data-bs-parent="#sec9">
                <div class="accordion-body">
                    @php isset($section) ? $section9 = $section->where('section_no', 9)->first() : '' @endphp
                    <form action="{{ route('admin.save_section', ['sec_no' => 9]) }}" method="post">
                    @csrf
                        <input type="hidden" name="page_id" value="{{$page_id}}">
                        
                        @if(isset($section9))
                        <input type="hidden" name="section_id" value="{{ $section9->id }}">
                        @endif
                        
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox"
                                        id="customSwitchsizelg" name="status" {{ isset($section9) ? (($section9->status == 1) ? 'checked' : '') : 'checked' }}>
                                </div>
                            </div>
                        </div>

                        <div class="row gy-4 mt-1">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (English)</label>
                                    <input type="text" class="form-control" id="title" name="en_title" value="{{ old('en_title', isset($section9) ? $section9->en_title : '') }}">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="title" class="form-label">Title (Japanese)</label>
                                    <input type="text" class="form-control" id="ja_title" name="ja_title" value="{{ old('ja_title', isset($section9) ? $section9->ja_title : '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (English)</label>
                                    <textarea name="en_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', isset($section9) ? $section9->en_desc : '') }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="dec" class="form-label">Description (Japanese)</label>
                                    <textarea name="ja_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_desc', isset($section9) ? $section9->ja_desc : '') }}</textarea>
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
        n=2
        $(".faq_section_row").each(function() {
            // CKEDITOR.replaceAll('desc_ckeditor');

            $(this).find('.accordion').attr('id', 'sub_section'+n)  
            $(this).find('.accordion-header').attr('id', 'Sub_section_'+n) 
            $(this).find('.accordion-button').attr('data-bs-target', '#sub_section_'+n).attr('aria-controls', 'sub_section_'+n)
            $(this).find('.accordion-collapse').attr('id', 'sub_section_'+n).attr('data-bs-parent', '#sub_section'+n).attr('aria-labelledby', 'sub_section_'+n)
            $(this).find('form').attr('action', '{{ url("PrexSecureCpanel/save_section") }}/'+n);
            $(this).find('.acc_header').html('Sub Section '+(n-1));
            
            $(this).find('.section_id').attr('name', 'section['+(n-2)+'][section_id]');
            $(this).find('.sec_no').attr('name', 'section['+(n-2)+'][sec_no]');
            $(this).find('.en_title').attr('name', 'section['+(n-2)+'][en_title]');
            $(this).find('.ja_title').attr('name', 'section['+(n-2)+'][ja_title]');
            $(this).find('.en_desc').attr('name', 'section['+(n-2)+'][en_desc]');
            $(this).find('.ja_desc').attr('name', 'section['+(n-2)+'][ja_desc]');
            $(this).find('.sec_no').val(n);
            
            n++;
        });
        
        setTimeout(function() {
            $('.faq_section_row').find('.desc_ckeditor').nextAll().not($('.faq_section_row').find('.desc_ckeditor').next()).remove();
        }, 100);
    }
</script>
@endpush