@extends('layout.frontends.master')
@section('main_content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
.button a {
  float: right;
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
                    <div class="tab-content dashboard_content">
                        <div class="checkout_form">
                            <form action="{{url('customer-dashboard/my-account/address/update/'.$add->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h3>Addresses</h3>
                                <div class="row">

                                    <div class="col-lg-12 mb-20">
                                        <label>Full Name <span>*</span></label>
                                        <input type="text" name="txtFullName" class="form-control" value="{{$add->name}}">
                                    </div>
                                    

                                    <div class="col-12 mb-20">
                                        <label for="country">country <span>*</span></label>
                                        <select id="txtCountry" class="form-control" name="txtCountry">
                                            <option selected><-----Select Country----></option>
                                            @foreach ($country as $countries)
                                            <option value="{{ $countries->id }}" {{ ( $countries->id == $add->country) ? 'selected' : '' }}>
                                                {{ $countries->country_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <script>
                                        $('#txtCountry').change(function(){ 
                                                                       
                                            $.ajax({
                                            type:'GET',
                                            url:"{{route('for-state-cat')}}",
                                            data: {id:$(this).val(),},
                                            success:function(response){
                                           $('#txtState').html(response);
                                            }
                                            });

                                        })

                                    </script>

                                    <div class="col-12 mb-20">
                                        <label>State / County <span>*</span></label>
                                        <select id="txtState" class="form-control" name="txtState" required>
                                            <option selected><-----Select State----></option>
                                            @foreach ($state as $states)
                                            <option value="{{ $states->id }}" {{ ( $states->id == $add->state) ? 'selected' : '' }}>
                                                {{ $states->state_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <script>
                                        $(document).on("change","#txtState",function(e) {                         
                                            $.ajax({
                                            type:'GET',
                                            url:"{{route('for-city-cat')}}",
                                            data: {id:$(this).val(),},
                                            success:function(response){
                                            $('#txtCity').html(response);
                                            }
                                            });

                                        })
                                    </script>

                                    <div class="col-12 mb-20">
                                        <label>Town / City <span>*</span></label>
                                        <select id="txtCity" class="form-control" name="txtCity" required>
                                            <option selected><-----Select State----></option>
                                            @foreach ($city as $cities)
                                            <option value="{{ $cities->id }}" {{ ( $cities->id == $add->city) ? 'selected' : '' }}>
                                                {{ $cities->city_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 mb-20">
                                        <label>Street address <span>*</span></label>
                                        <input type="text" name="txtStreetAdd" class="form-control" value="{{$add->street_add}}">
                                    </div>


                                    <div class="col-lg-6 mb-20">
                                        <label>Date<span>*</span></label>
                                        <input type="date" name="txtDate" class="form-control" value="{{$add->date}}">
                                    </div>
                               
                                    <div class="col-lg-6 mb-20">
                                        <label>Phone<span>*</span></label>
                                        <input type="text" name="txtPhone" class="form-control" value="{{$add->phone}}">
                                    </div>

                                    <div class="col-lg-6 mb-20">
                                        <label> Email Address <span>*</span></label>
                                        <input type="email" name="txtEmail" class="form-control" value="{{$add->email}}">

                                    </div>
                                    <div class="col-12">
                                        <div class="order-notes">
                                            <label>Order Notes</label>
                                            <textarea name="txtOrderNote">{{$add->order_notes}}</textarea>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="save_button primary_btn default_button">
                                        <button type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- my account end   -->

@endsection