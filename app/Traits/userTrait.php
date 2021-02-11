<?php

namespace App\Traits;
use App\User;
use Auth;
use DB;

trait userTrait
{
	/**
     * Retrieve all  bookings 
     * Note: this was build pre laravel booking.
     *
     * @param  User $user
     *
     * @return void
     */

     public function showDelivaries(){
          
          $deliveries=User::where('role','=', 1)->get();

          return $deliveries;
     }

     public function sellerDeliveries(){

              $showDetails=DB::table('deliveries')
                               ->join('users', 'users.id','=','deliveries.seller_id')
                               ->select('users.firstname','users.lastname','users.photo','users.distance', 'users.description','users.location','users.phone_number','users.shop','deliveries.*')
                               ->where('role','=',1)
                               ->get();

               return $showDetails;
     }
          public function showDetails(){
          $user=Auth::User();        
          $info=User::where('role','=', 2)->where('id',$user['id'])->first();

          return $info;
     }
     /**
     * Generate unique user membership number.
     *
     * @return string
     */
    public function generateRegistrationNumber()
    {
        $registration_number = mt_rand(1000000000, 9999999999); // better than rand()
        $user = User::find($registration_number);
        // call the same function if the $registration_number already exists
        if ($user) {
            return $this->generateRegistrationNumber();
        }

        // otherwise, it's valid and can be used
        return $registration_number;
    }
     
   

 }
 
?>