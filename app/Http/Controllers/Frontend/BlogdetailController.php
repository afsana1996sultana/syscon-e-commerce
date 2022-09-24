<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Status;
use App\Models\Blogcategory;
use App\Models\Homepageshow;
use App\Models\Comment;
use App\Models\User;

class BlogdetailController extends Controller
{
    public function blog_details(Request $request){

        $data['BlogData'] = Blog::where('blogs.slug',$request->slug)
        ->join('blogcategories','blogcategories.id', '=', 'blogs.category')
        ->select('blogcategories.name', 'blogs.*')
        ->first();

        $data['blog'] = Blog::select('id', 'user_id', 'category', 'title', 'slug', 'description', 'published_date', 'thumbnail_img', 'banner_img')->get();

        $data['blogcategories'] = Blogcategory::select('id', 'name', 'slug')->get();

        $blogId = Blog::where("slug",$request->slug)->first();

        $data['comments'] = Comment::where("blog_id",$blogId->id)
        ->where('reply_id',NULL)
        ->join('users','users.id', '=', 'comments.user_id')
        ->select('users.name', 'comments.*')
        ->orderBy('id','DESC')
        ->get();

        return view('pages.frontends.blog_details.index', $data);
    }
}
