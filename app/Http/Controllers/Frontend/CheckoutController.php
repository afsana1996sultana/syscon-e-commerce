<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Products;
use App\Models\Customeraddress;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    
    public function checkout()
    {

        $data['address'] =Customeraddress::select('countries.country_name', 'states.state_name', 'cities.city_name', 'customeraddresses.*')
        ->join('countries','countries.id', '=', 'customeraddresses.country')
        ->join('states','states.id', '=', 'customeraddresses.state')
        ->join('cities','cities.id', '=', 'customeraddresses.city')
        ->where('customeraddresses.customer_id', Auth::user()->id )
        ->get();

        return view('pages.frontends.checkout.index', $data);
    }
}
