@extends('layout.backends.home')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
@endsection

@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>User List</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">User List</div>
            </div>
		</div>
    </section>
    <div class="row">                           
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
							<thead>
								<tr>
								<th class="sorting sorting_asc">SN</th>
								<th class="sorting">Name</th>
								<th class="sorting">Email</th>
								<th class="sorting">Role Id</th>
								<th class="sorting">Action</th>
								</tr>
							</thead>
							<tbody> 
								@forelse ($user as $user)
								<tr class="odd">
									<td>{{$user-> id}}</td>
									<td>{{$user-> name}}</td>
									<td>{{$user-> email}}</td>
									<td>{{$user-> role_id}}</td>
									<td class="text-right py-0 align-middle">
										<div class="btn-group btn-group-sm">
											<button type="button" value="{{$user->id}}" class="btn btn-primary" id="edituser" ><i class="fas fa-edit" ></i> </button>&nbsp;
											<button type="button" value="{{$user->id}}" class="btn btn-danger" id="userDbtn" ><i class="fas fa-trash"></i> </button>
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
<!-- Edit User Modal -->
<div id="editModal" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{url('user-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-sm-12">
							<div class="input-group mb-5">
								<input type="hidden" value="" id="cmbUserId" name="cmbUserId" >
								<div class="col-sm-3">
									<label class="col-form-label">Name:&nbsp;</label>
								</div>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="eName" name="txtName">
								</div>
							</div>
						</div>

                        <div class="col-sm-12">
							<div class="input-group mb-5">
								<div class="col-sm-3">
									<label class="col-form-label">Email:&nbsp;</label>
								</div>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="eEmail" name="txtEmail">
								</div>
							</div>
						</div>

                        <div class="col-sm-12">
							<div class="input-group mb-5">
								<div class="col-sm-3">
									<label class="col-form-label">Password:&nbsp;</label>
								</div>
								<div class="col-sm-9">
									<input type="password" class="form-control" id="ePassword" name="txtPassword">
								</div>
							</div>
						</div>

                        <div class="col-sm-12">
							<div class="input-group mb-5">
								<div class="col-sm-3">
									<label class="col-form-label">Role Id:&nbsp;</label>
								</div>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="eRoleId" name="txtRoleId">
								</div>
							</div>
						</div>
					</div>

						<div class="submit-section float-right">
							<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-info cancel-btn">Cancel</a>
							<input class="btn btn-primary submit-btn" type="submit"  name="btnUpdate" value="Update">
						</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit User Modal -->
<!-- Delete User Modal -->
<div class="modal custom-modal fade" id="delete_user" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete User</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-user')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_userId" name="d_user">
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
<!-- /Delete User Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#userDbtn',function(){
            // alart("ok");
			var user_id=$(this).val();
			$('#delete_user').modal('show');
			$('#delete_userId').val(user_id);
		});

		$(document).on('click','#edituser',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-user/"+eid,
				success:function(response){
					$('#cmbUserId').val(eid);		
					$('#eName').val(response.user.name);
					$('#eEmail').val(response.user.email);
					$('#ePassword').val(response.user.password);
					$('#eRoleId').val(response.user.role_id);
					
				}
			});
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