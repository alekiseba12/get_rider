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

    public function store(Request $request,$id){
    	$validate=Validator::make($request->all(),[
          'first_name'=> 'required',
          'last_name'=> 'required',
          'gender'=> 'required',
          'email'=> 'required|email',
          'phone'=> 'required|max:15',
          'product_name'=> 'required',
          'location'=> 'required',

             ]);
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }
        $user = User::where('id', $id)->get()->first();
        $loggedUser=Auth::User();

    	$delivery=new Deliveries();
    	$delivery->user_id = $user->id;
    	$delivery->seller_id = $loggedUser->id;
    	$delivery->first_name=$request->input('first_name');
    	$delivery->last_name=$request->input('last_name');
    	$delivery->gender=$request->input('gender');
    	$delivery->location=$request->input('location');
    	$delivery->email=$request->input('email');
    	$delivery->phone=$request->input('phone');
    	$delivery->product_name=$request->input('product_name');
    	$delivery->gender=$request->input('gender');
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
