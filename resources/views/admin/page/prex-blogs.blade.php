@extends('admin.layouts.master')

@section('title', $slug)

@section('content')

<style>

table#article-table {
    white-space: nowrap;
    width: 100%;
    display: block;
    overflow-x: auto;
}

</style>

<div class="animated fadeIn">

    <div class="row my-3">
        <div class="col-6">
            <a href="{{ route('admin.setting.category') }}" class="btn btn-primary mx-2">Categories</a>
            <a href="{{ route('admin.blog_author') }}" class="btn btn-primary mx-2">Authors</a>
            <a href="{{ route('admin.blog_banner') }}" class="btn btn-primary mx-2">Banners</a>
        </div>
    </div>
    <!-- ----------- Header Section ------------------- -->
    @include('admin.common.header_section')

    <!-- Article Section -->
    <div class="accordion custom-accordionwithicon accordion-secondary mt-2 mb-2" id="faq">
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#faq_sec" aria-expanded="true"
                    aria-controls="faq_sec">
                    <i class="ri-question-fill me-2"></i>Blog Section
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
@endpush