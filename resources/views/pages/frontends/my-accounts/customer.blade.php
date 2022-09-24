@extends('layout.frontends.master')
@section('main_content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<style>
.panel {
  box-shadow: 0 2px 0 rgba(0,0,0,0.05);
  border-radius: 0;
  border: 0;
  margin-bottom: 24px;
}

.panel-primary.panel-colorful {
  background-color: #5fa2dd;
  border-color: #5fa2dd;
  color: #fff;
}

.panel-danger.panel-colorful {
  background-color: #f76c51;
  border-color: #f76c51;
  color: #fff;
}

.panel-success.panel-colorful {
  background-color: #27AE60;
  border-color: #27AE60;
  color: #fff;
}

.panel-info.panel-colorful {
  background-color: #4ebcda;
  border-color: #4ebcda;
  color: #fff;
}

.panel-body {
  padding: 25px 20px;
}

.panel hr {
  border-color: rgba(0,0,0,0.1);
}

.mar-btm {
  margin-bottom: 15px;
}

h2, .h2 {
  font-size: 28px;
}

.small, small {
  font-size: 85%;
}

.text-sm {
  font-size: .9em;
}

.text-thin {
  font-weight: 300;
}

.text-semibold {
  font-weight: 600;
}
</style>
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
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade show active" id="dashboard">
                            <h3 style="padding-left:20px;">Dashboard </h3>
                        </div>
                    </div>

                     <!-- Thumnail Design -->
                     <div class="container bootstrap snippets bootdey">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel panel-primary panel-colorful">
                                    <div class="panel-body text-center">
                                        <p class="text-uppercase mar-btm text-sm">Visit Today</p>
                                        <i class="fa fa-users fa-2x"></i>
                                        <hr>
                                        <p class="h2 text-thin">254,487</p>
                                        <small><span class="text-semibold">7%</span> Higher than yesterday</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel panel-danger panel-colorful">
                                    <div class="panel-body text-center">
                                        <p class="text-uppercase mar-btm text-sm">Comments</p>
                                        <i class="fa fa-comment fa-2x"></i>
                                        <hr>
                                        <p class="h2 text-thin">873</p>
                                        <small><span class="text-semibold">7%</span> Higher than yesterday</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel panel-success panel-colorful">
                                    <div class="panel-body text-center">
                                        <p class="text-uppercase mar-btm text-sm">Todays Order</p>
                                        <i class="fa fa-shopping-cart fa-2x"></i>
                                        <hr>
                                        <p class="h2 text-thin">2,423</p>
                                        <small><span class="text-semibold">7%</span> Higher than yesterday</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel panel-info panel-colorful">
                                    <div class="panel-body text-center">
                                        <p class="text-uppercase mar-btm text-sm">Total Amount</p>
                                        <i class="fa fa-dollar fa-2x"></i>
                                        <hr>
                                        <p class="h2 text-thin">7,428</p>
                                        <small><span class="text-semibold"><i class="fa fa-dollar fa-fw"></i> 22,675</span> Total Earning</small>
                                    </div>
                                </div>
                            </div>        
                        </div>
                    </div>
                    <!-- Thumnail Design end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- my account end   -->
@endsection