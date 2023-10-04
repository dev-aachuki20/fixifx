@extends('admin.layouts.master')

@section('title', $slug)

@section('content')

<div class="animated fadeIn">
    <!-- ----------- Header Section ------------------- -->
    @include('admin.common.header_section')

    <!-- SECTION 1 -->
    @include('admin.common.title_section')

    <!-- Article Section -->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="faq">
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#faq_sec" aria-expanded="true"
                    aria-controls="faq_sec">
                    <i class="ri-question-fill me-2"></i>Trading Strategy Section
                </button>
            </h2>
           
            <div id="faq_sec" class="accordion-collapse collapse" aria-labelledby="faq" data-bs-parent="#faq">
                <a class="btn btn-primary my-2 mx-4" href="{{ route('admin.article', $slug) }}">Add</a>
                <div class="accordion-body">
                    {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap','style' => 'width: 100%']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
{!! $dataTable->scripts() !!}
<script>
    $(document).on('click', '.changeStatus', function() {
        var article_id = $(this).attr('article_id');
        var status = $(this).attr('status');
        /* text = "";
        if(status == 0) {
            text = "All Sub-Menu and Sub-Pages will be Inactivate."
        }  */
        Swal.fire({
            title: 'Are you sure?',
            // text: text,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type:'PATCH',
                        url: "{{ route('admin.article_change_status') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data : {'article_id' : article_id, 'status' : status},
                        success:function(data) {
                            if (data) {
                                window.LaravelDataTables["article-table"].draw();
                            }
                        }
                    });
                } else {
                    Swal.fire("Cancelled", "Your record is safe :)", "error");
                }
            })
    });

</script>
@endpush