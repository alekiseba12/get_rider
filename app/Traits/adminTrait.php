<?php

namespace App\Traits;
use App\User;
use App\Models\requests;
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

          $requests=$currentUser->riders()->where('seller_id', $currentUser['id'])->get();

          return $requests;
     }


     //Get all the deliveries

     public function showRiderDeliveries(){
          $currentUser=Auth::User();

          $requests=$currentUser->riders()->where('seller_id', $currentUser['id'])->get();

          return $requests;
     }
 }
 
?>