<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Status;
use App\Models\Blogcategory;
use App\Models\Homepageshow;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogcategories=Blogcategory::all(); 
        $statuses=Status::all();
        $show=Homepageshow::all();

        $blog =DB::table('blogs')
            ->join('blogcategories','blogcategories.id', '=', 'blogs.category')
            ->join('statuses','statuses.id', '=', 'blogs.status')
            ->join('homepageshows','homepageshows.id', '=', 'blogs.show_homepage')
            ->select('statuses.s_name', 'homepageshows.hp_show', 'blogcategories.name', 'blogs.*')
            ->get();
        return view("pages.backends.blog.index",["blog"=>$blog, "statuses"=>$statuses, "blogcategories"=>$blogcategories, "show"=>$show]);
        
    }


    public function create()
    {
        $blog=Blog::all();
        $blogcategories=Blogcategory::all();
        $statuses=Status::all(); 
        $show=Homepageshow::all();
        return view("pages.backends.blog.create",["blog"=>$blog, "blogcategories"=>$blogcategories, "statuses"=>$statuses, "show"=>$show]);
    }



    public function store(Request $request){
        $blog=new Blog; 
        $blog->user_id=Auth::user()->id;
        $blog->category=$request->txtCategory;
        $blog->title=$request->txtTitle;
        $blog->meta_title=$request->txtMetaTitle;
        $blog->slug=$request->txtSlug;
        $blog->description=$request->txtDescription;
        $blog->show_homepage=$request->txtShowHomepage;
        $blog->published_date=$request->txtPublishedDate;
        $blog->seo_title=$request->txtSeoTitle;
        $blog->seo_description=$request->txtSeoDescription;
        $blog->status=$request->txtStatus;
        $blog->deleted_at=$request->txtDeleted_at;

        if(isset($request->file_thumbnail_img)){
            $thumbnail_imgName = (rand(100,1000)).'.'.$request->file_thumbnail_img->extension();
            $blog->thumbnail_img=$thumbnail_imgName;
            $blog->update();
            $request->file_thumbnail_img->move(public_path('img'),$thumbnail_imgName);
        }

        if(isset($request->file_banner_img)){
            $banner_imgName = (rand(100,1000)).'.'.$request->file_banner_img->extension();
            $blog->banner_img=$banner_imgName;
            $blog->update();
            $request->file_banner_img->move(public_path('img'),$banner_imgName);
        }
        $blog->save();        
        return back()->with('success','Created Successfully.');
          
    }


    public function edit($id){
        $blog=Blog::find($id);
        $blogcategories=Blogcategory::all();
        $statuses=Status::all(); 
        $show=Homepageshow::all();	    
        return view("pages.backends.blog.edit",["blog"=>$blog, "blogcategories"=>$blogcategories, "statuses"=>$statuses, "show"=>$show]);
		
	}


    public function update(Request $request,$id){
        $blog = Blog::find($id);

        if(isset($request->txtCategory)){
        $blog->category=$request->txtCategory;
        }

        if(isset($request->txtTitle)){
        $blog->title=$request->txtTitle;
        }

        if(isset($request->txtMetaTitle)){
        $blog->meta_title=$request->txtMetaTitle;
        }

        if(isset($request->txtSlug)){
        $blog->slug=$request->txtSlug;
        }

        if(isset($request->txtDescription)){
        $blog->description=$request->txtDescription;
        }

        if(isset($request->txtShowHomepage)){
        $blog->show_homepage=$request->txtShowHomepage;
        }

        if(isset($request->txtPublishedDate)){
        $blog->published_date=$request->txtPublishedDate;
        }

        if(isset($request->txtSeoTitle)){
        $blog->seo_title=$request->txtSeoTitle;
        }

        if(isset($request->txtSeoDescription)){
        $blog->seo_description=$request->txtSeoDescription;
        }

        if(isset($request->txtStatus)){
        $blog->status=$request->txtStatus;
        } 

        if(isset($request->file_thumbnail_img)){
            $thumbnail_imgName = (rand(100,1000)).'.'.$request->file_thumbnail_img->extension();
            $blog->thumbnail_img=$thumbnail_imgName;
            $request->file_thumbnail_img->move(public_path('img'),$thumbnail_imgName);
        }

        if(isset($request->file_banner_img)){
            $banner_imgName = (rand(100,1000)).'.'.$request->file_banner_img->extension();
            $blog->banner_img=$banner_imgName;
            $request->file_banner_img->move(public_path('img'),$banner_imgName);
        }

        $blog->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }


    public function destroy(Request $request){  
        $blogid=$request->input('d_blog');
		$blog= Blog::find($blogid);
		$blog->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
