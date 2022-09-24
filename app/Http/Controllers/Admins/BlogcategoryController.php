<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Support\Facades\DB;
use App\Models\Blogcategory;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogcategoryController extends Controller
{
    public function index()
    {
        $statuses=Status::all();

        $blogcategories =DB::table('blogcategories')
            ->join('statuses','statuses.id', '=', 'blogcategories.status')
            ->select('statuses.s_name', 'blogcategories.*')
            ->get();
        return view("pages.backends.blog-category.index",["blogcategories"=>$blogcategories, "statuses"=>$statuses]);
        
    }

    public function store(Request $request){
        $blogcategories=new Blogcategory; 
        $blogcategories->name=$request->txtName;
        $blogcategories->slug=$request->txtSlug;
        $blogcategories->status=$request->txtStatus;
        $blogcategories->deleted_at=$request->txtDeleted_at;
        $blogcategories->save();
               
        return back()->with('success','Created Successfully.');
          
    }


    public function edit($id){
		$blogcategories=Blogcategory::find($id);
		return response()->json([
			'status'=>200,
			'blogcategories'=>$blogcategories
		]);
	}


    public function update(Request $request,Blogcategory $blogcategories){
        $blogcategoriesid=$request->input('cmbBlogCategoriesId');
        $blogcategories = Blogcategory::find($blogcategoriesid);
        $blogcategories->id=$request->cmbBlogCategoriesId; 
        $blogcategories->name=$request->txtName;
        $blogcategories->slug=$request->txtSlug;
        $blogcategories->status=$request->txtStatus;
        $blogcategories->deleted_at=$request->txtDeleted_at;		   
        $blogcategories->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }


    public function destroy(Request $request){  
        $blogcategoriesid=$request->input('d_blogcategories');
		$blogcategories= Blogcategory::find($blogcategoriesid);
		$blogcategories->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
