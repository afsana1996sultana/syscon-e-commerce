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
			<h1>Brand Partner</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Brand Partner</div>
            </div>
		</div>
    </section>

	<div class="section-body">
		<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_partner"><i class="fa fa-plus"></i>Add New</a> 
		<div class="row mt-4">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped" id="table-1">
								<thead>
									<tr>
										<th class="sorting sorting_asc">SN</th>
										<th class="sorting">Brand Name</th>
                                        <th class="sorting">Brand Logo One</th>
                                        <th class="sorting">Brand Logo Two</th>
										<th class="sorting">Slug</th>
										<th class="sorting">Action</th>
									</tr>
								</thead>
								<tbody> 
									@forelse ($partner as $partner)
									<tr class="odd">
										<td>{{$partner-> id}}</td>
										<td>{{$partner-> brand_name}}</td>
                                        <td>
                                            <img src="{{asset('img/'.$partner->brand_logo1)}}" height="70px" width="70px" alt="">
                                        </td>
                                        <td>
                                            <img src="{{asset('img/'.$partner->brand_logo2)}}" height="70px" width="70px" alt="">
                                        </td>
										<td>{{$partner-> slug}}</td>
										<td class="text-right py-0 align-middle">
											<div class="btn-group btn-group-sm">
												<button type="button" value="{{$partner->id}}" class="btn btn-primary" id="editpartner" ><i class="fas fa-edit" ></i> </button>&nbsp;
												<button type="button" value="{{$partner->id}}" class="btn btn-danger" id="partnerDbtn" ><i class="fas fa-trash"></i> </button>
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

<!-- Add Brand Partner Modal -->
<div id="add_partner" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit">Add Brand Partner</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- add member--}}
            <div class="modal-body">
                <form action="{{route('brand-partner.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Brand Logo One Preview</label>
                            <div>
                                <img id="preview-img" class="admin-img" src="{{url('backends/assets/img/preview.png')}}" alt="" height="120px" width="120px">
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>Brand Logo One <span class="text-danger">*</span></label>
                            <input type="file" class="form-control-file"  name="file_logo1" onchange="previewThumnailImage(event)">
                        </div>


                        <div class="form-group col-12">
                            <label>Brand Logo Two Preview</label>
                            <div>
                                <img id="preview-imgd" class="admin-img" src="{{url('backends/assets/img/preview.png')}}" alt="" height="120px" width="120px">
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>Brand Logo Two <span class="text-danger">*</span></label>
                            <input type="file" class="form-control-file"  name="file_logo2" onchange="previewThumnailImage(event)">
                        </div>


                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Brand Name:&nbsp;</label>
                                <input type="text" class="form-control" id="txtBrandName" name="txtBrandName"required>
                            </div>
                        </div>	

                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Slug:&nbsp;</label>
                                <input type="text" class="form-control" id="txtSlug" name="txtSlug"required>
                            </div>
                        </div>
                    </div>

                    <div class="submit-section float-right">
                        <button type="button" class="btn btn-info" style="width:80px;" data-dismiss="modal">Close</button>
                        <input class="btn btn-primary submit-btn" type="submit" name="btnCreate" style="width:80px;" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Brand Partner Modal -->

<!-- Edit Brand Partner Modal -->
<div id="editModal" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Product Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{url('brand-partner-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				
					<div class="row">
                        <div class="form-group col-12">
                            <input type="hidden" value="" id="cmbPartnerId" name="cmbPartnerId" >
                            <label>Brand Logo One Preview</label>
                            <div>
                                <div class="input-group mb-2" id="eFilephoto1"></div> 
                                <input type="file" class="form-control-file"  name="file_logo1" onchange="previewThumnailImage(event)">
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>Brand Logo Two Preview</label>
                            <div>
                                <div class="input-group mb-2" id="eFilephoto2"></div> 
                                <input type="file" class="form-control-file"  name="file_logo2" onchange="previewThumnailImage(event)">
                            </div>
                        </div>

						<div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">BrandName:&nbsp;</label>
								<input type="text" class="form-control" id="eBrandName" name="txtBrandName">
							</div>
						</div>
                        

                        <div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">Slug:&nbsp;</label>
								<input type="text" class="form-control" id="eSlug" name="txtSlug">
							</div>
						</div>
					</div>

					<div class="submit-section float-right">
						<button type="button" class="btn btn-info" style="width:80px;" data-dismiss="modal">Cancle</button>
						<input class="btn btn-primary submit-btn" type="submit"  name="btnUpdate" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit Brand Partner Modal -->

<!-- Delete Brand Partner Modal -->
<div class="modal custom-modal fade" id="delete_partner" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Brand</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-brand-partner')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_partnerId" name="d_partner">
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
<!-- /Delete Brand Partner Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#partnerDbtn',function(){
            // alart("ok");
			var partner_id=$(this).val();
			$('#delete_partner').modal('show');
			$('#delete_partnerId').val(partner_id);
		});

		$(document).on('click','#editpartner',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-brand-partner/"+eid,
				success:function(response){
					$('#cmbPartnerId').val(eid);		
					$('#eBrandName').val(response.partner.brand_name);
                    $('#eSlug').val(response.partner.slug);
                    $("#eFilephoto1").html(
                        `<img src="img/${response.partner.brand_logo1}" width="100" class="img-fluid img-thumbnail">`);

                    $("#eFilephoto2").html(
                        `<img src="img/${response.partner.brand_logo2}" width="100" class="img-fluid img-thumbnail">`);
                    
					
				}
			});
		});
    
	});

    function previewThumnailImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview-img');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    };


$("#table-1").dataTable({
	"columnDefs": [
		{ "sortable": false, "targets": [2,3] }
	]
});

</script>
@endsection
@endsection