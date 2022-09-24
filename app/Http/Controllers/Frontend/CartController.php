<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('products', compact('products'));
    }

    
    public function cart()
    {
        return view('pages.frontends.cart.index');
    }


    public function addToCart(Request $request)
    {
        $products = Products::findOrFail($request->id);   
        $cart = session()->get('cart', []);
  
        if(isset($cart[$request->id])) {
            $cart[$request->id]['quantity']++;
        } else {
            $cart[$request->id] = [
                "name" => $products->p_name,
                "quantity" => 1,
                "price" => $products->offer_price,
                "slug" => $products->slug,
                "image" => $products->img   
            ];
        }

        session()->put('cart', $cart);
        $cartImgUrl = url('img');
        $html = '';   

        foreach((array) session('cart') as $id => $details){
            $html .= ' <div class="cart_item">
                <div class="cart_img">
                    <a href="#"><img src="'.$cartImgUrl .'/'. $details['image'].'" alt=""></a>
                </div>
                <div class="cart_info">
                    <a href="#">'.$details['name'].'</a>
                    <p>Qty: '.$details['quantity'].' X <span> '.$details['price'].' </span></p>
                </div>
                <div class="cart_remove">
                <i class="ion-android-close"></i>
                </div>
            </div>';
        }
       
        return [
            'count'=>count((array) session('cart')),
            "ajaxCart"=>$html
        ];
        //return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }
        $cartImgUrl = url('img');
        $subTotal = 0;
        $html = "";

        foreach(session('cart') as $id => $details){
            $html .='<tr data-id="'.$id.'">
                <td class="product_remove"><a class="remove-from-cart"><i class="fa fa-trash-o"></i></a>
                <td class="product_thumb"><a href="'.$cartImgUrl .'/'. $details['image'].'"><img
                src="'.$cartImgUrl .'/'. $details['image'].'" alt=""></a></td>
                <td class="product_name"><a href="">'.$details['name'].'</a></td>
                <td class="product-price">৳ '. $details['price'].'</td>
                <td class="product_quantity"><label>Quantity</label><input type="number" value="'.$details['quantity'].'" class="quantity update-cart"></td>
                <td class="product_total">৳ '.$details['price'] * $details['quantity'].'</td>
                </tr>';
             $subTotal += $details['price'] * $details['quantity'];
            
        }

        return [
            'count'=>count((array) session('cart')),
            "itemList"=>$html,
            "subTotal"=>$subTotal
        ];
    }

    
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
