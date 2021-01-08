<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\request_rider;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RequestSmsNotification;
use App\User;

class RequestController extends Controller
{
    //To send the reques to the rider to deliver the product to the buyer

    public function sendRequest(Request $request, $id){

    	$currentUser=Auth::User();

    	$user=User::where('id', $id)->get()->first();

    	$requestRider=new request_rider();

    	$requestRider->rider_id=$user->id;
    	$requestRider->seller_id=$currentUser->id;
    	$requestRider->save();

    	$requestRider->notify(new RequestSmsNotification($requestRider));

    	return back();
    }

}
