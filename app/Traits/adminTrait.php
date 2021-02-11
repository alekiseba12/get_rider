<?php

namespace App\Traits;
use App\User;
use App\Models\requests;
use App\Models\deliveries;
use App\Constituency;
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
  public function showLocation(){
    $constituencies = Constituency::all()
                  ->pluck('name', 'id')
                  ->prepend('Select Constituency');
   return $constituencies;
  }

     //Display all the riders for shop/company owners

     public function riders(){

          $riders=User::all()->where('role','=',2)->where('status','=',0);

          return $riders;
     }

     //Get all the riders requests

     public function showRiderRequests(){
          $currentUser=Auth::User();

          $requests=DB::table('requests')
                       ->join('users','users.id','=','requests.rider_id')
                       ->select('users.firstname','users.lastname','users.national_id',
                        'users.location', 'requests.status', 'requests.created_at','requests.id')
                       ->where('requests.seller_id',$currentUser['id'])
                       ->get();

          return $requests;
     }


     //Get all the deliveries

     public function showRiderDeliveries(){
          $currentUser=Auth::User();

          $deliveries=deliveries::
                       where('deliveries.seller_id',$currentUser['id'])
                       ->get();
          return $deliveries;
     }
 }
 
?>