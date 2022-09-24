<style>
/* style inputs and link buttons */
.btn {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin: 5px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; /* remove underline from anchors */
}

/* add appropriate colors to fb, twitter and google buttons */
.fb {
  background-color: #3B5998;
  color: white;
}

.twitter {
  background-color: #55ACEE;
  color: white;
}

.google {
  background-color: #dd4b39;
  color: white;
}
</style>

<!--sticky header area start-->
<div class="sticky_header_area sticky-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="logo">
                    <a href="{{url('/')}}"><img src="{{url('frontends/assets/img/logo/sysconLogo.webp')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="sticky_header_right menu_position">
                    <div class="main_menu">
                        <nav>
                            <ul>
                                <li><a class="active" href="{{url('/')}}">home</a></li>
                                @foreach ($visibility as $val)
                                    <?php 
                                    $Submenu = App\Models\Submenu::where('menu_id',$val->id)->get();
                                    ?>
                                    <li><a href="{{ $val->slug }}">{{ $val->menu_name }} 
                                        @if(sizeof($Submenu) >= 1) <i class="fa fa-angle-down"></i>@endif
                                        </a>
                                        @if(sizeof($Submenu) >= 1)
                                        <ul class="sub_menu pages"> 
                                            @foreach($Submenu as $subData)
                                            <li><a href="{{ $subData->slug }}">{{$subData->submenu_name}}</a>
                                            </li>
                                            @endforeach 
                                        </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <div class="middel_right_info">
                        <div class="header_wishlist">
                            <a href="{{ route('wishlist') }}"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            <span class="wishlist_quantity">{{ count((array) session('wishlist')) }}</span>
                        </div>
                        
                        <div class="mini_cart_wrapper">
                            <a href=""><i class="fa fa-shopping-bag"
                                    aria-hidden="true"></i></a>
                            <span class="cart_quantity">{{ count((array) session('cart')) }}</span>
                            <!--mini cart-->
                            <div class="mini_cart">
                                <div class="ajaxShow">
                                    @foreach((array) session('cart') as $id => $details)
                                        <div class="cart_item">
                                            <div class="cart_img">
                                                <a href="#"><img src="{{url('img/'.$details['image'])}}" alt=""></a>
                                            </div>
                                            
                                            <div class="cart_info">
                                                <a href="#">{{$details['name']}}</a>
                                                <p>Qty: {{$details['quantity']}} X <span> {{$details['price']}} </span></p>
                                            </div>

                                            <div class="cart_remove">
                                                <i class="ion-android-close remove-from-cart"></i>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mini_cart_footer">
                                    <div class="cart_button">
                                        <a href="{{ route('cart') }}">View cart</a>
                                    </div>

                                    {{--<div class="cart_button">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#checkout_box"
                                        title="quick view"> <span>Checkout</span></a>
                                    </div>--}}

                                    @if(\Auth::check())
                                        <div class="cart_button">
                                            <a href="{{route('checkout')}}"> <span>Checkout</span></a>
                                        </div>
                                        @else
                                        <div class="cart_button">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#checkout_box"
                                            title="quick view"> <span>Proceed to Checkout</span></a>
                                        </div>
                                    @endif   
                                </div>
                            </div>
                            <!--mini cart end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--sticky header area end-->

<!-- modal area start-->
<div class="modal fade" id="checkout_box" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <!--login area start-->
                        <div class="col-lg-6 col-md-6">
                            <div class="account_form">
                                <h2>login</h2>
                                <form action="#" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Username or email <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                <input type="email" class="form-control" name="txtEmail" required>
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <label>Passwords <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                                                <input type="password" class="form-control" name="txtPassword" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row pt-4">
                                        <div class="login_submit">
                                            <a href="#">Lost your password?</a>
                                            <label for="remember">
                                                <input id="remember" type="checkbox">
                                                Remember me
                                            </label>
                                            <button type="submit">login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--login area start-->
                        <!--Social Media login area start-->
                        <div class="col-lg-6 col-md-6">
                            <div class="container">
                                <form action="/action_page.php">
                                    <div class="row">
                                        <h3 style="text-align:center">Login with Social Media</h3>
                                        <div class="col">
                                            <a href="#" class="fb btn">
                                            <i class="fa fa-facebook fa-fw"></i> Login with Facebook
                                            </a>
                                            <a href="#" class="twitter btn">
                                            <i class="fa fa-twitter fa-fw"></i> Login with Twitter
                                            </a>
                                            <a href="#" class="google btn"><i class="fa fa-google fa-fw">
                                            </i> Login with Google+
                                            </a>
                                        </div>   
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--Social Media login area end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal area end-->