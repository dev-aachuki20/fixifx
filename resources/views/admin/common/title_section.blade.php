@push('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap">
@endpush

<div class="accordion custom-accordionwithicon accordion-secondary mt-2" id="sec1">
    <div class="accordion-item">
        <h2 class="accordion-header" id="Sec1">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec_1" aria-expanded="true" aria-controls="sec_1">
                <i class="ri-global-line me-2"></i>Sub Header Section
            </button>
        </h2>
        <div id="sec_1" class="accordion-collapse collapse" aria-labelledby="Sec1" data-bs-parent="#sec1">
            <div class="accordion-body">
                @php isset($section) ? $section1 = $section->where('section_no', 1)->first() : '' @endphp
                <form action="{{ route('admin.save_section', ['sec_no' => 1]) }}" method="post" enctype=multipart/form-data>
                    @csrf
                    <input type="hidden" name="page_id" value="{{$page_id}}">

                    @if(isset($section1))
                    <input type="hidden" name="section_id" value="{{ $section1->id }}">
                    @endif

                    <div class="row">
                        <!-- image -->
                        <div class="col-xxl-6 col-md-6 mb-3">
                            <label for="title" class="form-label mx-2">Image</label>
                            <div class="s-preview-img my-product-img">
                                @if(isset($section1->image))
                                <input type="hidden" name="image" value="{{$section1->getRawOriginal('image')}}">
                                @endif
                                <input type="file" name="image" class="form-control custom_img">

                                <img src="{{ isset($section1->image) ? $section1->image : '' }}" class="img-fluid" id="main_image" alt="" loading="lazy" />
                                <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                                <div class="p-upload-icon">
                                    <i class="ri-upload-cloud-2-fill"></i>
                                </div>
                            </div>
                        </div>
                        <!-- image end -->
                        <!-- video -->
                        @if($slug == 'advan-trade')
                        <div class="col-xxl-6 col-md-6 mb-3">
                            <label for="video" class="form-label mx-2">Video</label>
                            <div class="s-preview-img my-product-img videoSelectInput">
                                @if(isset($section1->video_url))
                                <input type="hidden" name="video" value="">
                                @endif
                                <input type="file" name="video" class="form-control">

                                <video controls class="img-fluid w-100" id="video_preview">
                                    <source src="{{ isset($section1->video_url) ? $section1->video_url : '' }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <a href="javascript:;" class="btn btn-theme p-img-remove"><i class="ri-close-circle-fill"></i></a>
                                <div class="p-upload-icon">
                                    <i class="ri-upload-cloud-2-fill"></i>
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- end video -->
                    </div>




                    <div class="row gy-4">
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="title" class="form-label">Title (English)</label>
                                <input type="text" class="form-control" id="title" name="en_title" value="{{ old('en_title', isset($section1) ? $section1->en_title : '') }}">
                            </div>
                        </div>
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="title" class="form-label">Title (Japanese)</label>
                                <input type="text" class="form-control" id="ja_title" name="ja_title" value="{{ old('ja_title', isset($section1) ? $section1->ja_title : '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="dec" class="form-label">Description (English)</label>
                                <textarea name="en_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('en_desc', isset($section1) ? $section1->en_desc : '') }}</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="dec" class="form-label">Description (Japanese)</label>
                                <textarea name="ja_desc" class="ckeditor_custom" id="description" cols="30" rows="10">{{ old('ja_desc', isset($section1) ? $section1->ja_desc : '') }}</textarea>
                            </div>
                        </div>
                    </div>
                    @if(Route::current()->slug == "introducing-broker")
                    <div class="row mt-4">
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="title" class="form-label">Button Text (English)</label>
                                <input type="text" class="form-control" id="en_short_text" name="en_short_text" value="{{ old('en_short_text', isset($section1) ? $section1->en_short_text : '') }}">
                            </div>
                        </div>
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="title" class="form-label">Button Text (Japanese)</label>
                                <input type="text" class="form-control" id="ja_short_text" name="ja_short_text" value="{{ old('ja_short_text', isset($section1) ? $section1->ja_short_text : '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label for="title" class="form-label">Button Link</label>
                                <div class="input-group">
                                    <!-- <span class="input-group-text" id="basic-addon3">https://www.youtube.com/</span> -->
                                    <input type="text" class="form-control {{ $errors->has('video_url') ? 'is-invalid' : '' }}" value="{{ old('video_url', isset($section1) ? $section1->getRawOriginal('video_url') : '') }}" placeholder="Add Button Link" id="video_url" name="video_url">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <input type="submit" value="Save" class="btn btn-primary my-4">
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" referrerpolicy="origin"></script>
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
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function() {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), {
                        title: file.name
                    });
                };
                reader.readAsDataURL(file);
            };

            input.click();
        },
    });
</script>
@endpush