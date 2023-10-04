@extends('admin.layouts.master')

@section('title', 'Blog Authors')

@section('content')

<div class="animated fadeIn">
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary float-right" id="add_author">Add</a>
            <a class="btn btn-primary float-right" href="{{ route('admin.page', ['slug' => 'prex-blogs']) }}">Blogs</a>
        </div>
        <div class="card-body">
        {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap','style' => 'width: 100%']) !!}
        </div>
    </div>
</div>

<div class="modal fade" id="AuthorModal" tabindex="-1" aria-labelledby="AuthorModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AuthorModalLabel">Author</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="author_form">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="customer-name" class="col-form-label">Author Profile</label>
                            <input type="file" name="profile" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="customer-name" class="col-form-label">Author Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="customer-name" class="col-form-label">Author Description (English)</label>
                            <textarea name="en_description" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="customer-name" class="col-form-label">Author Description (Japanese)</label>
                            <textarea name="ja_description" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="EditAuthorModal" tabindex="-1" aria-labelledby="EditAuthorModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditAuthorModalLabel">Author</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="edit_author_form">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="customer-name" class="col-form-label">Author Profile</label>
                            <input type="file" name="profile" class="form-control">
                        </div>
                        <div class="col-6">
                            <img src="" alt="" id="profile" loading="lazy">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="customer-name" class="col-form-label">Author Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="customer-name" class="col-form-label">Author Description (English)</label>
                            <textarea name="en_description" class="form-control" id="en_description" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="customer-name" class="col-form-label">Author Description (Japanese)</label>
                            <textarea name="ja_description" class="form-control" id="ja_description" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="author_id" id="author_id" value="">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
{!! $dataTable->scripts() !!}

<script>
    $(document).on('click', '#add_author', function(){
        $('#author_form').trigger("reset");
        $('#AuthorModal').modal('show');
    });

    $('#author_form, #edit_author_form').on('submit', function(event){
        event.preventDefault();
        form = $(this)[0];
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "{{ route('admin.add_author') }}",
            type : 'POST',
            processData: false,
            contentType: false,
            data : new FormData(form),
            success : function (res) {
                if(res) {
                    $('#AuthorModal').modal('hide');
                    window.LaravelDataTables["articleauthor-table"].draw();
                }
            },
            error: function(data) {
                if (data.status === 422) {
                    $('.invalid-feedback').remove();
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors.errors, function(key, value) {
                        $(form).find('input[name=' + key + '], textarea[name=' + key + ']').empty().after('<div id="' + key + '-error" class="invalid-feedback animated fadeInDown">' + value + '</div>');
                        $(form).find('input[name=' + key + '], textarea[name=' + key + ']').addClass('is-invalid');
                    });
                }
            }
        });
    });

    $(document).on('shown.bs.modal', '#EditAuthorModal', function(event){
        var button = $(event.relatedTarget);
        var author_id = button.data('author_id');
        var modal = $(this); 
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "{{ route('admin.blog_author') }}/"+author_id,
            type : 'GET',
            success : function (res) {
                modal.find('#name').val(res.name);               
                modal.find('#en_description').val(res.en_description);               
                modal.find('#ja_description').val(res.ja_description);               
                modal.find('#profile').val(res.profile);               
                modal.find('#author_id').val(res.id);               
            }
        });
    });
</script>
@endpush