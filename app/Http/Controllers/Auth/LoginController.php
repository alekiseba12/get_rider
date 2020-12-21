<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
           if (Auth::attempt([
           'email'=>$request->email,
           'password'=>$request->password,

         ])){
        $user=User::where('email', $request->email)->first();
            if ($user->is_admin()) {
               return redirect('admin');
        }
            elseif ($user->is_user()) {
                   return redirect('/home');
        }
            elseif ($user->is_manager()) {
                   return redirect('manager');
         }
        
    }
      $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
    return redirect('login')->withErrors($errors);
   }
}
