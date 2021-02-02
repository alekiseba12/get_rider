<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\deliveries;
use App\Traits\adminTrait;
use App\Traits\userTrait;
use Validator;
use App\User;
use Auth;

class DeliveryController extends Controller
{
	use adminTrait;
	use userTrait;
    //store the delivery data to user

    public function store(Request $request){
    	$validate=Validator::make($request->all(),[
          'product_name'=> 'required',

             ]);
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }
        $loggedUser=Auth::User();

    	$delivery=new Deliveries();
    	$delivery->seller_id = $loggedUser->id;
        $delivery->product_name=$request->input('product_name');
    	$delivery->save();

    	return back();

    }

    //Sow the Deliveries Reports

    public function show(){

    	$allDeliveries=$this->showRiderDeliveries();

    	return view('pages.admin.deliveriesReport',compact('allDeliveries'));
    }

    // Show delivery availabilities

    public function showAvalaibleDeliveries(){

    	$buyers=$this->showDelivaries();

    	return view('pages.user.deliveries',compact('buyers'));       
    }
}
