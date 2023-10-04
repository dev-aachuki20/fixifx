@extends('admin.layouts.master')

@section('title', 'News Letters')

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

@endsection

@push('scripts')
{!! $dataTable->scripts() !!}
@endpush