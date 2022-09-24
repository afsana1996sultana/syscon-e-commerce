<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Customer;
use App\Models\Customeraddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $order=Order::all();
        return view('pages.frontends.orders.index',["order"=>$order]);
    }


    public function orderList()
    {
        $order=Order::all();
        return view('pages.backends.orders.index',["order"=>$order]);
    }

    public function Store(Request $request){

        $order=new Order;
        $Orderitem=new Orderitem; 

        $orderID = random_int(1000, 9999);
        $order->order_id= $orderID;
        $order->customer_id=Auth::user()->id;
        $order->amount=$request->total;
        $order->address_id=$request->txtAddressId;
        $order->pay_method=$request->txtPayMethod;
        $order->order_status=$request->txtOrderStatus;
        $order->payment_status=$request->txtPaymentStatus;
        $order->discount=$request->txtDiscount;
        // dd($orderID);  
        
        

        foreach((array) session('cart') as $id => $details){

           $cartItem[] = [
                "order_id"=>$orderID,
                "item_id"=> $id,
                "quantity"=>$details['quantity'],
                "price"=>$details['price']
            ];
   
        }

        $Orderitem->insert($cartItem); 
        $order->save(); 
        session()->forget('cart');

        //return back()->with('success','Created Successfully.');
        return redirect()->route("order-success");
          
    }


    public function orderSuccess()
    {
        return view('pages.frontends.my-accounts.order_success');
    }


    public function orderFailed()
    {
        return view('pages.frontends.my-accounts.order_failed');
    }
}
