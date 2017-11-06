<?php

namespace App\Http\Controllers\Auth;

use DB;
use Mail;
use App\User;
use App\UserMembership;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function verify($token)
    {
      if($user=User::where('email_token',$token)->firstOrFail())
      {
        $user->verified();
        $period=Carbon::now();
        //assign the user a membership
        $membership=new UserMembership;
        $membership->user_id=$user['id'];
        $membership->type=0;
        $membership->price=0;
        $membership->discount=0;
        $membership->start_date=$period;
        $membership->end_date=$period->addYears(10);
        if($membership->save())
        {
          session::flash('email_verified', 'Email verified, you can now log in to your account!');
        }
        else
        {
          session::flash('email_verified_error', 'Email not verified, contact '.env('MAIL_FROM_ADDRESS', 'support@webdesignerscenter.com').' for help');
        }
        return redirect('/login');
      }
      else
      {
        return back('/');
      }
    }
}
