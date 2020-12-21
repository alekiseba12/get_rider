<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //index for profile

    public function index(){

    	return view('pages.admin.profile');
    }

    //Report Dashboard

    public function reports(){
         
         return view('pages.admin.reports');
    }
}
