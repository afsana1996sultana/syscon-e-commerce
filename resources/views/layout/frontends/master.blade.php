<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/junko/junko/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2022 09:44:58 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Syscon E-Commerce</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('frontends/assets/img/favicon.ico')}}">

    <!-- CSS 
    ========================= -->

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{url('frontends/assets/css/plugins.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{url('frontends/assets/css/style.css')}}">

</head>

<body>

    <!--header area start-->
    @include("layout.frontends.header")
    <!--header area end-->

    <!--sticky header area start-->
    @include("layout.frontends.stickyheader")
    <!--sticky header area end-->

    <!--home section four area start-->
    @yield('main_content')
    <!--home section four area end-->

    <!--footer area start-->
    @include("layout.frontends.footer")
    <!--footer area end-->

    <!-- JS
============================================ -->

    <!-- Plugins JS -->
    <script src="{{url('frontends/assets/js/plugins.js')}}"></script>

    <!-- Main JS -->
    <script src="{{url('frontends/assets/js/main.js')}}"></script>



</body>
<script>
     $(document).on("click",".addToCart",function(){
   var productId = $(this).data('id');

   $.ajax({
        url: "{{ url('add-to-cart') }}",
        method: "GET",
        data: {
            id:productId
        },
        success: function (response) {
            // window.location.reload();
            console.log(response);
            $(".cart_quantity").text(response.count);
            $(".ajaxShow").html(response.ajaxCart);
            
        }
    });

});

$(document).on("change",".update-cart",function(e) {
    e.preventDefault();
    var ele = $(this);

    $.ajax({
        url: '{{ url('update-cart') }}',
        method: "patch",
        data: {
            _token: '{{ csrf_token() }}', 
            id: ele.parents("tr").attr("data-id"), 
            quantity: ele.parents("tr").find(".quantity").val()
        },
        success: function (response) {
            console.log(response);
            $(".cartItemList").html(response.itemList);
            $(".cart_amount").text(response.subTotal);
        }
    });
});

  
$(".remove-from-cart").click(function (e) {
    e.preventDefault();
    var ele = $(this);

    if(confirm("Are you sure want to remove?")) {
        $.ajax({
            url: '{{ route('remove.from.cart') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id")
            },
            success: function (response) {
                window.location.reload();
            }
        });
    }
});


$(".addToWishlist").on("click", function() {
   var productId = $(this).data('id');

   $.ajax({
        url: "{{ url('add-to-wishlist') }}",
        method: "GET",
        data: {
            id:productId
        },
        success: function (response) {
            console.log(response);
            $(".wishlist_quantity").text(response.count);
            
        }
    });

});


$(".remove-from-wishlist").click(function (e) {
    e.preventDefault();
    var ele = $(this);

    if(confirm("Are you sure want to remove?")) {
        $.ajax({
            url: '{{ route('remove.from.wishlist') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id")
            },
            success: function (response) {
                window.location.reload();
            }
        });
    }
});


$(".remove-from-add").click(function (e) {
    e.preventDefault();
    var ele = $(this);

    if(confirm("Are you sure want to remove?")) {
        $.ajax({
            url: '{{ route('remove.from.add') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id")
            },
            success: function (response) {
                window.location.reload();
            }
        });
    }
});


$(".quick_view").click(function () {
    var ele = $(this).attr('id');
    $.ajax({
        url: "{{url('product_details_ajax')}}/"+ele,
        method: "GET",
        success: function (response) {
            $('#modal_box').modal('show');
            $('#htmlshow').html(response);
        }
    }); 
});

</script>

<!-- Mirrored from htmldemo.net/junko/junko/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2022 09:45:00 GMT -->
</html>