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
                        <li>Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--wishlist area start -->
<div class="wishlist_area mt-60">
    <div class="container">
        <form action="#">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc wishlist">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_remove">Delete</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Stock Status</th>
                                        <th class="product_total">Add To Cart</th>
                                    </tr>
                                </thead>
                                <tbody class="wishlistItemList">
                                @php $total = 0 @endphp
                                @if(session('wishlist'))
                                    @foreach(session('wishlist') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                    <tr data-id="{{ $id }}">
                                        <td class="product_remove"><a class="remove-from-wishlist"><i class="fa fa-trash-o"></i></a></td>
                                        <td class="product_thumb"><a href="{{URL::to('product_details/'.$details['slug'])}}"><img
                                            src="{{url('img/'.$details['image'])}}" alt=""></a></td>
                                        <td class="product_name"><a href="{{URL::to('product_details/'.$details['slug'])}}">{{ $details['name'] }}</a></td>
                                        <td class="product-price">৳ {{ $details['price'] }}</td>
                                        <td class="product_quantity">In Stock</td>
                                        <td class="product_total"><a href="#"class="addToCart" data-id="{{ $id }}">Add To Cart</a></td>
                                    </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-12">
                <div class="wishlist_share">
                    <h4>Share on:</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                        <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--wishlist area end -->
@endsection