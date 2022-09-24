<?php

namespace App\Http\Controllers\Admins;

use App\Models\Stockstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockstatusController extends Controller
{
    public function index()
    {
        $stockstatus=Stockstatus::all();
        return view("pages.backends.stock-status.index",["stockstatus"=> $stockstatus]);
        
    }

    public function store(Request $request){
        $stockstatus=new Stockstatus; 
        $stockstatus->stockstatus_name=$request->txtStockStatus;
        $stockstatus->deleted_at=$request->txtDeleted_at;
        $stockstatus->save();

        return back()->with('success','Created Successfully.');     
    }



    public function edit($id){
		$stockstatus=Stockstatus::find($id);
		return response()->json([
			'status'=>200,
			'stockstatus'=>$stockstatus
		]);
	}



    public function update(Request $request,Stockstatus $stockstatus){
        $stockstatusid=$request->input('cmbStockstatusId');
        $stockstatus = Stockstatus::find($stockstatusid);
        $stockstatus->id=$request->cmbStockstatusId; 
        $stockstatus->stockstatus_name=$request->txtStockStatus;
        $stockstatus->deleted_at=$request->txtDeleted_at;		   
        $stockstatus->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $stockstatusid=$request->input('d_stockstatus');
		$stockstatus= Stockstatus::find($stockstatusid);
		$stockstatus->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
