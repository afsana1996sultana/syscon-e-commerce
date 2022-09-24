<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Brandpartner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandpartnerController extends Controller
{
    public function index()
    {
        $partner=Brandpartner::all();
        return view("pages.backends.brand-partner.index",["partner"=>$partner]);
        
    }

    public function store(Request $request){
        $partner=new Brandpartner; 
        $partner->brand_name=$request->txtBrandName;
        $partner->slug=$request->txtSlug;

        if(isset($request->file_logo1)){
            $logoName1 = (rand(100,1000)).'.'.$request->file_logo1->extension();
            $partner->brand_logo1=$logoName1;
            $partner->update();
            $request->file_logo1->move(public_path('img'),$logoName1);
        }

        if(isset($request->file_logo2)){
            $logoName2 = (rand(100,1000)).'.'.$request->file_logo2->extension();
            $partner->brand_logo2=$logoName2;
            $partner->update();
            $request->file_logo2->move(public_path('img'),$logoName2);
        }


        $partner->deleted_at=$request->txtDeleted_at;
        $partner->save();
               
        return back()->with('success','Created Successfully.');    
    }



    public function edit($id){
		$partner=Brandpartner::find($id);
		return response()->json([
			'status'=>200,
			'partner'=>$partner
		]);
	}



    public function update(Request $request,Brandpartner $partner){
        $partnerid=$request->input('cmbPartnerId');
        $partner = Brandpartner::find($partnerid);
        $partner->id=$request->cmbPartnerId; 
        $partner->brand_name=$request->txtBrandName;
        $partner->slug=$request->txtSlug;

        if(isset($request->file_logo1)){
            $logoName1 = (rand(100,1000)).'.'.$request->file_logo1->extension();
            $partner->brand_logo1=$logoName1;
            $request->file_logo1->move(public_path('img'),$logoName1);
        }


        if(isset($request->file_logo2)){
            $logoName2 = (rand(100,1000)).'.'.$request->file_logo2->extension();
            $partner->brand_logo2=$logoName2;
            $request->file_logo2->move(public_path('img'),$logoName2);
        }

        $partner->deleted_at=$request->txtDeleted_at;		   
        $partner->update();

        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }


    public function destroy(Request $request){  
        $partnerid=$request->input('d_partner');
		$partner= Brandpartner::find($partnerid);
		$partner->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
