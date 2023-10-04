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
                        
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-switch form-switch-md" style="padding-left: 3em;">
                                    <label for="customSwitchsizelg" class="form-label text-muted">Status</label>
                                    <input class="form-check-input code-switcher" type="checkbox"
                                        id="customSwitchsizelg" name="status" {{ isset($section2) ? (($section2->status == 1) ? 'checked' : '') : 'checked' }}>
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
                        <!-- <div class="row my-4">
                            <div class="col-4"><input type="text" class="form-control" name="setting[support_phone_title_en]" value="{{ getSettingValue('support_phone_title_en') }}"></div>
                            <div class="col-4"><input type="text" class="form-control" name="setting[support_phone_title_ja]" value="{{ getSettingValue('support_phone_title_ja') }}"></div>
                            <div class="col-4"><input type="text" class="form-control" name="setting[customer_support_phone]" value="{{ getSettingValue('customer_support_phone') }}"></div>
                        </div>
                        <div class="row my-4">
                            <div class="col-4"><input type="text" class="form-control" name="setting[sale_phone_title_en]" value="{{ getSettingValue('sale_phone_title_en') }}"></div>
                            <div class="col-4"><input type="text" class="form-control" name="setting[sale_phone_title_ja]" value="{{ getSettingValue('sale_phone_title_ja') }}"></div>
                            <div class="col-4"><input type="text" class="form-control" name="setting[sale_department_phone]" value="{{ getSettingValue('sale_department_phone') }}"></div>
                        </div>
                        <div class="row my-4">
                            <div class="col-4"><input type="text" class="form-control" name="setting[support_email_title_en]" value="{{ getSettingValue('support_email_title_en') }}"></div>
                            <div class="col-4"><input type="text" class="form-control" name="setting[support_email_title_ja]" value="{{ getSettingValue('support_email_title_ja') }}"></div>
                            <div class="col-4"><input type="text" class="form-control" name="setting[customer_support_email]" value="{{ getSettingValue('customer_support_email') }}"></div>
                        </div>
                        <div class="row my-4">
                            <div class="col-4"><input type="text" class="form-control" name="setting[sale_dept_title_en]" value="{{ getSettingValue('sale_dept_title_en') }}"></div>
                            <div class="col-4"><input type="text" class="form-control" name="setting[sale_dept_title_ja]" value="{{ getSettingValue('sale_dept_title_ja') }}"></div>
                            <div class="col-4"><input type="text" class="form-control" name="setting[sale_department_email]" value="{{ getSettingValue('sale_department_email') }}"></div>
                        </div>
                        <div class="row my-4">
                            <div class="col-4"><input type="text" class="form-control" name="setting[affiliat_support_phone_title_en]" value="{{ getSettingValue('affiliat_support_phone_title_en') }}"></div>
                            <div class="col-4"><input type="text" class="form-control" name="setting[affiliat_support_phone_title_ja]" value="{{ getSettingValue('affiliat_support_phone_title_ja') }}"></div>
                            <div class="col-4"><input type="text" class="form-control" name="setting[affiliates_support_email]" value="{{ getSettingValue('affiliates_support_email') }}"></div>
                        </div>
                        <div class="row my-4">
                            <div class="col-4"><input type="text" class="form-control" name="setting[broker_email_title_en]" value="{{ getSettingValue('broker_email_title_en') }}"></div>
                            <div class="col-4"><input type="text" class="form-control" name="setting[broker_email_title_ja]" value="{{ getSettingValue('broker_email_title_ja') }}"></div>
                            <div class="col-4"><input type="text" class="form-control" name="setting[broker_email]" value="{{ getSettingValue('broker_email') }}"></div>
                        </div>
                        <div class="row my-4">
                            <div class="col-4"><input type="text" class="form-control" name="setting[friend_support_title_en]" value="{{ getSettingValue('friend_support_title_en') }}"></div>
                            <div class="col-4"><input type="text" class="form-control" name="setting[friend_support_title_ja]" value="{{ getSettingValue('friend_support_title_ja') }}"></div>
                            <div class="col-4"><input type="text" class="form-control" name="setting[friend_support_email]" value="{{ getSettingValue('friend_support_email') }}"></div>
                        </div>
                        <div class="row my-4">
                            <div class="col-4"><input type="text" class="form-control" name="setting[business_address_title_en]" value="{{ getSettingValue('business_address_title_en') }}"></div>
                            <div class="col-4"><input type="text" class="form-control" name="setting[business_address_title_ja]" value="{{ getSettingValue('business_address_title_ja') }}"></div>
                            <div class="col-4"><input type="text" class="form-control" name="setting[business_address]" value="{{ getSettingValue('business_address') }}"></div>
                        </div> -->
                            

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
    $(document).on('click','.add_contact', function(){
        clone_div = $(".contact_row:first").clone();
        clone_div.find('.remove_contact').removeClass('d-none').addClass('d-block');
        clone_div.insertAfter(".contact_row:last");
        clone_div.find('.contact_id').remove();
        clone_div.find('.en_title, .ja_title, .contact_value').val('');
        change_name();
    });

    function change_name(){
        var n=0;
        $(".contact_row").each(function() {
            $(this).find('.contact_id').attr('name', 'contact['+n+'][contact_id]');
            $(this).find('.en_title').attr('name', 'contact['+n+'][en_title]');
            $(this).find('.ja_title').attr('name', 'contact['+n+'][ja_title]');
            $(this).find('.contact_value').attr('name', 'contact['+n+'][value]');
            
            n++;
        });
    }

    var remove_contact_ids = [];
    $(document).on('click','.remove_contact', function(){
        $(this).parent().parent().remove();
        remove_contact_ids.push($(this).parent().parent().find('.contact_id').val());
        $('.contact_remove_ids').val(remove_contact_ids);
    });
</script>
@endpush