@extends('layout.frontends.master')
@section('main_content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
.emp-profile{
    padding: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #D4EFDF;
    height:250px;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 100%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
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

                <div class="col-sm-12 col-md-8 col-lg-8">
                    <div class="tab-content dashboard_content">         
                        <div>
                            <h3>My Profile </h3>
                            <!-- my profile start   -->
                            <div class="container emp-profile">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="profile-head">
                                                <h5>{{Auth::user()->name}} </h5>         
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row pb-3">
                                                <div class="col-md-6">
                                                    <label>User Id</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>#00{{Auth::user()->id}}</p>
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-md-6">
                                                    <label>Name</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{Auth::user()->name}}</p>
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-md-6">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{Auth::user()->email}}</p>
                                                </div>
                                            </div>         
                                        </div>
                                    </div>
                                </form>           
                            </div>
                            <!-- my profile end   -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- my account end   -->
@endsection