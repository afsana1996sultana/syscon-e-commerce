@extends('layout.frontends.master')
@section('main_content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <style>
.button a {
  float: right;
}
</style> -->
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

<!-- my account start  -->
<section class="main_content_area">
    <div class="container">
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    @include('pages.frontends.my-accounts.user_navbar')
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <div class="tab-content dashboard_content">
                        <div>
                            <div class="row">
                                <div class="col-sm-12 col-md-10 col-lg-10">
                                    <h3>Addresses</h3>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2 pl-2 pb-2">
                                    <button><a href="{{url('customer-dashboard/my-account/address/create')}}"><i class="fa fa-plus"></i> Add New</a></button>
                                </div>
                                
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Phone No</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($add as $val)
                                        <tr class="odd">
                                            <td>{{$val-> id}}</td>
                                            <td>{{$val-> name}}</td>
                                            <td>{{$val-> date}}</td>
                                            <td>{{$val-> phone}}</td>
                                            <td>
                                                <div>
                                                    <a href="{{url('customer-dashboard/my-account/address/edit/'.$val->id)}}"><i class="fa fa-edit"></i></a>&nbsp;
                                                    <a class="remove-from-add"><i class="fa fa-trash-o"></i></a>
                                                    <!-- <td class="product_remove"><a class="remove-from-wishlist"><i class="fa fa-trash-o"></i></a></td> -->
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
                                    {{ $add->render("pagination::default") }}
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
<!----- my account end ---->
@endsection