<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use App\User;

class clients extends Controller
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
      $newUser->password=$request->input('password');
      $newUser->email_token=$email_token;
      $newUser->save();
      return $request;
    }
}
