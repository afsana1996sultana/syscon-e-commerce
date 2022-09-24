@extends('layout.seller.master')
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
			<h1>Products</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
        <div class="breadcrumb-item">Products</div>
      </div>
		</div>
  </section>

  <div class="section-body">
    <a href="{{url('/seller/product/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add New</a> 
    <div class="row mt-4">
      <div class="col">
        <div class="card">
          <div class="card-body">   
            <div class="table-responsive">
             
              <table class="table table-striped" id="table-1">
                  <thead>                                 
                    <tr>
                      <th class="sorting sorting_asc">SN</th>
                      <th class="sorting">Name</th>
                      <th class="sorting">Price</th>
                      <th class="sorting">Photo</th>
                      <th class="sorting">Type</th>
                      <th class="sorting">Status</th>
                      <th class="sorting">Action</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    @forelse ($productseller as $productseller)
                    <tr class="odd"> 
                      <td>{{$productseller-> id}}</td>
                      <td><a href="">{{$productseller-> p_name}}</a></td>
                      <td>${{$productseller-> price}}</td>
                      <td><img src="{{asset('img/'.$productseller->img)}}" height="90px" width="90px" alt=""></td>
                      <td>{{$productseller-> section_name}}</td>
                      <td> 
                        @if($productseller->status==1)
                        <div>
                            <input type="checkbox" checked data-toggle="toggle" data-on="{{$productseller->s_name}}" data-off="InActive" data-onstyle="success" data-offstyle="danger">   
                        </div>
                        @elseif($productseller->status==2)
                        <div>
                            <input type="checkbox" checked data-toggle="toggle" data-on="{{$productseller->s_name}}" data-off="Active" data-onstyle="danger" data-offstyle="success">   
                        </div>
                        @else
                        <div>
                            <input type="checkbox" checked data-toggle="toggle" data-on="{{$productseller->s_name}}" data-off="Active" data-onstyle="warning" data-offstyle="success">   
                        </div>
                        @endif
                      </td>
                      <td>
                          <div class="btn-group btn-group-sm">
                            <a href="{{url('seller/product/'.$productseller->id.'/edit')}}" class="btn btn-primary"><i class="fas fa-edit" ></i></a>&nbsp;
                            <button type="button" value="{{$productseller->id}}" class="btn btn-danger" id="productsellerDbtn" ><i class="fas fa-trash"></i></button>&nbsp;
                            <div class="dropdown d-inline">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                                </button>
                                <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -131px, 0px);">
                                    <a class="dropdown-item has-icon" href="{{url('seller/product-gallery/'.$productseller->id)}}"><i class="far fa-image"></i> Image Gallery</a>
                                    <a class="dropdown-item has-icon" href="{{url('seller/product-highlight/'.$productseller->id)}}"><i class="fas fa-cog"></i>Highlight</a>
                                    <a class="dropdown-item has-icon" href="{{url('seller/product-variant/'.$productseller->id)}}"><i class="fas fa-cog"></i>Product Variant</a>
                                </div>
                            </div>
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

<!-- Delete Seller-Products Modal -->
<div class="modal custom-modal fade" id="delete_productseller" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Product</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-seller/product')}}" method="post" >
								@csrf
								@method("DELETE")
                  <input type="hidden" id="delete_productsellerId" name="d_productseller">
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
<!-- /Delete Seller-Products Modal -->

@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){
        $(document).on('click','#productsellerDbtn',function(){
        // alart("ok");
			var productseller_id=$(this).val();
			$('#delete_productseller').modal('show');
			$('#delete_productsellerId').val(productseller_id);
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