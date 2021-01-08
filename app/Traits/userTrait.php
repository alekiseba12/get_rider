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
	public function showDetails(){
          
		$details=Auth::User()->where('role','=', 2)->get()->first();

		return $details;
	}

   

 }
 
?>