<?php

namespace App\Traits;
use App\User;
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
		$info=Auth::User()->where('role','=', 1)->first();

		return $info;
	}

     //Display all the riders for shop/company owners

     public function riders(){

          $riders=User::where('role','=',2)->get();

          return $riders;
     }  
 }
 
?>