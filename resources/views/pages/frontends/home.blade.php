@extends('layout.frontends.master')
@section('main_content')
<!--slider area start-->
<section class="slider_section mb-70">
    <div class="slider_area owl-carousel">
        @foreach($slider as $val)
        <div class="single_slider d-flex align-items-center" data-bgimg="{{ asset('img/' . $val->img) }}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider_content">
                            <h1>{{$val->s_title}}</h1>
                            <h2>{{$val->s_description}}</h2>
                            <p>exclusive offer <span> 20% off </span> this week</p>
                            <a class="button" href="{{url('/shop')}}">shopping now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!--slider area end-->


<!--shipping area start-->
<section class="shipping_area mb-70">
    <div class="container">
        <div class=" row">
            <div class="col-lg-3 col-md-6">
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <img src="{{url('frontends/assets/img/about/shipping1.png')}}" alt="">
                    </div>
                    <div class="shipping_content">
                        <h2>Free Shipping</h2>
                        <p>Free shipping on all US order</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <img src="{{url('frontends/assets/img/about/shipping2.png')}}" alt="">
                    </div>
                    <div class="shipping_content">
                        <h2>Support 24/7</h2>
                        <p>Contact us 24 hours a day</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <img src="{{url('frontends/assets/img/about/shipping3.png')}}" alt="">
                    </div>
                    <div class="shipping_content">
                        <h2>100% Money Back</h2>
                        <p>You have 30 days to Return</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <img src="{{url('frontends/assets/img/about/shipping4.png')}}" alt="">
                    </div>
                    <div class="shipping_content">
                        <h2>Payment Secure</h2>
                        <p>We ensure secure payment</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--shipping area end-->


<!--banner area start-->
<div class="banner_area mb-40">
    <div class="container">
        <div class="row">
            @foreach($advertisement as $val)
            <div class="col-lg-3 col-md-3">
                <div class="single_banner mb-30">
                    <div class="banner_thumb">
                        <a href="{{url('/shop')}}"><img src="{{ asset('img/' . $val->homepage_first_imgone) }}" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="single_banner mb-30">
                    <div class="banner_thumb">
                        <a href="{{url('/shop')}}"><img src="{{ asset('img/' . $val->homepage_first_imgtwo) }}" alt=""></a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-lg-3 col-md-3">
                <div class="single_banner mb-30">
                    <div class="banner_thumb">
                        <a href="{{url('/shop')}}"><img src="{{url('frontends/assets/img/bg/banner3.jpg')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner area end-->


<!--product area start-->
<section class="product_area mb-46">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Hot Deals Products</h2>
                </div>
            </div>
        </div>
        <div class="product_carousel product_column5 owl-carousel">
            @foreach($products as $val)
            <article class="single_product">
                <figure>
                    <div class="product_thumb">
                        <a class="primary_img" href="{{URL::to('product_details/'.$val->slug)}}"><img
                                src="{{ asset('img/' . $val->img) }}" alt=""></a>
                        <a class="secondary_img" href="{{URL::to('product_details/'.$val->slug)}}"><img
                                src="{{ asset('img/' . $val->banner_img) }}" alt=""></a>
                        <div class="label_product">
                            <span class="label_sale">sale</span>
                        </div>
                        <div class="action_links">
                            <ul>
                                <li class="wishlist"><a href="#"class="addToWishlist" data-id="{{$val->id}}" title="Add to Wishlist"><i
                                        class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                <li class="compare"><a href="#" title="compare"><span class="ion-levels"></span></a>
                                </li>
                                <li class="quick_button" ><a  class="quick_view" id="{{$val->slug}}"  
                                        title="quick view"> <span class="ion-ios-search-strong"></span></a></li>
                            </ul>
                        </div>
                        <div class="add_to_cart">
                            <a href="#" class="addToCart" data-id="{{$val->id}}" title="add to cart">Add to cart</a>
                        </div>
                        <div class="product_timing">
                            <div data-countdown="2023/12/15"></div>
                        </div>
                    </div>
                    <figcaption class="product_content">
                        <div class="price_box">
                            <span class="old_price">৳ {{$val->price}}</span>
                            <span class="current_price">৳ {{$val->offer_price}}</span>
                        </div>
                        <h3 class="product_name"><a href="{{URL::to('product_details/'.$val->slug)}}">{{ \Illuminate\Support\Str::limit($val->p_name, 30, $end='...') }}</a></h3>
                    </figcaption>
                </figure>
            </article>
            @endforeach
        </div>
    </div>
</section>
<!--product area end-->


<!--banner area start-->
<div class="banner_area mb-40">
    <div class="container">
        <div class="row">
            @foreach($advertisement as $val)
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner mb-30">
                        <div class="banner_thumb">
                            <a href="{{url('/shop')}}"><img src="{{ asset('img/' . $val->homepage_second_imgone) }}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner mb-30">
                        <div class="banner_thumb">
                            <a href="{{url('/shop')}}"><img src="{{ asset('img/' . $val->homepage_second_imgtwo) }}" alt=""></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!--banner area end-->


<!--top- category area start-->
<section class="top_category_product mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3">
                <div class="top_category_header">
                    <h3>Top Categories This Week</h3>
                    <p>Aliquam eget consectetuer habitasse interdum.</p>
                    <a href="shop.html">Show All Categories</a>
                </div>
            </div>
            <div class="col-lg-10 col-md-9">
                <div class="top_category_container category_column5 owl-carousel">
                    <div class="col-lg-2">
                        <article class="single_category">
                            <figure>
                                <div class="category_thumb">
                                    <a href="{{url('/shop')}}"><img src="{{url('frontends/assets/img/s-product/category1.jpg')}}" alt=""></a>
                                </div>
                                <figcaption class="category_name">
                                    <h3><a href="{{url('/shop')}}">Games & Consoles </a></h3>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-2">
                        <article class="single_category">
                            <figure>
                                <div class="category_thumb">
                                    <a href="{{url('/shop')}}"><img src="{{url('frontends/assets/img/s-product/category2.jpg')}}" alt=""></a>
                                </div>
                                <figcaption class="category_name">
                                    <h3><a href="{{url('/shop')}}">Home Accessories</a></h3>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-2">
                        <article class="single_category">
                            <figure>
                                <div class="category_thumb">
                                    <a href="{{url('/shop')}}"><img src="{{url('frontends/assets/img/s-product/category3.jpg')}}" alt=""></a>
                                </div>
                                <figcaption class="category_name">
                                    <h3><a href="{{url('/shop')}}">TV & Audio</a></h3>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-2">
                        <article class="single_category">
                            <figure>
                                <div class="category_thumb">
                                    <a href="{{url('/shop')}}"><img src="{{url('frontends/assets/img/s-product/category4.jpg')}}" alt=""></a>
                                </div>
                                <figcaption class="category_name">
                                    <h3><a href="{{url('/shop')}}">Games & Consoles </a></h3>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-2">
                        <article class="single_category">
                            <figure>
                                <div class="category_thumb">
                                    <a href="{{url('/shop')}}"><img src="{{url('frontends/assets/img/s-product/category5.jpg')}}" alt=""></a>
                                </div>
                                <figcaption class="category_name">
                                    <h3><a href="{{url('/shop')}}">Laptop & Tablets </a></h3>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-2">
                        <article class="single_category">
                            <figure>
                                <div class="category_thumb">
                                    <a href="{{url('/shop')}}"><img src="{{url('frontends/assets/img/s-product/category2.jpg')}}" alt=""></a>
                                </div>
                                <figcaption class="category_name">
                                    <h3><a href="{{url('/shop')}}">Home Accessories</a></h3>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--top- category area end-->


<!--featured product area start-->
<section class="featured_product_area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Featured Products</h2>
                </div>
            </div>
        </div>
        <div class="row featured_container featured_column3">
            @foreach($product as $val)
            <div class="col-lg-4"> 
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="{{URL::to('product_details/'.$val->slug)}}"><img
                                    src="{{ asset('img/' . $val->img) }}" alt=""></a>
                            <a class="secondary_img" href="{{URL::to('product_details/'.$val->slug)}}"><img
                                    src="{{ asset('img/' . $val->banner_img) }}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">sale</span>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <div class="price_box">
                                <span class="old_price">৳ {{$val->price}}</span>
                                <span class="current_price">৳ {{$val->offer_price}}</span>
                            </div>
                            <h3 class="product_name"><a href="{{URL::to('product_details/'.$val->slug)}}">{{ \Illuminate\Support\Str::limit($val->p_name, 30, $end='...') }}</a></h3>
                            <div class="add_to_cart">
                                <a href="#" class="addToCart" data-id="{{$val->id}}" title="add to cart">Add to cart</a>
                            </div>
                        </figcaption>
                    </figure>
                </article> 
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--featured product area end-->


<!--product area start-->
<section class="product_area mb-46">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Computer & Laptop</h2>
                </div>
            </div>
        </div>
        <div class="product_carousel product_column5 owl-carousel">
            @foreach($laptops as $val)
            <article class="single_product">
                <figure>
                    <div class="product_thumb">
                        <a class="primary_img" href="{{URL::to('product_details/'.$val->slug)}}"><img
                                src="{{ asset('img/' . $val->img) }}" alt=""></a>
                        <a class="secondary_img" href="{{URL::to('product_details/'.$val->slug)}}"><img
                                src="{{ asset('img/' . $val->banner_img) }}" alt=""></a>
                        <div class="label_product">
                            <span class="label_sale">sale</span>
                        </div>
                        <div class="action_links">
                            <ul>
                                <li class="wishlist"><a href="#"class="addToWishlist" data-id="{{$val->id}}" title="Add to Wishlist"><i
                                        class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                <li class="compare"><a href="#" title="compare"><span class="ion-levels"></span></a>
                                </li>
                                <li class="quick_button" ><a  class="quick_view" id="{{$val->slug}}"  
                                        title="quick view"> <span class="ion-ios-search-strong"></span></a></li>
                            </ul>
                        </div>
                        <div class="add_to_cart">
                            <a href="#" class="addToCart" data-id="{{$val->id}}" title="add to cart">Add to cart</a>
                        </div>
                    </div>
                    <figcaption class="product_content">
                        <div class="price_box">
                            <span class="old_price">৳ {{$val->price}}</span>
                            <span class="current_price">৳ {{$val->offer_price}}</span>
                        </div>

                        <h3 class="product_name"><a href="{{URL::to('product_details/'.$val->slug)}}">
                            {{ \Illuminate\Support\Str::limit($val->p_name, 30, $end='...') }}</a></h3>
                    </figcaption>
                </figure>
            </article>
            @endforeach
        </div>
    </div>
</section>
<!--product area end-->


<!--banner area start-->
<div class="banner_area mb-40">
    <div class="container">
        <div class="row">
            @foreach($advertisement as $val)
            <div class="col-lg-9 col-md-9">
                <div class="single_banner mb-30">
                    <div class="banner_thumb">
                        <a href="{{url('/shop')}}"><img src="{{ asset('img/' . $val->homepage_third_imgone) }}" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="single_banner mb-30">
                    <div class="banner_thumb">
                        <a href="{{url('/shop')}}"><img src="{{ asset('img/' . $val->homepage_third_imgtwo) }}" alt=""></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--banner area end-->


<!--product area start-->
<section class="featured_product_area mb-46">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>TV & Home Appliances</h2>
                </div>
            </div>
        </div>
        <div class="product_carousel product_column5 owl-carousel">
            @foreach($appliances as $val)
            <article class="single_product">
                <figure>
                    <div class="product_thumb">
                        <a class="primary_img" href="{{URL::to('product_details/'.$val->slug)}}"><img
                                src="{{ asset('img/' . $val->img) }}" alt=""></a>
                        <a class="secondary_img" href="{{URL::to('product_details/'.$val->slug)}}"><img
                                src="{{ asset('img/' . $val->banner_img) }}" alt=""></a>
                        <div class="label_product">
                            <span class="label_sale">sale</span>
                        </div>
                        <div class="action_links">
                            <ul>
                                <li class="wishlist"><a href="#"class="addToWishlist" data-id="{{$val->id}}" title="Add to Wishlist"><i
                                        class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                <li class="compare"><a href="#" title="compare"><span class="ion-levels"></span></a>
                                </li>
                                <li class="quick_button" ><a  class="quick_view" id="{{$val->slug}}"  
                                        title="quick view"> <span class="ion-ios-search-strong"></span></a></li>
                            </ul>
                        </div>
                        <div class="add_to_cart">
                            <a href="#" class="addToCart" data-id="{{$val->id}}" title="add to cart">Add to cart</a>
                        </div>
                    </div>
                    <figcaption class="product_content">
                        <div class="price_box">
                            <span class="old_price">৳ {{$val->price}}</span>
                            <span class="current_price">৳ {{$val->offer_price}}</span>
                        </div>

                        <h3 class="product_name"><a href="{{URL::to('product_details/'.$val->slug)}}">
                            {{ \Illuminate\Support\Str::limit($val->p_name, 30, $end='...') }}</a></h3>
                    </figcaption>
                </figure>
            </article>
            @endforeach
        </div>
    </div>
</section>
<!--product area end-->


 <!--banner area start-->
 <div class="banner_area mb-70">
    <div class="container">
        <div class="row">
            @foreach($advertisement as $val)
            <div class="col-12">
                <div class="single_banner">
                    <div class="banner_thumb">
                        <a href="{{url('/shop')}}"><img src="{{ asset('img/' . $val->shoppage_img) }}" alt=""></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--banner area end-->


<!--product area start-->
<section class="product_area mb-46">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="product_left_area">
                    <div class="section_title">
                        <h2>Smartphone & Tablets</h2>
                    </div>
                    <div class="product_carousel product_column4 owl-carousel">
                        @foreach($smartphones as $val)
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{URL::to('product_details/'.$val->slug)}}"><img
                                            src="{{ asset('img/' . $val->img) }}" alt=""></a>
                                    <a class="secondary_img" href="{{URL::to('product_details/'.$val->slug)}}"><img
                                            src="{{ asset('img/' . $val->banner_img) }}" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">sale</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist"><a href="#" class="addToWishlist" data-id="{{$val->id}}" title="Add to Wishlist"><i
                                                    class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                            <li class="compare"><a href="#" title="compare"><span
                                                    class="ion-levels"></span></a></li>
                                            <li class="quick_button" ><a  class="quick_view" id="{{$val->slug}}"  
                                                    title="quick view"> <span class="ion-ios-search-strong"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="#" class="addToCart" data-id="{{$val->id}}" title="add to cart">Add to cart</a>
                                    </div>
                                </div>
                                <figcaption class="product_content">
                                    <div class="price_box">
                                        <span class="old_price">৳ {{$val->price}}</span>
                                        <span class="current_price">৳ {{$val->offer_price}}</span>
                                    </div>
                                    <h3 class="product_name"><a href="{{URL::to('product_details/'.$val->slug)}}">
                                        {{ \Illuminate\Support\Str::limit($val->p_name, 30, $end='...') }}</a></h3>
                                </figcaption>
                            </figure>
                        </article>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-12">
                <!--testimonials section start-->
                <div class="testimonial_are">
                    <div class="section_title">
                        <h2>Testimonials</h2>
                    </div>
                    <div class="testimonial_active owl-carousel">
                        <article class="single_testimonial">
                            <figure>
                                <div class="testimonial_thumb">
                                    <a href="#"><img src="{{url('frontends/assets/img/about/testimonial1.jpg')}}" alt=""></a>
                                </div>
                                <figcaption class="testimonial_content">
                                    <p>Support and response has been amazing, helping me with several issues I came
                                        across and got them solved almost the same day. A pleasure to work with
                                        them!</p>
                                    <h3><a href="#">Kathy Young</a><span> - CEO of SunPark</span></h3>
                                </figcaption>

                            </figure>
                        </article>
                        <article class="single_testimonial">
                            <figure>
                                <div class="testimonial_thumb">
                                    <a href="#"><img src="{{url('frontends/assets/img/about/testimonial2.jpg')}}" alt=""></a>
                                </div>
                                <figcaption class="testimonial_content">
                                    <p>Perfect Themes and the best of all that you have many options to choose! Best
                                        Support team ever! Thank you very much!</p>
                                    <h3><a href="#">John Sullivan</a><span> - Customer</span></h3>
                                </figcaption>

                            </figure>
                        </article>
                        <article class="single_testimonial">
                            <figure>
                                <div class="testimonial_thumb">
                                    <a href="#"><img src="{{url('frontends/assets/img/about/testimonial3.jpg')}}" alt=""></a>
                                </div>
                                <figcaption class="testimonial_content">
                                    <p>Code, template and others are very good. The support has served me
                                        immediately and solved my problems when I need help. Are to be
                                        congratulated.</p>
                                    <h3><a href="#">Jenifer Brown</a><span> - Manager of AZ</span></h3>
                                </figcaption>

                            </figure>
                        </article>
                    </div>
                </div>
                <!--testimonials section end-->
            </div>
        </div>
    </div>
</section>
<!--product area end-->


<!--blog area start-->
<section class="blog_section mb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>From the Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="blog_carousel blog_column4 owl-carousel">
                @foreach($blog as $val)
                <div class="col-lg-3">  
                    <article class="single_blog">  
                        <figure>
                            <div class="blog_thumb">
                                <a href="{{URL::to('blog_details/'.$val->slug)}}"><img src="{{ asset('img/' . $val->thumbnail_img) }}" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <p class="post_author">By <a href="">admin</a> /{{$val->published_date}}</p>
                                <h3 class="post_title"><a href="{{URL::to('blog_details/'.$val->slug)}}">
                                   {{ \Illuminate\Support\Str::limit($val->title, 30, $end='...') }}
                                </a></h3>
                            </figcaption>
                        </figure>
                    </article> 
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--blog area end-->


<!--brand area start-->
<div class="brand_area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="brand_container owl-carousel">
                    @foreach($brand_partner as $val)
                    <div class="brand_items">
                        <div class="single_brand">
                            <a href="#"><img src="{{ asset('img/' . $val->brand_logo1) }}" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="{{ asset('img/' . $val->brand_logo2) }}" alt=""></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--brand area end-->


<!--modal area start-->
<div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal_body">
                <div class="container">                 
                   <div id="htmlshow"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal area end-->
@endsection
