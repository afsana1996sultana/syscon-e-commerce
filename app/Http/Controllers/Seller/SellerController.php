<?php

namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SellerController extends Controller
{

    public function index()
    {
        $user=User::all();
        return view("pages.frontends.seller-login.index",["user"=>$user]);  
    }



    public function sellerDashboard()
    {
        return view('pages.sellers.seller');
    }



    public function sellerSignup(Request $request)
    {
        $user=new User; 
        $user->name=$request->txtName;
        $user->email=$request->txtEmail;
        $user->role_id=2;
        $user->password=Hash::make($request->txtPassword);
        $user->save();
               
        return back()->with('success','Created Successfully.');
        
    }


    public function store(Request $request){
        $user=new User; 
        $user->name=$request->txtName;
        $user->email=$request->txtEmail;
        $user->role_id=$request->txtRoleId;
        $user->password=Hash::make($request->txtPassword);
        $user->save();
               
        return back()->with('success','Created Successfully.');
          
    }
}
