@extends('admin.layouts.master')

@section('title', 'VPS Users')

@section('content')

<div class="animated fadeIn">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap','style' => 'width: 100%']) !!}
        </div>
    </div>
</div>

<div class="modal fade" id="MessageModel" tabindex="-1" aria-labelledby="MessageModelLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <p></p>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
{!! $dataTable->scripts() !!}
<script>
    $('#MessageModel').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var message = button.data('content')
        var modal = $(this)
        modal.find('.modal-body p').text(message)
    })
</script>
@endpush