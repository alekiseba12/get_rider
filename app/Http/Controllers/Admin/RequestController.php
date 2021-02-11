<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\requests;
use App\Models\mpesa_payments;
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
        $requestRider->status=1;
    	$requestRider->save();
        $this->updateStatus($id);
    	$user->notify(new RequestSmsNotification($requestRider));
    	return back();
    }
    //update the user rider status
    public function updateStatus($id){
        $user=User::where('id', $id)->get()->first();
        $user->status=1;
        $user->update();
       return $user;
    }
   //Cancel the request for the rider

    public function cancel(Request $request, $id){
        $rider=requests::where('id',$id)->get()->first();
        $rider->status=$request->input('status');
        $rider->update();
        return back();
}

//Update user when you delete the request
     public function updateUserOnDelete($id){
        $user=User::where('id', $id)->get()->first();
        $user->status=0;
        $user->mpesa_payment=0;

        $user->update();
         return back();
     }

    //Show the reports
    public function show(){
        $user=$this->shopCompany();
    	$sentRequests=$this->showRiderRequests();
    	return view('pages.admin.requestReport',compact('sentRequests','user'));
    }

    //Payment for request
    public function payment(Request $request,$id)
        {
        $currentUser=Auth::User();
        $user=User::where('id', $id)->get()->first();
        $mpesa=new mpesa_payments();
        $mpesa->rider_id=$user->id;
        $mpesa->seller_id=$currentUser->id;
        $mpesa->amount_paid=50;
        $mpesa->save();
        $this->updateMpesa($id);
        return back();

        }
     //update the user rider status
    public function updateMpesa($id){
        $user=User::where('id', $id)->get()->first();
        $user->mpesa_payment=1;
        $user->update();
       return $user;
    }

}
