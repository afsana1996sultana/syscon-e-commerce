<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Customeraddress;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orderitem;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function showCity(Request $request){      

        $cities = City::where('state',$request->id)->get();

        $html="<option selected><-----Choose State----></option>";

        foreach($cities as $val){
            $html .='<option value='.$val->id.'>' .$val->city_name. '</option>';
        }
        return $html;

    }


    public function index()
    {
        return view('pages.frontends.my-accounts.customer');
    }


    public function orders()
    {
        $add=Customeraddress::all();
        $order =DB::table('orders')
        ->join('customeraddresses','customeraddresses.id', '=', 'orders.address_id')
        ->select('customeraddresses.street_add', 'orders.*')
        ->where('orders.customer_id', Auth::user()->id )
        ->paginate(10);

        //dd($order);
        return view('pages.frontends.my-accounts.order', ["order"=>$order, "add"=>$add, ]);
    }


    public function orderView($id)
    {
        $order=Order::find($id);
        $add=Customeraddress::all();

      $item = Orderitem::where('order_id',$id)
      ->join('products','products.id','=','orderitems.item_id')
      ->select('orderitems.*','products.img','products.p_name')
      ->get();

      return view('pages.frontends.my-accounts.order_view', ["order"=>$order, "add"=>$add, "item"=>$item ]);
    }


    public function downloads()
    {
        return view('pages.frontends.my-accounts.download');
    }


    public function address()
    { 
        $add =DB::table('customeraddresses')
        ->join('countries','countries.id', '=', 'customeraddresses.country')
        ->join('states','states.id', '=', 'customeraddresses.state')
        ->join('cities','cities.id', '=', 'customeraddresses.city')
        ->select('countries.country_name', 'states.state_name', 'cities.city_name', 'customeraddresses.*')
        ->where('customeraddresses.customer_id', Auth::user()->id )
        ->paginate(10);
        return view("pages.frontends.my-accounts.address",["add"=>$add ]);
    }


    public function addressCreate()
    {
        $add=Customeraddress::all();
        $country=Country::all();
        $city=City::all();
        $state=State::all();
        return view("pages.frontends.my-accounts.add_create",["add"=>$add, "country"=>$country, "city"=>$city, "state"=>$state ]);
    }


    public function addressStore(Request $request){
        $add=new Customeraddress; 
        $add->customer_id=Auth::user()->id;
        $add->name=$request->txtFullName;
        $add->country=$request->txtCountry;
        $add->state=$request->txtState;
        $add->city=$request->txtCity;
        $add->street_add=$request->txtStreetAdd;
        $add->date=$request->txtDate;
        $add->phone=$request->txtPhone;
        $add->email=$request->txtEmail;
        $add->order_notes=$request->txtOrderNote;
        $add->deleted_at=$request->txtDeleted_at;

        $add->save();        
        return back()->with('success','Created Successfully.');
          
    }


    public function addressEdit($id){
        $add=Customeraddress::find($id);
        $country=Country::all();
        $city=City::all();
        $state=State::all();
        
        //dd($add);
        return view("pages.frontends.my-accounts.add_edit",["add"=>$add, "country"=>$country, "city"=>$city, "state"=>$state ]);
		
	}

    
    public function addressUpdate(Request $request,$id){
        $add = Customeraddress::find($id);

        if(isset($request->txtFullName)){
        $add->name=$request->txtFullName;
        }

        if(isset($request->txtCountry)){
        $add->country=$request->txtCountry;
        }

        if(isset($request->txtState)){
        $add->state=$request->txtState;
        }

        if(isset($request->txtCity)){
        $add->city=$request->txtCity;
        } 

        if(isset($request->txtStreetAdd)){
        $add->street_add=$request->txtStreetAdd;
        } 

        if(isset($request->txtDate)){
        $add->date=$request->txtDate;
        } 

        if(isset($request->txtPhone)){
        $add->phone=$request->txtPhone;
        } 

        if(isset($request->txtEmail)){
        $add->email=$request->txtEmail;
        } 

        $add->order_notes=$request->txtOrderNote;
      

        $add->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }


    public function remove(Request $request)
    {
        if($request->id) {
            $add = session()->get('add');
            if(isset($add[$request->id])) {
                unset($add[$request->id]);
                session()->put('add', $add);
            }
            session()->flash('success', 'Address removed successfully');
        }
    }


    public function myProfile()
    {
        return view('pages.frontends.my-accounts.my_profile');
    }
}
