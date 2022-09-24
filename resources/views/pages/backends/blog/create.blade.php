@extends('layout.backends.home')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/modules/summernote/summernote-bs4.css')}}">
@endsection
@section('page')
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Create Blog</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Create Blog</div>
            </div>
		</div>
        <div class="section-body">
            <a href="{{url('blog-list')}}" class="btn btn-primary"><i class="fas fa-backward"></i> Go Back</a>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('blog-list.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <input type="hidden" value="cmbUserId"  name="cmbUserId" >
                                        <label>Thumbnail Image Preview</label>
                                        <div>
                                            <img id="preview-img" class="admin-img" src="{{url('backends/assets/img/preview.png')}}" alt="" height="160px" width="160px">
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Thumnail Image <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control-file"  name="file_thumbnail_img" onchange="previewThumnailImage(event)">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Banner Image Preview</label>
                                        <div>
                                            <img id="preview-banner-img" class="admin-banner-img" src="{{url('backends/assets/img/preview.png')}}" alt="" height="120px" width="120px">
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Banner Image <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control-file"  name="file_banner_img" onchange="previewBannerImage(event)">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" id="txtTitle" class="form-control"  name="txtTitle" required>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Meta Title <span class="text-danger">*</span></label>
                                        <input type="text" id="txtMetaTitle" class="form-control"  name="txtMetaTitle" required>
                                    </div>


                                    <div class="form-group col-12">
                                        <label>Slug <span class="text-danger">*</span></label>
                                        <input type="text" id="txtSlug" class="form-control"  name="txtSlug" required>
                                    </div>


                                    <div class="form-group col-12">
                                        <label>Category <span class="text-danger">*</span></label>
                                        <select id="txtCategory" class="form-control" name="txtCategory" required>
                                            <option selected><-----Choose Category----></option>
                                            @foreach ($blogcategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea name="txtDescription" id="txtDescription" class="summernote"></textarea>
                                    </div>


                                    <div class="form-group col-12">
                                        <label>Show Homepage? <span class="text-danger">*</span></label>
                                        <select id="txtShowHomepage" class="form-control" name="txtShowHomepage" required>
                                            <option selected><-----Select-----></option>
                                            @foreach ($show as $val)
                                            <option value="{{ $val->id }}">{{ $val->hp_show }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group col-12">
                                        <label class="col-form-label">Published Date&nbsp;</label>
                                        <input type="date" name="txtPublishedDate" id="txtPublishedDate" class="form-control">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>SEO Title</label>
                                        <input type="text" class="form-control" name="txtSeoTitle" id="txtSeoTitle" required>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>SEO Description</label>
                                        <textarea name="txtSeoDescription" id="txtSeoDescription" cols="30" rows="10" class="form-control text-area-5"></textarea>
                                    </div>

                                    <div class="form-group col-12">
                                        <label class="col-form-label">Status&nbsp;</label>
                                        <select id="txtStatus" class="form-control" name="txtStatus" required>
                                            <option selected><-----Select Status----></option>
                                            @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->s_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
	$(document).ready(function () {
    $('.summernote').summernote();
});

function previewThumnailImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('preview-img');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
};

function previewBannerImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('preview-banner-img');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
};
</script>
@section('js')
<script src="{{url('backends/assets/modules/summernote/summernote-bs4.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>
@endsection
@endsection