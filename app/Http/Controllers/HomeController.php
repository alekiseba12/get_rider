<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tasks;
use App\User;
use App\Notifications\SmsNotitifaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function storeTask(Request $request){

        $task=new tasks();
        $task->name=$request->input('name');
        $task->task=$request->input('task');
        $task->email=$request->input('email');
        $task->created_at =$request->input(strtotime('created_at'));
        $task->save();

        $task->notify(new SmsNotitifaction());

        return redirect('admin');
       

    }
    //create api for the al users

    public function show(){

       $users = User::get()->toJson(JSON_PRETTY_PRINT);
       return response($users, 200);
    }

    public function form(){

        return view('task');
    }

    public function isAdmin(){

        return view('admin');
    }

  
}
