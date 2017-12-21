<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use App\User;
use App\Project;
use App\UserAlerts;
use Mail;
use Session;
use Carbon;
use Auth;

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
      $newUser->password=bcrypt($request->input('password'));
      $newUser->email_token=$email_token;
      $email=new EmailVerification($newUser);
      if($newUser->save())
      {
        Mail::to($request->input('email'))->send($email);
        $newUserAlert=new UserAlerts;
        $newUserAlert->user_id=$newUser->id;
        $newUserAlert->save();
        session::flash('message', 'We have sent you an email to '.$request->input('email'). '. Check your inbox to complete registration!');
      }
      else
      {
        session::flash('error_message', 'Error!! please contact support@webdesignerscenter.com for help');
      }
      return back();
    }
    public function client_profile()
    {
      $user=User::with('UserMembership')->where('id','=',Auth::id())->first();
      return view('admin.client.profile',compact('user'));
    }
    public function alerts()
    {
      $userAlerts=UserAlerts::where('user_id','=',Auth::id())->first();
      return view('admin.client.alerts',compact('userAlerts'));
    }
    public function client_public_profile($client_id)
    {
      //$client_type=UserMembership::where('user_id','=',$client_id)->value('type');
      $limit='';
      $client=User::with('project')->where('id','=',$client_id)->first();
      $projects=Project::with('user','projectType','bid')->where('user_id','=',$client_id)->where('end_date','<>','')->limit($limit)->paginate(4);
      return view('client-public-profile',compact('client','projects'));
    }
}
