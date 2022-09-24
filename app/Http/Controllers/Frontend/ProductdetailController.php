<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Variant;
use App\Models\Variantitem;
use App\Models\Productgallery;
use App\Models\Childcategory;
use App\Models\Subcategory;

class ProductdetailController extends Controller
{
    public function product_details(Request $request){

        $data['ProductData'] = Products::where('products.slug',$request->slug)
        ->join('categories','categories.id', '=', 'products.category')
        ->join('brands','brands.id', '=', 'products.brand')
        ->select('categories.c_name', 'brands.name', 'products.*')
        ->first();

        $data['productgallery'] = Productgallery::where('product_id',$data['ProductData']->id)->select('id','product_img')->get();

        $data['varient'] = Variant::where('product_id',$data['ProductData']->id)->select('id','variant_name')->get();
        

        $data['varientitems'] = Variantitem::where('product_id',$data['ProductData']->id)
        ->select('id','variant_id', 'item')
        ->get();

        $data['sub_category'] = Products::where('sub_category',$data['ProductData']->id)->select('id','p_name', 'price', 'offer_price', 'img', 'banner_img')->get();

        

        $data['related_product'] = Products::select('id', 'p_name', 'price', 'offer_price', 'img', 'banner_img', 'slug')
        ->where('category', $data['ProductData']->category)
        ->get();
        //dd($data['related_product']);

        
        if($request->ajax()) {
        $path = url('img').'/';
        $html = '<div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12">
            <div class="modal_tab">
                <div class="tab-content product-details-large">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                        <div class="modal_tab_img">
                            <a href=""><img src="'.$path.$data['ProductData']->img.'" alt=""></a>
                        </div>
                    </div>
                </div>  
            </div>
        </div>

        <div class="col-lg-7 col-md-7 col-sm-12">
            <div class="modal_right">
                <div class="modal_title mb-10">
                    <h2 class="p_name">'.$data['ProductData']->p_name.'</h2>
                </div>
                <div class="modal_price mb-10">
                    <span class="new_price">৳ '.$data['ProductData']->offer_price.'</span>
                    <span class="old_price">৳ '.$data['ProductData']->price.'</span>
                </div>
                <div class="modal_description mb-15">
                    <p>'.$data['ProductData']->short_description.'</p>
                </div>
                <div class="variants_selects">
                    <div class="variants_size">
                        <h2>size</h2>
                        <select class="select_option" style="display: none;">
                            <option selected="" value="1">s</option>
                            <option value="1">m</option>
                            <option value="1">l</option>
                            <option value="1">xl</option>
                            <option value="1">xxl</option>
                        </select><div class="nice-select select_option" tabindex="0"><span class="current">s</span><ul class="list"><li data-value="1" class="option selected">s</li><li data-value="1" class="option">m</li><li data-value="1" class="option">l</li><li data-value="1" class="option">xl</li><li data-value="1" class="option">xxl</li></ul></div>
                    </div>
                    <div class="variants_color">
                        <h2>color</h2>
                        <select class="select_option" style="display: none;">
                            <option selected="" value="1">purple</option>
                            <option value="1">violet</option>
                            <option value="1">black</option>
                            <option value="1">pink</option>
                            <option value="1">orange</option>
                        </select><div class="nice-select select_option" tabindex="0"><span class="current">purple</span><ul class="list"><li data-value="1" class="option selected">purple</li><li data-value="1" class="option">violet</li><li data-value="1" class="option">black</li><li data-value="1" class="option">pink</li><li data-value="1" class="option">orange</li></ul></div>
                    </div>

                    <div class="modal_add_to_cart">
                        <a class="addToCart" data-id="'.$data['ProductData']->id.'" title="add to cart">Add to cart</a>
                    </div>
                    
                </div>
                <div class="modal_social">
                    <h2>Share this product</h2>
                    <ul>
                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>';
    return  $html ;
    }
        return view('pages.frontends.product-details.index', $data);

    }
}
