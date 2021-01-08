<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\deliveries;
use Validator;
use App\User;

class DeliveryController extends Controller
{
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

    	$delivery=new Deliveries();
    	$delivery->user_id = $user->id;
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
}
