<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\requests;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RequestSmsNotification;
use App\Traits\adminTrait;
use App\User;
use Auth;

class RequestController extends Controller
{
	use adminTrait;
    //To send the reques to the rider to deliver the product to the buyer

    public function sendRequest(Request $request, $id){

    	$currentUser=Auth::User();

    	$user=User::where('id', $id)->get()->first();

    	$requestRider=new requests();

    	$requestRider->rider_id=$user->id;
    	$requestRider->seller_id=$currentUser->id;
    	$requestRider->save();

    	$user->notify(new RequestSmsNotification($requestRider));

    	return back();
    }

    //Show the reports

    public function show(){

    	$sentRequests=$this->showRiderRequests();
    	return view('pages.admin.requestReport',compact('sentRequests'));
    }

}
