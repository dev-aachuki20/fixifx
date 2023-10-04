@extends('admin.layouts.master')

@section('title', 'Menu')

@section('content')

<div class="animated fadeIn">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        SubMenu
                        <div class="card-header-actions">
                            <button class="btn btn-primary waves-effect waves-light" href="{{ route('admin.sub_menu.add') }}" id="sub_menu_add">
                                Add SubMenu
                            </button>
                        </div>
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

<div class="modal fade" id="SubMenuModal" tabindex="-1" aria-labelledby="SubMenuModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="MenuModalLabel">Sub Menu Add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="sub_menu_form">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="customer-name" class="col-form-label">Menu</label>
                    <select name="menu_id" id="menu_id" class="form-select">
                        <option value="">Select Menu</option>
                        @foreach($menu as $m)
                            <option value="{{ $m->id }}">{{ $m->en_name }}</option>
                        @endforeach    
                    </select>
                </div>
                <div class="mb-3">
                    <label for="customer-name" class="col-form-label">Name (English):</label>
                    <input type="text" name="en_name" class="form-control" id="menu_name" readonly>
                </div>
                <div class="mb-3">
                    <label for="customer-name" class="col-form-label">Name (Japanese):</label>
                    <input type="text" name="ja_name" class="form-control" id="ja_menu_name">
                </div>
                <div class="mb-3">
                    <label for="customer-name" class="col-form-label">Icon:</label>
                    <input type="text" name="icon" class="form-control" id="icon">
                    <small class="error">Only for developer change</small>
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

<div class="modal fade" id="EditSubMenuModal" tabindex="-1" aria-labelledby="EditSubMenuModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="MenuModalLabel">Sub Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="sub_menu_edit_form">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="sub_menu_id" id="sub_menu_id" value="">
                <div class="mb-3">
                    <label for="customer-name" class="col-form-label">Menu</label>
                    <select name="menu_id" id="menu_id" class="form-select">
                        <option value="">Select Menu</option>
                        @foreach($menu as $m)
                            <option value="{{ $m->id }}">{{ $m->en_name }}</option>
                        @endforeach    
                    </select>
                </div>
                <div class="mb-3">
                    <label for="customer-name" class="col-form-label">Name (English):</label>
                    <input type="text" name="en_name" class="form-control" id="menu_name" readonly>
                </div>
                <div class="mb-3">
                    <label for="customer-name" class="col-form-label">Name (Japanese):</label>
                    <input type="text" name="ja_name" class="form-control" id="ja_menu_name">
                </div>
                <div class="mb-3">
                    <label for="customer-name" class="col-form-label">Icon:</label>
                    <input type="text" name="icon" class="form-control" id="edit_icon">
                    <small class="error">Only for developer change</small>
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
    $(document).on('click', '#sub_menu_add', function(){
        $('#sub_menu_form').trigger("reset");
        $('#SubMenuModal').modal('show');
    });

    $('#sub_menu_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "{{ route('admin.sub_menu.add') }}",
            type : 'POST',
            data : $(this).serialize(),
            success : function (res) {
                if(res.status == true) {
                    $('#SubMenuModal').modal('hide');
                    location.reload();
                }
            }
        });
    });

    $(document).on('click', '.changeStatus', function() {
        var id = $(this).attr('submenu_id');
        var status = $(this).attr('status');
        text = "";
        if(status == 0) {
            text = "All Sub-Pages will be Inactivate."
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
                        url: "{{ route('admin.sub_menu.change_status') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data : {'id' : id, 'status' : status},
                        success:function(data) {
                            if (data) {
                                window.LaravelDataTables["submenu-table"].draw();
                            }
                        }
                    });
                } else {
                    Swal.fire("Cancelled", "Your record is safe :)", "error");
                }
            })
    });

    $(document).on('shown.bs.modal', '#EditSubMenuModal', function(event){
        var button = $(event.relatedTarget);
        var submenu_id = button.data('submenu_id');
        var modal = $(this); 
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "{{ route('admin.submenu_get') }}",
            type : 'POST',
            data : {'submenu_id' : submenu_id},
            success : function (res) {
                modal.find('.modal-body #sub_menu_id').val(res.id);   
                modal.find('#menu_id option[value="'+res.menu_id+'"]').prop('selected', true);             
                modal.find('.modal-body #menu_name').val(res.en_name);                
                modal.find('.modal-body #ja_menu_name').val(res.ja_name) ;
                modal.find('.modal-body #edit_icon').val(res.icon) ;        
            }
        });
    });


    $('#sub_menu_edit_form').on('submit', function(){
        event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        url : "{{ route('admin.sub_menu.add') }}",
            type : 'POST',
            data : $(this).serialize(),
            success : function (res) {
                if(res.status == true) {
                    $('#EditSubMenuModal').modal('hide');
                    location.reload();
                }
            }
        });
    })

</script>
@endpush