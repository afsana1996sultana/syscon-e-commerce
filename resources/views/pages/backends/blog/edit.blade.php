@extends('layout.backends.home')
@section('css')
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/modules/summernote/summernote-bs4.css')}}">
@endsection
@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Edit Blog</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Edit Blog</div>
            </div>
		</div>
        <div class="section-body">
            <a href="{{url('blog-list')}}" class="btn btn-primary"><i class="fas fa-list"></i> Blog</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{url('blog-list/'.$blog->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')                        
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Thumbnail Image Preview</label>
                                    <div>
                                        <img id="preview-img" src="{{asset('img/'.$blog->thumbnail_img)}}" alt="" sizes="" srcset="" height="120px" width="160px"> 
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label>New Thumnail Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file"  name="file_thumbnail_img" onchange="previewThumnailImage(event)">
                                </div>

                                <div class="form-group col-12">
                                    <label>Banner Image Preview</label>
                                    <div>
                                        <img id="preview-banner-img" src="{{asset('img/'.$blog->banner_img)}}" alt="" sizes="" srcset="" height="120px" width="160px"> 
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label>New Banner Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file"  name="file_banner_img" onchange="previewBannerImage(event)">
                                </div>


                                <div class="form-group col-12">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" id="txtTitle" class="form-control"  name="txtTitle" value="{{$blog->title}}">
                                </div>

                                <div class="form-group col-12">
                                    <label>Meta Title <span class="text-danger">*</span></label>
                                    <input type="text" id="txtMetaTitle" class="form-control"  name="txtMetaTitle" value="{{$blog->meta_title}}">
                                </div>

                                <div class="form-group col-12">
                                    <label>Slug <span class="text-danger">*</span></label>
                                    <input type="text" id="txtSlug" class="form-control"  name="txtSlug" value="{{$blog->slug}}">
                                </div>
                                
                                <div class="form-group col-12">
                                    <label>Category <span class="text-danger">*</span></label>
                                    <select id="txtCategory" class="form-control" name="txtCategory">
                                        <option selected><-----Choose Category----></option>
                                        @foreach ($blogcategories as $category)
                                        <option value="{{ $category->id }}" {{ ( $category->id == $blog->category) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group col-12">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea name="txtDescription" id="txtDescription" class="summernote">{{$blog->description}}</textarea>
                                </div>


                                <div class="form-group col-12">
                                    <label>Show Homepage? <span class="text-danger">*</span></label>
                                    <select id="txtShowHomepage" class="form-control" name="txtShowHomepage">
                                        <option selected><-----Select----></option>
                                        @foreach ($show as $val)
                                        <option value="{{ $val->id }}" {{ ( $val->id == $blog->show_homepage) ? 'selected' : '' }}>
                                            {{ $val->hp_show }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Status</label>
                                    <select id="txtStatus" class="form-control" name="txtStatus" required>
                                        @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" {{ ( $status->id == $blog->status) ? 'selected' : '' }}>
                                            {{ $status->s_name }}
                                        </option>
                                        @endforeach
                                    </select>  
                                </div>

                                <div class="form-group col-12">
                                    <label>SEO Title</label>
                                    <input type="text" class="form-control" name="txtSeoTitle" id="txtSeoTitle" value="{{$blog->seo_title}}">
                                </div>

                                <div class="form-group col-12">
                                    <label>SEO Description</label>
                                    <textarea name="txtSeoDescription" id="txtSeoDescription" cols="30" rows="10" class="form-control text-area-5">{{$blog->seo_description}}</textarea>
                                </div>
                            </div>

                            <div class="row pt-4">
                                <div class="col-12">
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
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