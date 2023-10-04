@extends('admin.layouts.master')

@section('title', 'Blog Banners')

@push('css')
<link rel="stylesheet" href="{{ asset('custom.css') }}">
@endpush

@section('content')
<div class="animated fadeIn">
    <div class="card">
        <form action="{{ route('admin.update_setting') }}" method="post" enctype="multipart/form-data">
         @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-xxl-6 col-md-6 mb-3">
                        <label for="title" class="form-label mx-2">Bottom Banner</label>
                        <div class="s-preview-img my-product-img" style="width:316px;height:15px;overflow:hidden;">

                            <input type="file" name="setting[blog_bottom_banner]" class="form-control custom_img">   
                            
                            <img src="{{ asset('storage/Setting/'.getSettingValue('blog_bottom_banner')) }}" loading="lazy" class="img-fluid"  id="main_image" alt="" />

                            <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                            <div class="p-upload-icon">
                                <i class="ri-upload-cloud-2-fill"></i>
                            </div>
                        </div>
                    </div>          
                    <div class="col-xxl-6 col-md-6 mb-3">
                        <label for="title" class="form-label mx-2">Side Banner</label>
                        <div class="s-preview-img my-product-img" style="width:150px;height:325px;overflow:hidden;">
                            <input type="file" name="setting[blog_side_banner]" class="form-control custom_img">   
                            
                            <img src="{{ asset('storage/Setting/'.getSettingValue('blog_side_banner')) }}" loading="lazy" class="img-fluid"  id="main_image" alt="" style="height:100%" />
        
                            <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                            <div class="p-upload-icon">
                                <i class="ri-upload-cloud-2-fill"></i>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary m-4">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('custom.js') }}"></script>
@endpush