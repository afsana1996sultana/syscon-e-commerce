@extends('layout.frontends.master')
@section('main_content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style type="text/css">
     body
    {
        background:#f2f2f2;
    }

    .payment
	{
		border:1px solid #f2f2f2;
		height:280px;
        border-radius:20px;
        background:#fff;
	}
   .payment_header
   {
	   background: #27AE60;
	   padding:20px;
       border-radius:20px 20px 0px 0px;
	   
   }
   
   .check
   {
	   margin:0px auto;
	   width:50px;
	   height:50px;
	   border-radius:100%;
	   background:#fff;
	   text-align:center;
   }
   
   .check i
   {
	   vertical-align:middle;
	   line-height:50px;
	   font-size:30px;
   }

    .content 
    {
        text-align:center;
    }

    .content  h1
    {
        font-size:25px;
        padding-top:25px;
    }

    .content  p
    {
        font-size:20px;
    }

    .content a
    {
        width:200px;
        height:35px;
        color:#fff;
        border-radius:30px;
        padding:5px 10px;
        background: #27AE60;
        transition:all ease-in-out 0.3s;
    }

    .content a:hover
    {
        text-decoration:none;
        background:#000;
    }
</style>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="payment">
                    <div class="payment_header">
                        <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
                    </div>
                    <div class="content">
                        <h1>Order Success !</h1>
                        <p>Your Order has been Successfully placed. </p>
                        <a href="{{url('/')}}">Go to Home</a>
                        <a href="{{route('customer-dashboard/my-account/orders')}}">Go to Order List</a>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
</div>
<!--breadcrumbs area end-->
@endsection