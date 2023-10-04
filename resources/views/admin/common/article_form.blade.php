@extends('admin.layouts.master')

@section('title', $slug)

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('custom.css') }}">
<link rel="stylesheet" href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/libs/flatpickr/themes/light.css')}}">
</style>
@endpush

@section('content')

<div class="animated fadeIn">
    @include('common.flash')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.article_save') }}" enctype=multipart/form-data>
                @csrf

                <input type="hidden" name="page_id" value="{{$page_id}}">

                @if($article)
                <input type="hidden" name="article_id" value="{{$article->id}}">
                @endif

                <div class="row gy-4">
                    {{-- <div class="col-xxl-2 col-md-2">
                        <label for="title" class="form-label mx-2">Thumbnail Image</label>
                        <div class="s-preview-img my-product-img">
                            <input type="file" name="thumb_img" class="form-control custom_img">
                            <input type="hidden" name="thumb_img" value="{{$article->thumb_img??''}}">
                            <img src="{{ (isset($article) && $article->thumb_img) ? $article->thumb_img : '' }}" loading="lazy" class="img-fluid" id="thumb_img" alt="" />
                            <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                            <div class="p-upload-icon">
                                <i class="ri-upload-cloud-2-fill"></i>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-xxl-6 col-md-6">
                        <label for="title" class="form-label mx-2">Main Image</label>
                        <div class="s-preview-img my-product-img">
                            <input type="file" name="image" class="form-control custom_img">
                            <input type="hidden" name="image" value="{{$article->image??''}}">
                            <img src="{{ (isset($article) && $article->image) ? $article->image : '' }}" loading="lazy" class="img-fluid" id="main_image" alt="" />
                            <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                            <div class="p-upload-icon">
                                <i class="ri-upload-cloud-2-fill"></i>
                            </div>
                        </div>
                    </div>
                    @if(!(($slug == 'event-news') && ($slug == 'company-news')))
                    <div class="col-xxl-6 col-md-6">
                        <label for="title" class="form-label mx-2">Sub Image</label>
                        <div class="s-preview-img my-product-img">
                            <input type="file" name="sub_image" class="form-control custom_img">
                            <input type="hidden" name="sub_image" value="{{$article->sub_image??''}}">
                            <img src="{{ (isset($article) && $article->sub_image) ? $article->sub_image : '' }}" loading="lazy" class="img-fluid" id="sub_image" alt="" />
                            <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                            <div class="p-upload-icon">
                                <i class="ri-upload-cloud-2-fill"></i>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                @if($slug == 'prex-blogs' || $slug == 'tutorials')
                <div class="row gy-4 mt-2">
                    <div class="col-xxl-6 col-md-6">
                        <div>
                            <label for="title" class="form-label">Author</label>
                            <select name="author_id" id="author_id" class="form-control">
                                <option value="">Select Author</option>
                                @foreach($authors as $author)
                                <option value="{{ $author->id }}" {{(isset($article) && ($author->id == $article->author_id)) ? 'selected' : '' }}>{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-md-6">
                        <div>
                            <label for="title" class="form-label">Category</label>
                            <div class="d-flex gap-2">
                                <select name="category_id" id="" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{(isset($article) && ($category->id == $article->category_id)) ? 'selected' : '' }}>{{ $category->en_name }}</option>
                                    @endforeach
                                </select>
                                @if($slug == 'tutorials')<button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addCategory" data-bs-whatever="@mdo">Add</button>@endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="row gy-4 mt-2">
                    <div class="col-xxl-6 col-md-6">
                        <div>
                            <label for="title" class="form-label">Title (English)</label>
                            <input type="text" class="form-control en_title" id="title" name="en_title" value="{{ old('en_title', isset($article->en_title) ? $article->en_title : '') }}">
                        </div>
                    </div>
                    <div class="col-xxl-6 col-md-6">
                        <div>
                            <label for="title" class="form-label">title (Japanese)</label>
                            <input type="text" class="form-control ja_title" id="ja_title" name="ja_title" value="{{ old('ja_title', isset($article->ja_title) ? $article->ja_title : '') }}">
                        </div>
                    </div>
                </div>

                <div class="row gy-4 mt-2">
                    <div class="col-lg-6 col-md-6">
                        <label for="tag" class="form-label">Tags</label>
                        <br>
                        <input id="tag" class="form-control" data-role="tagsinput" type="text" name="tags" value="{{ old('tags', isset($article->tags) ? $article->tags : '') }}">
                    </div>
                    @if($slug == 'event-news'||$slug == 'market-news'||$slug == 'trading-strategy')
                    <div class="col-lg-6 col-md-6">
                        <label for="date" class="form-label">Event Date</label>
                        <br>
                        <input type="text" name="event_date" id="event_date" class="form-control flatpickr-input" data-provider="flatpickr" data-altformat="F j, Y" value="{{ isset($article) ? $article->event_date : '' }}">
                    </div>
                    @elseif($slug == 'home')
                    <div class="col-xxl-6 col-md-6">
                        <div>
                            <label for="title" class="form-label">Category</label>
                            <select class="form-control" name="category">
                                <option value="">Select Category</option>
                                <option value="News" {{ (isset($article->category) && ($article->category == 'News')) ? 'selected' : '' }}>News</option>
                                <option value="Features" {{ (isset($article->category) && ($article->category == 'Features')) ? 'selected' : '' }}>Features</option>
                                <option value="Analysis" {{ (isset($article->category) && ($article->category == 'Analysis')) ? 'selected' : '' }}>Analysis</option>
                            </select>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="row mt-4">
                    <div class="col-xxl-12 col-md-12">
                        <div>
                            <label for="dec" class="form-label">Description (English)</label>
                            <textarea name="en_desc" class="ckeditor_custom" id="desc" cols="30" rows="10">{!! old('en_desc', isset($article->en_desc) ? $article->en_desc : '') !!}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-xxl-12 col-md-12">
                        <div>
                            <label for="dec" class="form-label">Description (Japanese)</label>
                            <textarea name="ja_desc" class="ckeditor_custom" id="desc" cols="30" rows="10">{!! old('ja_desc', isset($article->ja_desc) ? $article->ja_desc : '') !!}</textarea>
                        </div>
                    </div>
                </div>

                <input type="submit" class="btn btn-primary mt-4" value="Submit">
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="add-category" action="{{ route('admin.add_category') }}" method="post">
                 @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Name (English)</label>
                        <input type="text" class="form-control en_name" name="en_name[]">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Name (Japanese)</label>
                        <input type="text" class="form-control ja_name" name="ja_name[]">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
<script type='text/javascript' src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script type="text/javascript">
    tinymce.init({
        selector: ".ckeditor_custom",
        plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons checklist mediaembed pageembed permanentpen powerpaste table advtable tableofcontents',
        toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        content_style: "@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;700&display=swap'); body { font-family: 'Noto Sans JP' } h1,h2,h3,h4,h5,h6 { font-family: 'Noto Sans JP' }",
        font_formats: "Arial Black=arial black,avant garde; Courier New=courier new,courier; Lato Black=lato; Roboto=roboto; Noto Sans JP=Noto Sans JP",
        // skin: "snow",
        height: 420,
        automatic_uploads: true,
        file_picker_types: 'image',
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function () {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
            };

            input.click();
        },
    });
    $("#event_date").flatpickr();
    $(document).ready(function() {
        $('#add-category').validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            rules: {
                'en_name[]': {
                    required: true,
                },
                'ja_name[]': {
                    required: true,
                },
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
                $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                $(element).parents(".error").removeClass(errorClass).addClass(validClass);
            },
        });

    });
</script>

<script src="{{ asset('custom.js') }}"></script>
@endpush