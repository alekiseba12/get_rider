<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\adminTrait;

class RiderController extends Controller
{

	use adminTrait;
    

    public function index(){

    	$getRiders=$this->riders();
    	return view('pages.user.riders', compact('getRiders'));
    }
}
