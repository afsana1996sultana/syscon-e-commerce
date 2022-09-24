@extends('layout.frontends.master')
@section('main_content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{url('/')}}">home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--Checkout page section-->
<div class="Checkout_section mt-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="user-actions">
                    <h3>
                        <i class="fa fa-file-o" aria-hidden="true"></i>
                        Returning customer?
                        <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_login"
                            aria-expanded="true">Click here to login</a>
                    </h3>

                    <div id="checkout_login" class="collapse" data-parent="#accordion">
                        <div class="checkout_info">
                            <p>If you have shopped with us before, please enter your details in the boxes below. If
                                you are a new customer please proceed to the Billing & Shipping section.</p>
                            <form action="#">
                                <div class="form_group">
                                    <label>Username or email <span>*</span></label>
                                    <input type="text">
                                </div>
                                <div class="form_group">
                                    <label>Password <span>*</span></label>
                                    <input type="text">
                                </div>
                                <div class="form_group group_3 ">
                                    <button type="submit">Login</button>
                                    <label for="remember_box">
                                        <input id="remember_box" type="checkbox">
                                        <span> Remember me </span>
                                    </label>
                                </div>
                                <a href="#">Lost your password?</a>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="user-actions">
                    <h3>
                        <i class="fa fa-file-o" aria-hidden="true"></i>
                        Returning customer?
                        <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_coupon"
                            aria-expanded="true">Click here to enter your code</a>

                    </h3>
                    <div id="checkout_coupon" class="collapse" data-parent="#accordion">
                        <div class="checkout_info">
                            <form action="#">
                                <input placeholder="Coupon code" type="text">
                                <button type="submit">Apply coupon</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="checkout_form">
            <form action="{{url('/orders')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h3>Billing addresses</h3>
                        <div>
                            @forelse ($address as $val)
                            <div class="panel-default">
                                <input id="txtAddressId" name="txtAddressId" type="radio" value="{{$val-> id}}" required/>
                                <label><strong>{{$val-> name}}/ </strong></label><a href="{{url('customer-dashboard/my-account/address/edit/'.$val->id)}}" class="view">edit</a><br>
                                <span>{{$val-> phone}}</span>
                                <address>
                                    {{$val-> street_add}}<br>
                                    {{$val-> city_name}}<br>
                                    {{$val-> state_name}}<br>
                                    1212
                                    <p>{{$val-> country_name}}</p>
                                </address>
                            </div>
                            @empty
                                <div colspan="14"><a href="{{url('customer-dashboard/my-account/address/create')}}"><i class="fa fa-address-card"></i> Add Your Billing addresses </a></div>
                            @endforelse 
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <h3>Your order</h3>
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $total = 0 @endphp
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                    <tr data-id="{{ $id }}">
                                        <td> {{ $details['name'] }} <strong> × {{ $details['quantity'] }}</strong></td>
                                        <td> ৳ {{ $details['price'] * $details['quantity'] }}</td>
                                    </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Cart Subtotal</th>
                                        <td>৳ {{ $total }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td><strong>৳ 5.00</strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Order Total</th>
                                        <td><strong>৳ {{ $total }}</strong></td>
                                        <input type="hidden" name="total" value="{{ $total }}"> 
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="coupon_code left">
                            <h3>Coupon</h3>
                            <div class="coupon_inner">
                                <p>Enter your coupon code if you have one.</p>
                                <input style="width:300px;" placeholder="Coupon code" type="text" id="txtDiscount" name="txtDiscount">
                                <button type="submit">Apply coupon</button>
                            </div>
                        </div><br>

                        <div class="payment_method">
                            <div class="panel-default">
                                <input id="txtPayMethod" name="txtPayMethod" type="radio" value="COD" required/> 
                                <label for="payment">Cash On Delivery</label>
                            </div>

                            <!-- <div class="panel-default">
                                <input id="payment_defult" name="check_method" type="radio"
                                    data-bs-target="createp_account" required/>
                                <label for="payment_defult" data-bs-toggle="collapse" data-bs-target="#collapsedefult"
                                    aria-controls="collapsedefult">Others</label>

                                <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                    <div class="card-body1">
                                            <input id="payment_defult" name="check_method" type="radio"
                                            data-bs-target="createp_account" />
                                        <label for="payment_defult" data-bs-toggle="collapse" data-bs-target="#collapsedefult"
                                            aria-controls="collapsedefult">bKash <img src="assets/img/icon/papyel.png"
                                                alt=""></label>

                                                <input id="payment_defult" name="check_method" type="radio"
                                            data-bs-target="createp_account" />
                                        <label for="payment_defult" data-bs-toggle="collapse" data-bs-target="#collapsedefult"
                                            aria-controls="collapsedefult">Nogod <img src="assets/img/icon/papyel.png"
                                                alt=""></label>

                                                <input id="payment_defult" name="check_method" type="radio"
                                            data-bs-target="createp_account" />
                                        <label for="payment_defult" data-bs-toggle="collapse" data-bs-target="#collapsedefult"
                                            aria-controls="collapsedefult">Rocket <img src="assets/img/icon/papyel.png"
                                                alt=""></label>

                                                <input id="payment_defult" name="check_method" type="radio"
                                            data-bs-target="createp_account" />
                                        <label for="payment_defult" data-bs-toggle="collapse" data-bs-target="#collapsedefult"
                                            aria-controls="collapsedefult">Upai <img src="assets/img/icon/papyel.png"
                                                alt=""></label>
                                    </div>
                                </div>
                            </div> -->
                            <div class="order_button">
                                <button type="submit">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Checkout page section end-->
@endsection