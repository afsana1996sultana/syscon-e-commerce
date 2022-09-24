<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Brandpartner;
use App\Models\Homepageshow;
use App\Models\Products;
use App\Models\Advertisement;
use App\Models\Homepage;
use App\Models\Blog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['slider'] = Slider::select('id', 's_title', 's_description', 'button_link', 'img')->get();


        $data['brand_partner'] = Brandpartner::select('id', 'brand_name', 'slug', 'brand_logo1', 'brand_logo2')->get();

        $data['blog'] = Blog::select('id', 'user_id', 'category', 'title', 'slug', 'description', 'published_date', 'thumbnail_img')->get();


        $data['products'] = Products::select('id', 'p_name', 'price', 'offer_price', 'img', 'banner_img', 'slug')
            ->whereIn('product_type', [7])
            ->get();



        $data['product'] = Products::select('id', 'p_name', 'price', 'offer_price', 'img', 'banner_img', 'slug')
        ->whereIn('product_type', [3])
        ->get();

        

        $data['advertisement'] = Advertisement::select('id', 'homepage_first_imgone', 'homepage_first_imgtwo', 'homepage_second_imgone',
        'homepage_second_imgtwo', 'homepage_third_imgone', 'homepage_third_imgtwo', 'shoppage_img')->get();


        $homeFirstRow = Homepage::first();
        $data['laptops'] = Products::select('id', 'p_name', 'price', 'offer_price', 'img', 'banner_img', 'slug')
        ->where('sub_category', $homeFirstRow->sub_category1)
        ->get();


        $homeSecondRow = Homepage::first();
        $data['appliances'] = Products::select('id', 'p_name', 'price', 'offer_price', 'img', 'banner_img', 'slug')
        ->where('category', $homeSecondRow->category2)
        ->get();


        $homeThirdRow = Homepage::first();
        $data['smartphones'] = Products::select('id', 'p_name', 'price', 'offer_price', 'img', 'banner_img', 'slug')
        ->where('sub_category', $homeThirdRow->sub_category3)
        ->get();

      
        return view('pages.frontends.home', $data);
    }

    
}
