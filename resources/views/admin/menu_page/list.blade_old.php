@extends('admin.layouts.master')

@section('title', 'Menu')

@section('content')

<div class="animated fadeIn">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        MenuPage
                        <div class="card-header-actions">
                            <button class="btn btn-primary waves-effect waves-light" href="{{ route('admin.menu_page.add') }}" id="menu_page_add">
                                Add MenuPage
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

<div class="modal fade" id="MenuPageModal" tabindex="-1" aria-labelledby="MenuPageModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="MenuModalLabel">Menu Page Add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="menu_page_form">
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
                    <label for="customer-name" class="col-form-label">Sub Menu</label>
                    <select name="sub_menu_id" id="sub_menu_id" class="form-select">
                        <option value="">Select Sub Menu</option>   
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Back</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="EditMenuPageModal" tabindex="-1" aria-labelledby="EditMenuPageModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="MenuModalLabel">Menu Page</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="edit_menu_page_form">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="page_id" id="page_id" value="">
                @if(config('app.debug') == true)
                <div class="mb-3">
                    <label for="customer-name" class="col-form-label">Icon</label>
                    <input type="text" name="icon" class="form-control" id="edicon">
                    <small>Note : Only for developers</small>
                </div>
                @endif

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
                    <label for="customer-name" class="col-form-label">Sub Menu</label>
                    <select name="sub_menu_id" id="sub_menu_id" class="form-select">
                        <option value="">Select Sub Menu</option>   
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
    $(document).on('click', '#menu_page_add', function(){
        $('#menu_page_form').trigger("reset");
        $('#MenuPageModal').modal('show');
    });

    $('#menu_page_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "{{ route('admin.menu_page.add') }}",
            type : 'POST',
            data : $(this).serialize(),
            success : function (res) {
                if(res.status == true) {
                    $('#MenuPageModal').modal('hide');
                    location.reload();
                }
            }
        });
    });

    $('#menu_id').on('change', function(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "{{ route('admin.menu_page.get_submenu') }}",
            type : 'POST',
            data : {'menu_id' : $(this).val()},
            success : function (res) {
                html = '<option value=>Select SubMenu</option>';
                if(res.length) {
                    $.each(res, function(k, val){
                        html += '<option value='+val.id+'>'+val.en_name+'</option>';
                    })
                    $('#sub_menu_id').html(html);
                }
            }
        });
    })

    $(document).on('click', '.changeStatus', function() {
        var id = $(this).attr('menupage_id');
        var status = $(this).attr('status');
        Swal.fire({
            title: 'Are you sure?',
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
                        url: "{{ route('admin.menu_page.change_status') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data : {'id' : id, 'status' : status},
                        success:function(data) {
                            if (data) {
                                window.LaravelDataTables["menupage-table"].draw();
                            }
                        }
                    });
                } else {
                    Swal.fire("Cancelled", "Your record is safe :)", "error");
                }
            })
    });

    $(document).on('shown.bs.modal', '#EditMenuPageModal', function(event){
        var button = $(event.relatedTarget);
        var page_id = button.data('page_id');
        var modal = $(this); 
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "{{ route('admin.menupage_get') }}",
            type : 'POST',
            data : {'page_id' : page_id},
            success : function (res) {
                modal.find('.modal-body #page_id').val(res.page.id);   
                modal.find('#menu_id option[value="'+res.page.menu_id+'"]').prop('selected', true);             
                modal.find('.modal-body #menu_name').val(res.page.en_name);                
                modal.find('.modal-body #ja_menu_name').val(res.page.ja_name) ;
                modal.find('.modal-body #edicon').val(res.page.original_icon);
                html = '<option>Select SubMenu</option>';
                $.each(res.sub_menu, function(key, value) {
                    selected = '';
                    if(value.id == res.page.sub_menu_id) {
                        selected = 'selected';
                    }
                    html += '<option value="'+value.id+'" '+selected+'>'+value.en_name+'</option>'
                });
                modal.find('.modal-body #sub_menu_id').html(html) ;              
            }
        });
    });

    $('#edit_menu_page_form').on('submit', function(){
        event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "{{ route('admin.menu_page.add') }}",
            type : 'POST',
            data : $(this).serialize(),
            success : function (res) {
                if(res.status == true) {
                    $('#EditMenuPageModal').modal('hide');
                    location.reload();
                }
            }
        });
    })

</script>
@endpush