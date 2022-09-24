<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Products;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('products', compact('products'));
    }



    public function wishlist()
    {
        return view('pages.frontends.wishlist.index');
    }


    public function addToWishlist(Request $request)
    {
        $products = Products::findOrFail($request->id);   
        $wishlist = session()->get('wishlist', []);
  
        if(isset($wishlist[$request->id])) {
            $wishlist[$request->id]['quantity']++;
        } else {
            $wishlist[$request->id] = [
                "name" => $products->p_name,
                "quantity" => 1,
                "price" => $products->offer_price,
                "slug" => $products->slug,
                "image" => $products->img
            ];
        }

        session()->put('wishlist', $wishlist);    
        return [
            'count'=>count((array) session('wishlist')),

        ];
        //return redirect()->back()->with('success', 'Product added to wishlist successfully!');
    }




    public function remove(Request $request)
    {
        if($request->id) {
            $wishlist = session()->get('wishlist');
            if(isset($wishlist[$request->id])) {
                unset($wishlist[$request->id]);
                session()->put('wishlist', $wishlist);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}


