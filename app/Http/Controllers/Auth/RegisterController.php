<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\smsNotification;
use App\Models\areas;
use App\Models\constituencies;
use App\Traits\userTrait;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use userTrait;


    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'firstname' => ['required', 'string', 'max:255'],
            'lastname'  => ['required', 'string', 'max:255'],
            'gender'    => ['required', 'string', 'max:6', 'min:4'],
            'national_id' => ['required', 'numeric', 'min:8'],
            'location'   => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:15'],
            'constituency' => ['required', 'string'],
            'role'    => ['required'],
            'description' => ['required', 'string','max:200'],
            'lat'=>'',
            'longitude'=>'', 
        

           
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['registration_number'] = $this->generateRegistrationNumber();
    
        $user=User::create([
            'id'           => mt_rand(10, 99),
            'name'         => $data['name'],
            'registration_number'         => $data['registration_number'],
            'email'        => $data['email'],
            'firstname'    => $data['firstname'],
            'lastname'     => $data['lastname'],
            'gender'       => $data['gender'],
            'national_id'  => $data['national_id'],
            'location'     => $data['location'],
            'constituency' => $data['constituency'],
            'phone_number' => $data['phone_number'],
            'role'         => $data['role'],
            'latitude'     => request()->ip(),
            'longitude'    => request()->ip(), 
            'description'  => $data['description'],
            'password'     => Hash::make($data['password']),   
            'latitude'     =>$data['lat'],
            'longitude'    =>$data['longitude'],
            
        ]);

        
      $user->notify(new smsNotification($user));
      
   
      return $user;


    }
    
    
    public function sendEmail(){

        $user=User::where('role',1)->get();

        return $user;
    }


    
}
