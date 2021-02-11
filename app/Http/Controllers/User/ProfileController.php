<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Validator;
use App\User;
use Auth;

class ProfileController extends Controller
{
    //Complete the profile

    public function edit($id){

    	$user=Auth::User()->find($id);
    }

    //update the profile

    public function updateShop(Request $request, $id){
    	$validate=Validator::make($request->all(),[
          'motorcicle_number'=> 'required|max:100|unique:users',
          'photo'=> 'required|file|mimes:peg,png,jpeg,jpg',
        

             ]);
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

    	$user= User::where('id',$id)->get()->first();
        $user->motorcicle_number=$request->input('motorcicle_number');
        $file = $request['photo'];
        $file->move(public_path() . '/img/photos/', $file->getClientOriginalName());
        $url = URL::to("/") . '/img/photos/' . $file->getClientOriginalName();
        $user->photo=$url;
        $user->update();

        return back()->with('response', 'Your profile is completed successfully');
    }
      //edit profile

    public function editUser($id){

        $user=User::findOrFail($id);

        return $id;
        die();
    }
    

}
