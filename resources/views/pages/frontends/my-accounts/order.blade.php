@extends('layout.frontends.master')
@section('main_content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{url('/')}}">home</a></li>
                        <li>My account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- my Order start  -->
<section class="main_content_area">
    <div class="container">
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                 @include('pages.frontends.my-accounts.user_navbar')
                </div>

                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div>
                            <h3>Orders</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Shipping Address</th>
                                            <th>Amount</th>
                                            <th>Payment Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order as $val)
                                        <tr class="odd">
                                            <td>{{$val-> order_id}}</td>
                                            <td>{{$val-> street_add}}</td>
                                            <td>৳ {{$val-> amount}}</td>
                                            <td>{{$val-> pay_method}}</td>
                                            <td>
                                                <div>
                                                    <a href="{{url('customer-dashboard/my-account/orders/view/'.$val->order_id)}}">view</a>&nbsp;
                                                </div>
                                            </td> 
                                        </tr>
                                        @empty
                                            <div colspan="14">No records found</div>
                                        @endforelse  
                                    </tbody>
                                </table>
                                <div class="shop_toolbar t_bottom">
                                    <div class="pagination">
                                    {{ $order->render("pagination::default") }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!---- my Order end---->
@endsection