@extends('admin.layouts.master')

@section('title', 'FAQ')

@section('content')
<!-- FAQ -->
<div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="faq">
    <div class="accordion-item">
        <h2 class="accordion-header" id="faq">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#faq_sec" aria-expanded="true"
                aria-controls="faq_sec">
                <i class="ri-question-fill me-2"></i>FAQ Section
            </button>
        </h2>
        <div id="faq_sec" class="accordion-collapse collapse show"
            aria-labelledby="faq" data-bs-parent="#faq">
            <div class="accordion-body">
                <form action="{{ route('admin.add-edit-faq') }}" method="post">
                @csrf

                    <input type="hidden" name="faq_remove_id" class="faq_remove_ids" value="">

                    @if(count($faqs))
                        @foreach($faqs as $k => $faq)
                        <div class="faq_section_row">
                            <div class="card border">
                                <div class="card-header border">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="qus_title">Question {{ $k+1 }}</h6>
                                        </div>
                                        <div class="col-6">
                                            <button class="btn btn-danger remove_faq mx-1 {{ ($k == 0) ? 'd-none' : '' }}" type="button" style="float: right;"><i class="ri-subtract-fill"></i></button>
                                            <button class="btn btn-primary add_faq" type="button" style="float: right;"><i class="ri-add-fill"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    
                                    <input type="hidden" name="page_id" value="{{$page_id}}">
                                    
                                    <input type="hidden" name="faq[{{$k}}][faq_id]" value="{{$faq->id}}" class="faq_id">

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
                                    <div class="col-6">
                                        <h6 class="qus_title">Question 1</h6>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-danger remove_faq mx-1 d-none" type="button" style="float: right;"><i class="ri-subtract-fill"></i></button>
                                        <button class="btn btn-primary add_faq" type="button" style="float: right;"><i class="ri-add-fill"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @csrf

                                <input type="hidden" name="page_id" value="{{$page_id}}">
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
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    
    toolbarGroups = [
        { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
        { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
        { name: 'forms', groups: [ 'forms' ] },
        '/',
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
        { name: 'links', groups: [ 'links' ] },
        { name: 'insert', groups: [ 'insert' ] },
        '/',
        { name: 'styles', groups: [ 'styles' ] },
        { name: 'colors', groups: [ 'colors' ] },
        { name: 'tools', groups: [ 'tools' ] },
        { name: 'others', groups: [ 'others' ] },
        { name: 'about', groups: [ 'about' ] }
    ];
    
    CKEDITOR.replace('ckeditor', {
        toolbar : 'Basic',
        toolbarGroups,
    });
    
    $(document).on('click','.add_faq', function(){
        clone_div = $(".faq_section_row:first").clone();
        clone_div.find('.remove_faq').removeClass('d-none').addClass('d-block');
        clone_div.insertAfter(".faq_section_row:last");
        clone_div.find('.en_question, .ja_question, .en_answer, .ja_answer').val('');
        change_name($(this));
    });

    var remove_faq_ids = [];
    $(document).on('click','.remove_faq', function(){
        $(this).parents('.faq_section_row').remove();
        remove_faq_ids.push($(this).parent().parent().parent().parent().parent().find('.faq_id').val());
        $('.faq_remove_ids').val(remove_faq_ids);
    });

    function change_name(this_var){
        var n=0;
        $(".faq_section_row").each(function() {
            CKEDITOR.replaceAll('ckeditor');
            $(this).find('.qus_title').html('Question '+(n+1));
            $(this).find('.en_question').attr('name', 'faq['+n+'][en_question]');
            $(this).find('.ja_question').attr('name', 'faq['+n+'][ja_question]');
            $(this).find('.en_answer').attr('name', 'faq['+n+'][en_answer]');
            $(this).find('.ja_answer').attr('name', 'faq['+n+'][ja_answer]');
            n++;
        });
        setTimeout(function() {
            $('.faq_section_row').find('.ckeditor').nextAll().not($('.faq_section_row').find('.ckeditor').next()).remove();
        }, 10);
    }
</script>
@endpush