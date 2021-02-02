<?php

namespace App\Traits;
use App\User;
use App\Models\requests;
use App\Models\deliveries;
use Auth;
use DB;

trait adminTrait
{
	/**
     * Retrieve all  bookings 
     * Note: this was build pre laravel booking.
     *
     * @param  User $user
     *
     * @return void
     */
	public function shopCompany(){
          $user=Auth::User();        
          $info=User::where('role','=', 1)->where('id',$user['id'])->first();
	     return $info;
	}

     //Display all the riders for shop/company owners

     public function riders(){

          $riders=User::all()->where('role','=',2);

          return $riders;
     }

     //Get all the riders requests

     public function showRiderRequests(){
          $currentUser=Auth::User();

          $requests=DB::table('requests')
                       ->join('users','users.id','=','requests.rider_id')
                       ->select('users.*', 'requests.status')
                       ->where('requests.seller_id',$currentUser['id'])
                       ->get();

          return $requests;
     }


     //Get all the deliveries

     public function showRiderDeliveries(){
          $currentUser=Auth::User();

          $deliveries=DB::table('deliveries')
                       ->join('users','users.id','=','deliveries.user_id')
                       ->select('users.national_id', 'deliveries.*')
                       ->where('deliveries.seller_id',$currentUser['id'])
                       ->get();
          return $deliveries;
     }
 }
 
?>