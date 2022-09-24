@extends('layout.backends.home')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
@endsection

@section('page')
<style>
img {
  border-radius: 50%;
  background-color: #fff;
}
</style>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Blog</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Blog</div>
            </div>
        </div>
    </section>

    <div class="section-body">
        <a href="{{ route('blog-list.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add New</a> 
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                    <th class="sorting">SN</th>
                                    <th class="sorting">Title</th>
                                    <th class="sorting">Category</th>
                                    <th class="sorting">Image</th>
                                    <th class="sorting">Show Homepage</th>
                                    <th class="sorting">Status</th>
                                    <th class="sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @forelse ($blog as $blog)
                                    <tr class="odd">
                                        <td>{{$blog-> id}}</td>
                                        <td><a href="">{{$blog-> title}}</a></td>
                                        <td>{{$blog-> name}}</td>
                                        <td><img src="{{asset('img/'.$blog->thumbnail_img)}}" height="90px" width="90px" alt=""></td>
                                        <td>
                                            @if($blog->show_homepage==1)
                                            <div>
                                              <span class="badge badge-success">{{$blog->hp_show}}</span>
                                            </div>
                                            @else($blog->show_homepage==2)
                                            <div>
                                              <span class="badge badge-danger">{{$blog->hp_show}}</span>
                                            </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($blog->status==1)
                                            <div>
                                                <input type="checkbox" checked data-toggle="toggle" data-on="{{$blog->s_name}}" data-off="InActive" data-onstyle="success" data-offstyle="danger">   
                                            </div>
                                            @elseif($blog->status==2)
                                            <div>
                                                <input type="checkbox" checked data-toggle="toggle" data-on="{{$blog->s_name}}" data-off="Active" data-onstyle="danger" data-offstyle="success">   
                                            </div>
                                            @else
                                            <div>
                                                <input type="checkbox" checked data-toggle="toggle" data-on="{{$blog->s_name}}" data-off="Active" data-onstyle="warning" data-offstyle="success">   
                                            </div>
                                            @endif
                                        </td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url('blog-list/'.$blog->id.'/edit')}}" class="btn btn-primary"><i class="fas fa-edit" ></i></a>&nbsp;
                                                <button type="button" value="{{$blog->id}}" class="btn btn-danger" id="blogDbtn" ><i class="fas fa-trash"></i> </button>
                                            </div>
                                        </td>   
                                    </tr>
                                    @empty
                                        <div colspan="14">No records found</div>
                                    @endforelse
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Delete Blog Modal -->
<div class="modal custom-modal fade" id="delete_blog" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Blog</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-blog-list')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_blogId" name="d_blog">
                                <button type="submit" class="btn btn-danger continue-btn">Delete</button>		
							</form>
						</div>
						<div class="col-6">
							<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-info cancel-btn">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Delete Blog Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#blogDbtn',function(){
            // alart("ok");
			var blog_id=$(this).val();
			$('#delete_blog').modal('show');
			$('#delete_blogId').val(blog_id);
		});
    
	});

$("#table-1").dataTable({
	"columnDefs": [
		{ "sortable": false, "targets": [2,3] }
	]
});
</script>
@endsection
@endsection