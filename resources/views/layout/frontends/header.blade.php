<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
        text-decoration: none;
        /* remove underline from anchors */
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

<!--header area start-->
<!--Offcanvas menu area start-->
<div class="off_canvars_overlay">

</div>
<div class="Offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                </div>
                <div class="Offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                    </div>
                    <div class="support_info">
                        <p>Telephone Enquiry: <a href="tel:0123456789">0123456789</a></p>
                    </div>
                    <div class="top_right text-right">
                        <ul>
                            <li><a href="my-account.html"> My Account </a></li>
                            <li><a href="checkout.html"> Checkout </a></li>
                        </ul>
                    </div>
                    <div class="search_container">
                        <form action="#">
                            <div class="hover_category">
                                <select class="select_option" name="select" id="categori">
                                    <option selected value="1">All Categories</option>
                                    <option value="2">Accessories</option>
                                    <option value="3">Accessories & More</option>
                                    <option value="4">Butters & Eggs</option>
                                    <option value="5">Camera & Video </option>
                                    <option value="6">Mornitors</option>
                                    <option value="7">Tablets</option>
                                    <option value="8">Laptops</option>
                                    <option value="9">Handbags</option>
                                    <option value="10">Headphone & Speaker</option>
                                    <option value="11">Herbs & botanicals</option>
                                    <option value="12">Vegetables</option>
                                    <option value="13">Shop</option>
                                    <option value="14">Laptops & Desktops</option>
                                    <option value="15">Watchs</option>
                                    <option value="16">Electronic</option>
                                </select>
                            </div>
                            <div class="search_box">
                                <input placeholder="Search product..." type="text">
                                <button type="submit">Search</button>
                            </div>
                        </form>
                    </div>

                    <div class="middel_right_info">
                        <div class="header_wishlist">
                            <a href="wishlist.html"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            <span class="wishlist_quantity">3</span>
                        </div>
                        <div class="mini_cart_wrapper">
                            <a href="javascript:void(0)"><i class="fa fa-shopping-bag" aria-hidden="true"></i>$147.00 <i class="fa fa-angle-down"></i></a>
                            <span class="cart_quantity">2</span>
                            <!--mini cart-->
                            <div class="mini_cart">
                                <div class="cart_item">
                                    <div class="cart_img">
                                        <a href="#"><img src="{{url('frontends/assets/img/s-product/product.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="cart_info">
                                        <a href="#">Sit voluptatem rhoncus sem lectus</a>
                                        <p>Qty: 1 X <span> $60.00 </span></p>
                                    </div>
                                    <div class="product_remove">
                                        <a class="remove-from-cart"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </div>
                                <div class="cart_item">
                                    <div class="cart_img">
                                        <a href="#"><img src="{{url('frontends/assets/img/s-product/product2.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="cart_info">
                                        <a href="#">Natus erro at congue massa commodo</a>
                                        <p>Qty: 1 X <span> $60.00 </span></p>
                                    </div>
                                    <div class="cart_remove remove-from-cart">
                                        <a href="#"><i class="ion-android-close"></i></a>
                                    </div>
                                </div>
                                <div class="mini_cart_table">
                                    <div class="cart_total">
                                        <span>Sub total:</span>
                                        <span class="price">$138.00</span>
                                    </div>
                                    <div class="cart_total mt-10">
                                        <span>total:</span>
                                        <span class="price">$138.00</span>
                                    </div>
                                </div>

                                <div class="mini_cart_footer">
                                    <div class="cart_button">
                                        <a href="cart.html">View cart</a>
                                    </div>
                                    <div class="cart_button">
                                        <a href="checkout.html">Checkout</a>
                                    </div>

                                </div>

                            </div>
                            <!--mini cart end-->
                        </div>
                    </div>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children active">
                                <a href="#">Home</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Home 1</a></li>
                                    <li><a href="index-2.html">Home 2</a></li>
                                    <li><a href="index-3.html">Home 3</a></li>
                                    <li><a href="index-4.html">Home 4</a></li>
                                    <li><a href="index-5.html">Home 5</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Shop</a>
                                <ul class="sub-menu">
                                    <li class="menu-item-has-children">
                                        <a href="#">Shop Layouts</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop.html">shop</a></li>
                                            <li><a href="shop-fullwidth.html">Full Width</a></li>
                                            <li><a href="shop-fullwidth-list.html">Full Width list</a></li>
                                            <li><a href="shop-right-sidebar.html">Right Sidebar </a></li>
                                            <li><a href="shop-right-sidebar-list.html"> Right Sidebar list</a></li>
                                            <li><a href="shop-list.html">List View</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">other Pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="cart.html">cart</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="my-account.html">my account</a></li>
                                            <li><a href="404.html">Error 404</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Product Types</a>
                                        <ul class="sub-menu">
                                            <li><a href="product-details.html">product details</a></li>
                                            <li><a href="product-sidebar.html">product sidebar</a></li>
                                            <li><a href="product-grouped.html">product grouped</a></li>
                                            <li><a href="variable-product.html">product variable</a></li>
                                            <li><a href="product-countdown.html">product countdown</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog.html">blog</a></li>
                                    <li><a href="blog-details.html">blog details</a></li>
                                    <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                    <li><a href="blog-sidebar.html">blog left sidebar</a></li>
                                    <li><a href="blog-no-sidebar.html">blog no sidebar</a></li>
                                </ul>

                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">pages </a>
                                <ul class="sub-menu">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="services.html">services</a></li>
                                    <li><a href="privacy-policy.html">privacy policy</a></li>
                                    <li><a href="faq.html">Frequently Questions</a></li>
                                    <li><a href="contact.html">contact</a></li>
                                    <li><a href="login.html">login</a></li>
                                    <li><a href="404.html">Error 404</a></li>
                                    <li><a href="compare.html">Compare</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="my-account.html">my account</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="about.html">about Us</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="contact.html"> Contact Us</a>
                            </li>
                        </ul>
                    </div>

                    <div class="Offcanvas_footer">
                        <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
                        <ul>
                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Offcanvas menu area end-->
<header>
    <div class="main_header">
        <!--header top start-->
        <div class="header_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="top_right text-right">
                            <ul>
                                @foreach ($topbarcontact as $val)
                                <li>Telephone Enquiry: <a href="tel:+8801818-497401">{{ $val->phone }}</a></li>
                                <li><a href="mailto:info@sysconbd.com"><i class="fa fa-envelope"></i> {{ $val->email }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="top_right text-right">
                            <ul>
                                @if(\Auth::check())
                                <li><a href="{{route('customer-dashboard/my-account')}}"><i class="fa fa-user"></i> My Account </a></li>
                                <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout </a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                                @else
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#checkout_box"><i class="fa fa-user"></i> Login / Register</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header top end-->

        <!--header middel start-->
        <div class="header_middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="logo">
                            <a href="{{url('/')}}"><img src="{{url('frontends/assets/img/logo/sysconLogo.webp')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6">
                        <div class="middel_right">
                            <div class="search_container">
                                <form action="#">
                                    <div class="hover_category">
                                        <select class="select_option" name="select" id="categori1">
                                            <option selected value="1">All Categories</option>
                                            @foreach ($categories as $val)
                                            <option value="2">{{ $val->c_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="search_box">
                                        <input placeholder="Search product..." type="text">
                                        <button type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                            <div class="middel_right_info">
                                <div class="header_wishlist">
                                    <a href="{{ route('wishlist') }}"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                    <span class="wishlist_quantity">{{ count((array) session('wishlist')) }}</span>
                                </div>

                                <div class="mini_cart_wrapper">
                                    <a href=""><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                    <span class="cart_quantity">{{ count((array) session('cart')) }}</span>
                                    <!--mini cart-->
                                    <div class="mini_cart">
                                        <div class="ajaxShow">
                                            @foreach((array) session('cart') as $id => $details)
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="{{URL::to('product_details/'.$details['slug'])}}"><img src="{{url('img/'.$details['image'])}}" alt=""></a>
                                                </div>

                                                <div class="cart_info">
                                                    <a href="{{URL::to('product_details/'.$details['slug'])}}">{{$details['name']}}</a>
                                                    <p>Qty: {{$details['quantity']}} X <span> {{$details['price']}} </span></p>
                                                </div>

                                                <div class="cart_remove remove-from-cart">
                                                    <i class="ion-android-close"></i>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                        <div class="mini_cart_footer">
                                            <div class="cart_button">
                                                <a href="{{ route('cart') }}">View cart</a>
                                            </div>

                                            <div class="cart_button">
                                                <a href="{{route('checkout')}}"> <span>Checkout</span></a>
                                            </div>
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
        <!--header middel end-->

        <!--header bottom satrt-->
        <div class="main_menu_area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-12">
                        <div class="categories_menu">
                            <div class="categories_title">
                                <h2 class="categori_toggle">ALL CATEGORIES</h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul>
                                    @foreach ($categories as $val)
                                    <?php
                                    $Subcat = App\Models\Subcategory::where('category', $val->id)->get();
                                    ?>
                                    <li class="menu_item_children"><a href="{{url('product_category/'.$val->slug)}}">{{ $val->c_name }}
                                            @if(sizeof($Subcat) >= 1) <i class="fa fa-angle-right"></i>@endif
                                        </a>
                                        @if(sizeof($Subcat) >= 1)
                                        <ul class="categories_mega_menu">

                                            @foreach($Subcat as $subData)
                                            <li class="menu_item_children"><a href="{{url('product_sub_category/'.$subData->slug)}}">{{$subData->sub_categoryname}}</a>

                                                <?php
                                                $childcat = App\Models\Childcategory::where('sub_category', $subData->id)->get();
                                                ?>
                                                @if(sizeof($childcat) >= 1)
                                                <ul class="categorie_sub_menu">
                                                    @foreach($childcat as $chData)
                                                    <li><a href="{{url('product_child_category/'.$chData->slug)}}">{{$chData->child_category}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach

                                    <li id="cat_toggle" class="has-sub"><a href="#"> More Categories</a>
                                        <ul class="categorie_sub">
                                            <li><a href="#">Hide Categories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="main_menu menu_position">
                            <nav>
                                <ul>
                                    <li><a class="active" href="{{url('/')}}">home</a></li>
                                    @foreach ($visibility as $val)
                                    <?php
                                    $Submenu = App\Models\Submenu::where('menu_id', $val->id)->get();
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
                    </div>
                </div>
            </div>
        </div>
        <!--header bottom end-->
    </div>
</header>
<!--header area end-->


<!-- login modal area start-->
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
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Username or email <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                <input type="email" class="form-control" name="email" required>
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <label>Passwords <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                                                <input type="password" class="form-control" name="password" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row pt-4">
                                        <div class="login_submit">
                                            <a href="{{route('checkout')}}">Get Registation</a>
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
                                <form action="#" method="post" enctype="multipart/form-data">
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
<!-- login modal area end-->