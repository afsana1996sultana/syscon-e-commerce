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
            <h1>All Orders</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">All Orders</div>
            </div>
        </div>
    </section>

    <div class="section-body">
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                    <th class="sorting">SN</th>
                                    <th class="sorting">Order Id </th>
                                    <th class="sorting">Customer Id</th>
                                    <th class="sorting">Address Id</th>
                                    <th class="sorting">Amount</th>
                                    <!-- <th class="sorting">Order Status</th> -->
                                    <th class="sorting">Payment</th>
                                    <th class="sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @forelse ($order as $order)
                                    <tr class="odd">
                                        <td>{{$order-> id}}</td>
                                        <td>{{$order-> order_id}}</td>
                                        <td>{{$order-> customer_id}}</td>
                                        <td>{{$order-> address_id}}</td>
                                        <td>৳ {{$order-> amount}}</td>
                                        <td>{{$order-> pay_method}}</td>
                                  
                              
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url('all-order/'.$order->id.'/show')}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>&nbsp;
                                                <button type="button" value="{{$order->id}}" class="btn btn-warning" id="editorder" ><i class="fas fa-truck" ></i> </button>
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

@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	// $(document).ready(function(){

	// 	$(document).on('click','#editorder',function(){
	// 		//  alert("ok");

	// 		var eid=$(this).val();
	// 		// alert(id);
	// 		$('#editModal').modal('show');
	// 		$.ajax({
	// 			type: "GET",
	// 			url: "/edit-all-order/"+eid,
	// 			success:function(response){
	// 				$('#cmbOrderId').val(eid);		
	// 				$('#ePaymentStatus').val(response.order.payment_sta);
    //                 $('#eOrderStatus').val(response.order.order_sta);
	// 			}
	// 		});
	// 	});
    
	// });

$("#table-1").dataTable({
	"columnDefs": [
		{ "sortable": false, "targets": [2,3] }
	]
});
</script>
@endsection
@endsection