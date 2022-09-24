<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Blogdetail;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $blog=Blog::all();
        $comment =DB::table('comments')
        ->join('blogs','blogs.id', '=', 'comments.blog_id')
        ->select('blogs.title', 'blogs.slug', 'comments.*')
        ->get();
        //dd($comment);
        return view('pages.backends.comment.index',["comment"=>$comment, "blog"=>$blog]);
    }

    public function store(Request $request){
        $comment=new Comment; 
        $comment->blog_id=$request->input('cmbBlogId');
        $comment->user_id=Auth::user()->id;
        $comment->reply_id=$request->txtReplyId;
        $comment->comments=$request->txtComment;
        $comment->published_status=0;
        $comment->deleted_at=$request->txtDeleted_at;
        $comment->save();        
        return back()->with('success','Created Successfully.');
          
    }


    public function edit($id){
		$comment=Comment::find($id);
		return response()->json([
			'status'=>200,
			'comment'=>$comment
		]);
	}

    public function update(Request $request,Comment $comment){
        $commentid=$request->input('cmbCommentId');
        $comment = Comment::find($commentid);
        $comment->id=$request->cmbCommentId; 
        $comment->published_status=$request->txtPublishedStatus;
        $comment->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    
    public function destroy(Request $request){  
        $commentid=$request->input('d_comment');
		$comment= Comment::find($commentid);
		$comment->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
