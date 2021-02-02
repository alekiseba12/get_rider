<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Traits\adminTrait;
use Validator;
use App\User;

class ProfileController extends Controller
{

	use adminTrait;
    //index for profile

    public function index(){
    	$user=$this->shopCompany();
    	return view('pages.admin.profile', compact('user'));
    }

    //Report Dashboard

    public function reports(){
         
         return view('pages.admin.reports');
    }

    //Update the shop owner or company
    public function update(Request $request, $id){
    	$validate=Validator::make($request->all(),[
          'shop'=> 'required|max:100|unique:users',
          'photo'=> 'required|file|mimes:peg,png,jpeg,jpg',
        

             ]);
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }
    	$user= User::where('id',$id)->get()->first();
        $user->shop=$request->input('shop');
        $file = $request['photo'];
        $file->move(public_path() . '/img/photos/', $file->getClientOriginalName());
        $url = URL::to("/") . '/img/photos/' . $file->getClientOriginalName();
        $user->photo=$url;
        $user->update();

        return back()->with('response', 'Your profile is completed successfully');
    }
    

  
}
