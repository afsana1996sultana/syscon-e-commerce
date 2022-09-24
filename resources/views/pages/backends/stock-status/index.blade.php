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
			<h1>Stock Status</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Stock Status</div>
            </div>
		</div>
    </section>
     <!-- /Page Header -->
	<div class="row">
        <div class="col-auto float-right ml-auto pb-2" >
            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add_stockstatus"><i class="fa fa-plus"></i>Add New</a> 
        </div>
	</div>
	<!-- /Page Header -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive table-invoice">
                        <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="dataTable_info">
							<thead>
								<tr>
								<th class="sorting sorting_asc">No</th>
								<th class="sorting">Stock Status</th>
								<th class="sorting">Action</th>
								</tr>
							</thead>
							<tbody> 
								@forelse ($stockstatus as $stockstatus)
								<tr class="odd">
									<td>{{$stockstatus-> id}}</td>
									<td>{{$stockstatus-> stockstatus_name}}</td>
									<td class="text-right py-0 align-middle">
										<div class="btn-group btn-group-sm">
											<button type="button" value="{{$stockstatus->id}}" class="btn btn-primary" id="editstockstatus" ><i class="fas fa-edit" ></i> </button>&nbsp;
											<button type="button" value="{{$stockstatus->id}}" class="btn btn-danger" id="stockstatusDbtn" ><i class="fas fa-trash"></i> </button>
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
<!-- Add Stock Status Modal -->
<div id="add_stockstatus" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit">Add Stock Status</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- add member--}}
            <div class="modal-body">
                <form action="{{route('stock-status.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Stock Status:&nbsp;</label>
                                <input type="text" class="form-control" id="txtStockStatus" name="txtStockStatus"required>
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
<!-- /Add Stock Status Modal -->

<!-- Edit Stock Status Modal -->
<div id="editModal" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Stock Status</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{url('stock-status-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				
					<div class="row">
						<div class="col-sm-12">
							<div class="input-group mb-4">
								<input type="hidden" value="" id="cmbStockstatusId" name="cmbStockstatusId" >
								<label class="col-form-label">Stock Status:&nbsp;</label>
								<input type="text" class="form-control" id="eStockStatus" name="txtStockStatus" required>
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
<!-- /Edit Stock Status Modal -->
<!-- Delete Stock Status Modal -->
<div class="modal custom-modal fade" id="delete_stockstatus" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Stock Status</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-stock-status')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_stockstatusId" name="d_stockstatus">
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
<!-- /Delete Stock Status Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#stockstatusDbtn',function(){
            // alart("ok");
			var stockstatus_id=$(this).val();
			$('#delete_stockstatus').modal('show');
			$('#delete_stockstatusId').val(stockstatus_id);
		});

		$(document).on('click','#editstockstatus',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-stock-status/"+eid,
				success:function(response){
					$('#cmbStockstatusId').val(eid);		
					$('#eStockStatus').val(response.stockstatus.stockstatus_name);
					
				}
			});
		});
    
	});
	$(document).ready(function () {
    $('#dataTable').DataTable();
});

</script>
@endsection
@endsection