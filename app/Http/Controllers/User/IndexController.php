<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\requests;
use App\User;
use Auth;


class IndexController extends Controller
{
    //Request the delivery
    public function requestDelivery(Request $request, $id){

    	$currentUser=Auth::User();

    	$user=User::where('id', $id)->get()->first();

    	$delivery=new requests();

    	$delivery->seller_id=$user->id;
    	$delivery->rider_id=$currentUser->id;
    	$delivery->save();

    	return back();
    }
}
