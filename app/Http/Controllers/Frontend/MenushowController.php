<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Menushow;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Blogcategory;
use App\Models\User;
use Illuminate\Http\Request;


class MenushowController extends Controller
{
    public function shop()
    {
        return view('pages.frontends.shop.index'); 
    }

    public function blog(Request $request)
    {
        $data['blog'] = Blog::select('id', 'user_id', 'category', 'title', 'slug', 'description', 'published_date', 'thumbnail_img', 'banner_img')->get();
        $data['blogcategories'] = Blogcategory::select('id', 'name', 'slug')->get();
        
        return view('pages.frontends.blog.index', $data); 
    }

    public function campaign()
    {
        return view('pages.frontends.campaign.index'); 
    }

    public function about()
    {
        return view('pages.frontends.about-us.index'); 
    }

    public function services()
    {
        return view('pages.frontends.services.index'); 
    }

    public function policy()
    {
        return view('pages.frontends.privacy-policy.index'); 
    }

    public function questions()
    {
        return view('pages.frontends.frequently-questions.index'); 
    }

    public function contact()
    {
        return view('pages.frontends.contact.index'); 
    }

    public function compare()
    {
        return view('pages.frontends.compare.index'); 
    }

    public function condition()
    {
        return view('pages.frontends.condition.index'); 
    }

    public function d_information()
    {
        return view('pages.frontends.delivery-information.index'); 
    }

    public function return()
    {
        return view('pages.frontends.return.index'); 
    }
}
