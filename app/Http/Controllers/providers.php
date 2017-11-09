<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use App\User;
use Mail;
use Session;
use Carbon;
use Auth;


class providers extends Controller
{
  public function create(Request $request)
  {
    $validatedData = $request->validate([
      'first_name' => 'required|max:255',
      'middle_name' => 'max:255',
      'last_name' => 'required|max:255',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:8',
      'password_confirmation' => 'required|min:8|same:password',
    ]);

    $newUser=new User;
    $email_token=str_random(14);
    $newUser->first_name=$request->input('first_name');
    $newUser->middle_name=$request->input('middle_name');
    $newUser->last_name=$request->input('last_name');
    $newUser->email=$request->input('email');
    $newUser->password=bcrypt($request->input('password'));
    $newUser->email_token=$email_token;
    $email=new EmailVerification($newUser);
    if($newUser->save())
    {
      Mail::to($request->input('email'))->send($email);
      session::flash('message', 'We have sent you an email to '.$request->input('email'). '. Check your inbox to complete registration!');
      session::flash('deactivate-next', '0');
    }
    else
    {
      session::flash('error_message', 'Error!! please contact support@webdesignerscenter.com for help');
    }
    return back();
  }
}
