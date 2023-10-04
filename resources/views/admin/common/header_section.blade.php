@push('css')
<link rel="stylesheet" href="{{ asset('custom.css') }}">
@endpush
<div class="accordion custom-accordionwithicon accordion-secondary" id="home1">
    <div class="accordion-item">
        <h2 class="accordion-header" id="HomeSection1">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#home_section_1" aria-expanded="true" aria-controls="home_section_1">
                <i class="ri-global-line me-2"></i>Header Section
            </button>
        </h2>
        <div id="home_section_1" class="accordion-collapse collapse show" aria-labelledby="HomeSection1" data-bs-parent="#home1">
            <form action="{{ route('admin.upload-page-background', $slug) }}" method="post" enctype=multipart/form-data>
                @csrf
                <div class="accordion-body">
                    <input type="hidden" name="page_id" value="{{$page_id}}">

                    <div class="col-xxl-12 col-md-12">
                        <label for="title" class="form-label mx-2">Backgroung Image</label>
                        <div class="s-preview-img my-product-img" style="max-width: 100%; min-height: 350px">
                            @if(isset($page) && $page->bg_img)
                            <input type="hidden" name="bg_image" value="{{$page->getRawOriginal('bg_img')}}">
                            @endif
                            <input type="file" name="bg_image" class="form-control custom_img">

                            <img src="{{ (isset($page) && $page->bg_img) ? $page->bg_img : '' }}" loading="lazy" class="img-fluid" id="main_image" alt="" />
                            <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                            <div class="p-upload-icon">
                                <i class="ri-upload-cloud-2-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="submit" value="Save" class="btn btn-primary m-4">
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('custom.js') }}"></script>
@endpush