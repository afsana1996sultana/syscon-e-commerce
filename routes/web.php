<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admins\CurrencynameController;
use App\Http\Controllers\Admins\TimezoneController;
use App\Http\Controllers\Admins\UnitController;
use App\Http\Controllers\Admins\CategoryController;
use App\Http\Controllers\Admins\SubcategoryController;
use App\Http\Controllers\Admins\ChildcategoryController;
use App\Http\Controllers\Admins\BlogcategoryController;
use App\Http\Controllers\Admins\BrandpartnerController;
use App\Http\Controllers\Admins\BrandsController;
use App\Http\Controllers\Admins\StatusController;
use App\Http\Controllers\Admins\SellerstatusController;
use App\Http\Controllers\Admins\OrderstatusController;
use App\Http\Controllers\Admins\StockstatusController;
use App\Http\Controllers\Admins\PaymentstatusController;
use App\Http\Controllers\Admins\ProductsController;
use App\Http\Controllers\Admins\SliderController;
use App\Http\Controllers\Admins\BlogController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Admins\MegamenuController;
use App\Http\Controllers\Admins\SubmegamenuController;
use App\Http\Controllers\Admins\SociallinkController;
use App\Http\Controllers\Admins\FirstcolumnlinkController;
use App\Http\Controllers\Admins\SecondcolumnlinkController;
use App\Http\Controllers\Admins\ColumnlistController;
use App\Http\Controllers\Admins\CountryController;
use App\Http\Controllers\Admins\StateController;
use App\Http\Controllers\Admins\CityController;
use App\Http\Controllers\Admins\SpecificationkeyController;
use App\Http\Controllers\Admins\TaxController;
use App\Http\Controllers\Admins\CampaignController;
use App\Http\Controllers\Admins\HomepageshowController;
use App\Http\Controllers\Admins\DiscountController;
use App\Http\Controllers\Admins\CouponController;
use App\Http\Controllers\Admins\MenuvisibilityController;
use App\Http\Controllers\Admins\SubmenuController;
use App\Http\Controllers\Admins\ReturnpolicyController;
use App\Http\Controllers\Admins\ShippingController;
use App\Http\Controllers\Admins\WidthdrawmethodController;
use App\Http\Controllers\Admins\SellerwithdrawController;
use App\Http\Controllers\Admins\PendingsellerwithdrawController;
use App\Http\Controllers\Admins\HomepageController;
use App\Http\Controllers\Admins\PendingorderController;
use App\Http\Controllers\Admins\ProgressorderController;
use App\Http\Controllers\Admins\DeliveredorderController;
use App\Http\Controllers\Admins\CompletedorderController;
use App\Http\Controllers\Admins\DeclinedorderController;
use App\Http\Controllers\Admins\CashorderController;
use App\Http\Controllers\Admins\ProductshowsectionController;
use App\Http\Controllers\Admins\ProductgalleryController;
use App\Http\Controllers\Admins\VariantController;
use App\Http\Controllers\Admins\VariantitemController;
use App\Http\Controllers\Admins\SellerproductsController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Frontend\ProductcategoryController;
use App\Http\Controllers\Frontend\ProductsubcategoryController;
use App\Http\Controllers\Frontend\ProductchildcategoryController;
use App\Http\Controllers\Frontend\ProductdetailController;
use App\Http\Controllers\Frontend\BlogdetailController;
use App\Http\Controllers\Frontend\MenushowController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Seller\SellerorderController;
use App\Http\Controllers\Seller\PendingsellerorderController;
use App\Http\Controllers\Seller\ProgresssellerorderController;
use App\Http\Controllers\Seller\DeliveredsellerorderController;
use App\Http\Controllers\Seller\CompletedsellerorderController;
use App\Http\Controllers\Seller\DeclinedsellerorderController;
use App\Http\Controllers\Seller\CashsellerorderController;
use App\Http\Controllers\Seller\ProductsellerController;
use App\Http\Controllers\Admins\SellerproductgalleryController;
use App\Http\Controllers\Seller\SellergalleryController;
use App\Http\Controllers\Seller\SellervariantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('pages.frontends.home');
// });

Route::get('home', function () {
    return redirect('/');
});

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');

///////////////////////////frontends/////////////////////////////////////////////
Route::get('/home', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');


////////////////////User-Login/////////////////////////
Route::get('/user-login', [App\Http\Controllers\Frontend\UserloginController::class, 'index'])->name('user-login');

Route::get('/seller-login', [App\Http\Controllers\Frontend\SellerloginController::class,'index'])->name('seller-login');


////////////////////Product-Category/////////////////////////
Route::get('product_category/{slug}', [ProductcategoryController::class, 'product_category']);



////////////////////Product-Sub-Category/////////////////////////
Route::get('product_sub_category/{slug}', [ProductsubcategoryController::class, 'product_sub_category']);



////////////////////Product-Child-Category/////////////////////////
Route::get('product_child_category/{slug}', [ProductchildcategoryController::class, 'product_child_category']);



////////////////////Product-Details/////////////////////////
Route::get('product_details/{slug}', [ProductdetailController::class, 'product_details']);
Route::get('product_details_ajax/{slug}', [ProductdetailController::class, 'product_details']);


/////////////////////Blog-Details/////////////////////////
Route::get('blog_details/{slug}', [BlogdetailController::class, 'blog_details']);


////////////////////Add-To-Cart/////////////////////////
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart', [CartController::class, 'addToCart']);
Route::patch('update-cart', [CartController::class, 'update']);
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');



////////////////////Wishlist/////////////////////////
Route::get('/wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
Route::get('add-to-wishlist', [WishlistController::class, 'addToWishlist']);
Route::delete('remove-from-wishlist', [WishlistController::class, 'remove'])->name('remove.from.wishlist');



////////////////////Menu-show/////////////////////////
Route::get('/shop', [MenushowController::class, 'shop']);
Route::get('/blogs', [MenushowController::class, 'blog']);
Route::get('/campaigns', [MenushowController::class, 'campaign']);
Route::get('/about-us', [MenushowController::class, 'about']);
Route::get('/services', [MenushowController::class, 'services']);
Route::get('/privacy-policy', [MenushowController::class, 'policy']);
Route::get('/frequently-questions', [MenushowController::class, 'questions']);
Route::get('/contact', [MenushowController::class, 'contact']);
Route::get('/contact-us', [MenushowController::class, 'contact']);
Route::get('/compare', [MenushowController::class, 'compare']);
Route::get('/terms&condition', [MenushowController::class, 'condition']);
Route::get('/delivery-information', [MenushowController::class, 'd_information']);
Route::get('/returns', [MenushowController::class, 'return']);


Route::get('for-sub-cat', [SubcategoryController::class, 'showSubCat'])->name('for-sub-cat');
Route::get('for-child-cat', [ProductsellerController::class, 'showChildCat'])->name('for-child-cat');


///////////////////////////backends/////////////////////////////////////////////
//Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
//Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


Route::get('admin', function () {
    return redirect('login');
});

////////////////////User/////////////////////////
Route::post('user-signup', [App\Http\Controllers\Admins\UserController::class,'userSignup'])->name('user-signup');

////////////////////User/////////////////////////
Route::post('seller-signup', [App\Http\Controllers\Seller\SellerController::class,'sellerSignup'])->name('seller-signup');

Auth::routes();


Route::group(['middleware' => 'Seller'], function () {

    Route::get('/seller-dashboard', [App\Http\Controllers\Seller\SellerController::class, 'sellerDashboard'])->name('seller-dashboard');

    ///////////////////////Seller-Product/////////////////////////////////
    Route::resource('seller/product', App\Http\Controllers\Seller\ProductsellerController::class);
    Route::post('seller/product', [ProductsellerController::class, 'store'])->name('seller/product');
    Route::delete('delete-seller/product', [ProductsellerController::class, 'destroy']);
    Route::get('seller/product-highlight/{id}', [ProductsellerController::class, 'edithighlight']);


});


Route::get('for-state-cat', [StateController::class, 'showState'])->name('for-state-cat');
Route::get('for-city-cat', [CustomerController::class, 'showCity'])->name('for-city-cat');
//Route::get('for-sub-cat', [SubcategoryController::class, 'showSubCat'])->name('for-sub-cat');
//Route::get('for-child-cat', [ProductsellerController::class, 'showChildCat'])->name('for-child-cat');

Route::group(['middleware' => 'Customer'], function () {
    Route::get('/customer-dashboard/my-account', [App\Http\Controllers\Frontend\CustomerController::class, 'index'])->name('customer-dashboard/my-account');
    Route::get('/customer-dashboard/my-account/orders', [App\Http\Controllers\Frontend\CustomerController::class, 'orders'])->name('customer-dashboard/my-account/orders');
    Route::get('/customer-dashboard/my-account/downloads', [App\Http\Controllers\Frontend\CustomerController::class, 'downloads'])->name('customer-dashboard/my-account/downloads');
    Route::get('/customer-dashboard/my-account/address', [App\Http\Controllers\Frontend\CustomerController::class, 'address'])->name('customer-dashboard/my-account/address');
    Route::get('/customer-dashboard/my-account/my-profile', [App\Http\Controllers\Frontend\CustomerController::class, 'myProfile'])->name('customer-dashboard/my-account/my-profile');
    Route::get('/customer-dashboard/my-account/orders/view/{id}', [CustomerController::class, 'orderView']);
    
    Route::get('/customer-dashboard/my-account/address/create', [CustomerController::class, 'addressCreate']);
    Route::post('/create/customer-dashboard/my-account/address', [CustomerController::class, 'addressStore']);
    Route::get('/customer-dashboard/my-account/address/edit/{id}', [CustomerController::class, 'addressEdit']);
    Route::post('/customer-dashboard/my-account/address/update/{id}', [CustomerController::class, 'addressUpdate']);

    Route::delete('remove-from-add', [CustomerController::class, 'remove'])->name('remove.from.add');
    //Route::delete('delete/my-account/address', [CustomerController::class, 'addressDestroy']);

   
    ////////////////////Checkout/////////////////////////
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/orders', [OrderController::class, 'Store']);
    Route::post('/comment-post', [CommentController::class, 'Store']);

    Route::get('order-success', [OrderController::class, 'orderSuccess'])->name('order-success');
    Route::get('order-failed', [OrderController::class, 'orderFailed'])->name('order-failed');

    
});





Route::group(['middleware' => 'Admin'], function () {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    //Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer');


    ////////////////////Settings/////////////////////////////////
    Route::resource('general-settings', App\Http\Controllers\Admins\SettingController::class);


    // ////////////////////CurrencyName/////////////////////////////////
    Route::resource('currencyname', App\Http\Controllers\Admins\CurrencynameController::class);
    Route::get('edit-currencyname/{id}', [CurrencynameController::class, 'edit']);
    Route::put('currencyname-update', [CurrencynameController::class, 'update']);
    Route::delete('delete-currencyname', [CurrencynameController::class, 'destroy']);


    // ////////////////////Timezone/////////////////////////////////
    Route::resource('timezone', App\Http\Controllers\Admins\TimezoneController::class);
    Route::get('edit-timezone/{id}', [TimezoneController::class, 'edit']);
    Route::put('timezone-update', [TimezoneController::class, 'update']);
    Route::delete('delete-timezone', [TimezoneController::class, 'destroy']);


    // ////////////////////Units/////////////////////////////////
    Route::resource('unit', App\Http\Controllers\Admins\UnitController::class);
    Route::get('edit-unit/{id}', [UnitController::class, 'edit']);
    Route::put('unit-update', [UnitController::class, 'update']);
    Route::delete('delete-unit', [UnitController::class, 'destroy']);



    // ////////////////////Category/////////////////////////////////
    Route::resource('category', App\Http\Controllers\Admins\CategoryController::class);
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('category-update', [CategoryController::class, 'update']);
    Route::delete('delete-category', [CategoryController::class, 'destroy']);



    // ////////////////////Sub-Category/////////////////////////////////
    Route::resource('sub-category', App\Http\Controllers\Admins\SubcategoryController::class);
    Route::get('edit-sub-category/{id}', [SubcategoryController::class, 'edit']);
    Route::put('sub-category-update', [SubcategoryController::class, 'update']);
    Route::delete('delete-sub-category', [SubcategoryController::class, 'destroy']);
    


    // ////////////////////Child-Category/////////////////////////////////
    Route::resource('child-category', App\Http\Controllers\Admins\ChildcategoryController::class);
    Route::get('edit-child-category/{id}', [ChildcategoryController::class, 'edit']);
    Route::put('child-category-update', [ChildcategoryController::class, 'update']);
    Route::delete('delete-child-category', [ChildcategoryController::class, 'destroy']);


    //////////////////////Blog-Category/////////////////////////////////
    Route::resource('blog-category', App\Http\Controllers\Admins\BlogcategoryController::class);
    Route::get('edit-blog-category/{id}', [BlogcategoryController::class, 'edit']);
    Route::put('blog-category-update', [BlogcategoryController::class, 'update']);
    Route::delete('delete-blog-category', [BlogcategoryController::class, 'destroy']);


    // ////////////////////Brands/////////////////////////////////
    Route::resource('brands', App\Http\Controllers\Admins\BrandsController::class);
    Route::get('edit-brands/{id}', [BrandsController::class, 'edit']);
    Route::put('brands-update', [BrandsController::class, 'update']);
    Route::delete('delete-brands', [BrandsController::class, 'destroy']);


    ///////////////////////Status/////////////////////////////////
    Route::resource('status', App\Http\Controllers\Admins\StatusController::class);
    Route::get('edit-status/{id}', [StatusController::class, 'edit']);
    Route::put('status-update', [StatusController::class, 'update']);
    Route::delete('delete-status', [StatusController::class, 'destroy']);


    ///////////////////////Seller-Status/////////////////////////////////
    Route::resource('seller-status', App\Http\Controllers\Admins\SellerstatusController::class);
    Route::get('edit-seller-status/{id}', [SellerstatusController::class, 'edit']);
    Route::put('seller-status-update', [SellerstatusController::class, 'update']);
    Route::delete('delete-seller-status', [SellerstatusController::class, 'destroy']);


    ///////////////////////Order-Status/////////////////////////////////
    Route::resource('order-status', App\Http\Controllers\Admins\OrderstatusController::class);
    Route::get('edit-order-status/{id}', [OrderstatusController::class, 'edit']);
    Route::put('order-status-update', [OrderstatusController::class, 'update']);
    Route::delete('delete-order-status', [OrderstatusController::class, 'destroy']);


    ///////////////////////Orders/////////////////////////////////
    Route::get('/all-order', [App\Http\Controllers\Frontend\OrderController::class, 'orderList'])->name('all-order');



    ///////////////////////Stock-Status/////////////////////////////////
    Route::resource('stock-status', App\Http\Controllers\Admins\StockstatusController::class);
    Route::get('edit-stock-status/{id}', [StockstatusController::class, 'edit']);
    Route::put('stock-status-update', [StockstatusController::class, 'update']);
    Route::delete('delete-stock-status', [StockstatusController::class, 'destroy']);


    ///////////////////////Payment-Status/////////////////////////////////
    Route::resource('payment-status', App\Http\Controllers\Admins\PaymentstatusController::class);
    Route::get('edit-payment-status/{id}', [PaymentstatusController::class, 'edit']);
    Route::put('payment-status-update', [PaymentstatusController::class, 'update']);
    Route::delete('delete-payment-status', [PaymentstatusController::class, 'destroy']);


    ///////////////////////Products/////////////////////////////////
    Route::resource('products', App\Http\Controllers\Admins\ProductsController::class);
    Route::delete('delete-products', [ProductsController::class, 'destroy']);
    Route::get('products-highlight/{id}', [ProductsController::class, 'edithighlight']);


    ////////////////////Seo-Setup/////////////////////////////////
    Route::resource('seo-setup', App\Http\Controllers\Admins\SeosetupController::class);


    ////////////////////Topbar-Content/////////////////////////////////
    Route::resource('topbar-contact', App\Http\Controllers\Admins\TopbarcontactController::class);


    ///////////////////////Slider/////////////////////////////////
    Route::resource('slider', App\Http\Controllers\Admins\SliderController::class);
    Route::delete('delete-slider', [SliderController::class, 'destroy']);


    ////////////////////Home-Page/////////////////////////////////
    Route::resource('home-page', App\Http\Controllers\Admins\HomepageController::class);
    //Route::get('for-child-cat', [ProductsController::class, 'showChildCat']);


    ////////////////////Home-Visibility/////////////////////////////////
    Route::resource('home-visibility', App\Http\Controllers\Admins\HomevisibilityController::class);


    ////////////////////Menu-Visibility/////////////////////////////////
    Route::resource('menu-visibility', App\Http\Controllers\Admins\MenuvisibilityController::class);
    Route::get('edit-menu-visibility/{id}', [MenuvisibilityController::class, 'edit']);
    Route::put('menu-visibility-update', [MenuvisibilityController::class, 'update']);
    Route::delete('delete-menu-visibility', [MenuvisibilityController::class, 'destroy']);



    ////////////////////Sub-Menu/////////////////////////////////
    Route::resource('sub-menu', App\Http\Controllers\Admins\SubmenuController::class);
    Route::get('edit-sub-menu/{id}', [SubmenuController::class, 'edit']);
    Route::put('sub-menu-update', [SubmenuController::class, 'update']);
    Route::delete('delete-sub-menu', [SubmenuController::class, 'destroy']);


    ////////////////////Shop-Page/////////////////////////////////
    Route::resource('shop-page', App\Http\Controllers\Admins\ShoppageController::class);


    ///////////////////////Service/////////////////////////////////
    Route::resource('service', App\Http\Controllers\Admins\ServiceController::class);

    ////////////////////Seller-Condition/////////////////////////////////
    Route::resource('seller-condition', App\Http\Controllers\Admins\SellerconditionController::class);


    ////////////////////Announcement/////////////////////////////////
    Route::resource('announcement', App\Http\Controllers\Admins\AnnouncementController::class);


    ///////////////////////Mega-Menu/////////////////////////////////
    Route::resource('mega-menu-category', App\Http\Controllers\Admins\MegamenuController::class);
    Route::delete('delete-mega-menu-category', [MegamenuController::class, 'destroy']);


    ///////////////////////Mega-Menu Sub-Category/////////////////////////////////
    Route::resource('mega-menu-sub-category', App\Http\Controllers\Admins\SubmegamenuController::class);

    Route::get('mega-menu-sub-category/list/{id}', [SubmegamenuController::class, 'index']);
    Route::get('mega-menu-sub-category/create/{id}', [SubmegamenuController::class, 'SubCreate']);
    Route::post('create-mega-sub-category', [SubmegamenuController::class, 'store']);
    Route::delete('delete-mega-menu-sub-category', [SubmegamenuController::class, 'destroy']);


    ////////////////////Banner-Image/////////////////////////////////
    Route::resource('banner-image', App\Http\Controllers\Admins\BannerimageController::class,);


    ////////////////////Default-Avatar/////////////////////////////////
    Route::resource('default-avatar', App\Http\Controllers\Admins\DefaultavatarController::class);


    ////////////////////Footer/////////////////////////////////
    Route::resource('footer', App\Http\Controllers\Admins\FooterController::class);


    // ////////////////////Social-Link/////////////////////////////////
    Route::resource('social-link', App\Http\Controllers\Admins\SociallinkController::class);
    Route::get('edit-social-link/{id}', [SociallinkController::class, 'edit']);
    Route::put('social-link-update', [SociallinkController::class, 'update']);
    Route::delete('delete-social-link', [SociallinkController::class, 'destroy']);


    // ////////////////////First-Column-Link/////////////////////////////////
    Route::resource('first-column-link', App\Http\Controllers\Admins\FirstcolumnlinkController::class);
    Route::get('edit-first-column-link/{id}', [FirstcolumnlinkController::class, 'edit']);
    Route::put('first-column-link-update', [FirstcolumnlinkController::class, 'update']);
    Route::delete('delete-first-column-link', [FirstcolumnlinkController::class, 'destroy']);

    // ////////////////////Second-Column-Link/////////////////////////////////
    Route::resource('second-column-link', App\Http\Controllers\Admins\SecondcolumnlinkController::class);
    Route::get('edit-second-column-link/{id}', [SecondcolumnlinkController::class, 'edit']);
    Route::put('second-column-link-update', [SecondcolumnlinkController::class, 'update']);
    Route::delete('delete-second-column-link', [SecondcolumnlinkController::class, 'destroy']);


    // ////////////////////Column-List/////////////////////////////////
    Route::resource('column-list', App\Http\Controllers\Admins\ColumnlistController::class);
    Route::get('edit-column-list/{id}', [ColumnlistController::class, 'edit']);
    Route::put('column-list-update', [ColumnlistController::class, 'update']);
    Route::delete('delete-column-list', [ColumnlistController::class, 'destroy']);


    // ////////////////////Country/////////////////////////////////
    Route::resource('country', App\Http\Controllers\Admins\CountryController::class);
    Route::get('edit-country/{id}', [CountryController::class, 'edit']);
    Route::put('country-update', [CountryController::class, 'update']);
    Route::delete('delete-country', [CountryController::class, 'destroy']);


    // ////////////////////State/////////////////////////////////
    Route::resource('state', App\Http\Controllers\Admins\StateController::class);
    Route::get('edit-state/{id}', [StateController::class, 'edit']);
    Route::put('state-update', [StateController::class, 'update']);
    Route::delete('delete-state', [StateController::class, 'destroy']);

    // ////////////////////City/////////////////////////////////
    Route::resource('city', App\Http\Controllers\Admins\CityController::class);
    Route::get('edit-city/{id}', [CityController::class, 'edit']);
    Route::put('city-update', [CityController::class, 'update']);
    Route::delete('delete-city', [CityController::class, 'destroy']);


    ////////////////////Advertisement/////////////////////////////////
    Route::resource('advertisement', App\Http\Controllers\Admins\AdvertisementController::class);


    ///////////////////////Specification-Key/////////////////////////////////
    Route::resource('specification-key', App\Http\Controllers\Admins\SpecificationkeyController::class);
    Route::delete('delete-specification-key', [SpecificationkeyController::class, 'destroy']);

    ///////////////////////Specification-Key/////////////////////////////////
    Route::resource('tax', App\Http\Controllers\Admins\TaxController::class);
    Route::delete('delete-tax', [TaxController::class, 'destroy']);


    ///////////////////////Campaign/////////////////////////////////
    Route::resource('campaign', App\Http\Controllers\Admins\CampaignController::class);
    Route::delete('delete-campaign', [CampaignController::class, 'destroy']);


    ///////////////////////Homepage-Show/////////////////////////////////
    Route::resource('show-homepage', App\Http\Controllers\Admins\HomepageshowController::class);
    Route::get('edit-show-homepage/{id}', [HomepageshowController::class, 'edit']);
    Route::put('show-homepage-update', [HomepageshowController::class, 'update']);
    Route::delete('delete-show-homepage', [HomepageshowController::class, 'destroy']);



    ///////////////////////Discount/////////////////////////////////
    Route::resource('discount', App\Http\Controllers\Admins\DiscountController::class);
    Route::get('edit-discount/{id}', [DiscountController::class, 'edit']);
    Route::put('discount-update', [DiscountController::class, 'update']);
    Route::delete('delete-discount', [DiscountController::class, 'destroy']);



    ///////////////////////Coupon/////////////////////////////////
    Route::resource('coupon', App\Http\Controllers\Admins\CouponController::class);
    Route::get('edit-coupon/{id}', [CouponController::class, 'edit']);
    Route::put('coupon-update', [CouponController::class, 'update']);
    Route::delete('delete-coupon', [CouponController::class, 'destroy']);


    ///////////////////////Return-Policy/////////////////////////////////
    Route::resource('return-policy', App\Http\Controllers\Admins\ReturnpolicyController::class);
    Route::delete('delete-return-policy', [ReturnpolicyController::class, 'destroy']);


    ///////////////////////Shipping/////////////////////////////////
    Route::resource('shipping', App\Http\Controllers\Admins\ShippingController::class);
    Route::delete('delete-shipping', [ShippingController::class, 'destroy']);


    ////////////////////Payment-Methods/////////////////////////////////
    Route::resource('payment-method', App\Http\Controllers\Admins\PaymentmethodController::class);


    ///////////////////////Widthdraw Method/////////////////////////////////
    Route::resource('widthdraw-method', App\Http\Controllers\Admins\WidthdrawmethodController::class);
    Route::delete('delete-widthdraw-method', [WidthdrawmethodController::class, 'destroy']);


    ///////////////////////Seller-Widthdraw/////////////////////////////////
    Route::resource('seller-withdraw', App\Http\Controllers\Admins\SellerwithdrawController::class);
    Route::delete('delete-seller-withdraw', [SellerwithdrawController::class, 'destroy']);


    ///////////////////////Pending-Seller-Widthdraw/////////////////////////////////
    Route::resource('pending-seller-withdraw', App\Http\Controllers\Admins\PendingsellerwithdrawController::class);
    Route::delete('delete-pending-seller-withdraw', [PendingsellerwithdrawController::class, 'destroy']);


    ///////////////////////Product Section/////////////////////////////////
    Route::resource('product-section', App\Http\Controllers\Admins\ProductshowsectionController::class);
    Route::get('edit-product-section/{id}', [ProductshowsectionController::class, 'edit']);
    Route::put('product-section-update', [ProductshowsectionController::class, 'update']);
    Route::delete('delete-product-section', [ProductshowsectionController::class, 'destroy']);


    ///////////////////////Product-Gallery/////////////////////////////////
    Route::resource('product-gallery', App\Http\Controllers\Admins\ProductgalleryController::class);
    Route::delete('delete-product-gallery', [ProductgalleryController::class, 'destroy']);



    ///////////////////////Product-Variant/////////////////////////////////
    Route::resource('product-variant', App\Http\Controllers\Admins\VariantController::class);
    Route::get('edit-product-variant/{id}', [VariantController::class, 'edit']);
    Route::put('product-variant-update', [VariantController::class, 'update']);
    Route::delete('delete-product-variant', [VariantController::class, 'destroy']);



    ///////////////////////Product-Variant-Item/////////////////////////////////
    Route::resource('product-variant-item', App\Http\Controllers\Admins\VariantitemController::class);
    Route::get('edit-product-variant-item/{id}', [VariantitemController::class, 'edit']);
    Route::put('product-variant-item-update', [VariantitemController::class, 'update']);
    Route::delete('delete-product-variant-item', [VariantitemController::class, 'destroy']);



    ////////////////////User/////////////////////////
    Route::resource('user-login', App\Http\Controllers\Admins\UserController::class);
    Route::get('edit-user/{id}', [UserController::class, 'edit']);
    Route::put('user-update', [UserController::class, 'update']);
    Route::delete('delete-user', [UserController::class, 'destroy']);
    Route::get('/user-list', [App\Http\Controllers\Admins\UserController::class, 'userList'])->name('user-list');



    // ////////////////////Brand-Partner/////////////////////////////////
    Route::resource('brand-partner', App\Http\Controllers\Admins\BrandpartnerController::class);
    Route::get('edit-brand-partner/{id}', [BrandpartnerController::class, 'edit']);
    Route::put('brand-partner-update', [BrandpartnerController::class, 'update']);
    Route::delete('delete-brand-partner', [BrandpartnerController::class, 'destroy']);


    ///////////////////////Blog/////////////////////////////////
    Route::resource('blog-list', App\Http\Controllers\Admins\BlogController::class);
    Route::delete('delete-blog-list', [BlogController::class, 'destroy']);



    ///////////////////////Comment/////////////////////////////////
    Route::resource('comment', App\Http\Controllers\Frontend\CommentController::class);
    Route::get('edit-comment/{id}', [CommentController::class, 'edit']);
    Route::put('comment-update', [CommentController::class, 'update']);
    Route::delete('delete-comment', [CommentController::class, 'destroy']);



    ///////////////////////Seller-Products/////////////////////////////////
    Route::resource('seller-products', App\Http\Controllers\Admins\SellerproductsController::class);
    Route::delete('delete-seller-products', [SellerproductsController::class, 'destroy']);
    //Route::get('for-child-cat', [SellerproductsController::class, 'showChildCat']);
    Route::get('seller-products-highlight/{id}', [SellerproductsController::class, 'edithighlight']);


    ///////////////////////Seller-Products-Gallery/////////////////////////////////
    Route::resource('seller-products-gallery', App\Http\Controllers\Admins\SellerproductgalleryController::class);
    Route::delete('delete-seller-products-gallery', [SellerproductgalleryController::class, 'destroy']);


    ///////////////////////Seller-Gallery/////////////////////////////////
    Route::resource('seller/product-gallery', App\Http\Controllers\Seller\SellergalleryController::class);
    Route::post('seller/product-gallery', [SellergalleryController::class, 'store'])->name('product-gallery');
    Route::delete('delete-seller/product-gallery', [SellergalleryController::class, 'destroy']);

});
