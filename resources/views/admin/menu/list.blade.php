@extends('admin.layouts.master')

@section('title', 'Menu')

@section('content')

<div class="animated fadeIn">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        Menu
                        {{-- <div class="card-header-actions">
                            <button class="btn btn-primary waves-effect waves-light" id="menu_add">
                                Add Menu
                            </button>
                        </div> --}}
                    </div>
                </div>
                <div class="card-body table-responsive">
                    @include('common.flash')
                    <br>
                    {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap','style' => 'width: 100%']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="MenuModal" tabindex="-1" aria-labelledby="MenuModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="MenuModalLabel">Menu Add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="menu_form">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <label for="customer-name" class="col-form-label">Name (English):</label>
                        <input type="text" name="en_name" class="form-control" id="menu_name" readonly>
                    </div>
                    <div class="col-6">
                        <label for="customer-name" class="col-form-label">Name (Japanese):</label>
                        <input type="text" name="ja_name" class="form-control" id="ja_menu_name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="customer-name" class="col-form-label">Description (English):</label>
                        <textarea name="en_desc" class="form-control" id="en_desc" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="customer-name" class="col-form-label">Description (Japanese):</label>
                        <textarea name="ja_desc" class="form-control" id="ja_desc" cols="30" rows="5"></textarea>
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

<div class="modal fade" id="EditMenuModal" tabindex="-1" aria-labelledby="EditMenuModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditMenuModalLabel">Menu Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="edit_menu_form">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="menu_id" id="menu_id" value="">
                @if(config('app.debug') == true)
                <div class="row">
                    <div class="col-6">
                        <label for="customer-name" class="col-form-label">Icon</label>
                        <input type="text" name="icon" class="form-control" id="icon">
                        <small>Note : Only for developers</small>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-6">
                        <label for="customer-name" class="col-form-label">Name (English):</label>
                        <input type="text" name="en_name" class="form-control" id="edit_menu_name" readonly>
                    </div>
                    <div class="col-6">
                        <label for="customer-name" class="col-form-label">Name (Japanese):</label>
                        <input type="text" name="ja_name" class="form-control" id="ja_edit_menu_name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="customer-name" class="col-form-label">Description (English):</label>
                        <textarea name="en_desc" class="form-control" id="en_edit_desc" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="customer-name" class="col-form-label">Description (Japanese):</label>
                        <textarea name="ja_desc" class="form-control" id="ja_edit_desc" cols="30" rows="5"></textarea>
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

@endsection

@push('scripts')
{!! $dataTable->scripts() !!} 

<script>
    $(document).on('click', '#menu_add', function(){
        $('#menu_form').trigger("reset");
        $('#MenuModal').modal('show');
    });

    $('#menu_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "{{ route('admin.menu.add') }}",
            type : 'POST',
            data : $(this).serialize(),
            success : function (res) {
                if(res.status == true) {
                    $('#MenuModal').modal('hide');
                    location.reload();
                }
            }
        });
    });

    $(document).on('click', '.changeStatus', function() {
        var id = $(this).attr('menu_id');
        var status = $(this).attr('status');
        text = "";
        if(status == 0) {
            text = "All Sub-Menu and Sub-Pages will be Inactivate."
        } 
        Swal.fire({
            title: 'Are you sure?',
            text: text,
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
                        url: "{{ route('admin.menu.change_status') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data : {'id' : id, 'status' : status},
                        success:function(data) {
                            if (data) {
                                window.LaravelDataTables["menu-table"].draw();
                            }
                        }
                    });
                } else {
                    Swal.fire("Cancelled", "Your record is safe :)", "error");
                }
            })
    });

    $(document).on('shown.bs.modal', '#EditMenuModal', function(event){
        var button = $(event.relatedTarget);
        var menu_id = button.data('menu_id');
        var modal = $(this); 
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "{{ route('admin.menu_get') }}",
            type : 'POST',
            data : {'menu_id' : menu_id},
            success : function (res) {
                console.log(res);
                modal.find('.modal-body #menu_id').val(res.id);                
                modal.find('.modal-body #edit_menu_name').val(res.en_name);                
                modal.find('.modal-body #ja_edit_menu_name').val(res.ja_name);
                modal.find('.modal-body #en_edit_desc').val(res.en_desc);                
                modal.find('.modal-body #ja_edit_desc').val(res.ja_desc);                
                modal.find('.modal-body #icon').val(res.icon);                
            }
        });
    });

    $('#edit_menu_form').on('submit', function(){
        event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "{{ route('admin.menu.add') }}",
            type : 'POST',
            data : $(this).serialize(),
            success : function (res) {
                if(res.status == true) {
                    $('#EditMenuModal').modal('hide');
                    location.reload();
                }
            }
        });
    })

</script>
@endpush