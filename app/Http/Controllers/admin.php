<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserMembership;
use Auth;
use Session;
use Carbon\Carbon;

class admin extends Controller
{
    public function profile()
    {
      $user=User::with('UserMembership')->where('id','=',Auth::id())->first();
      $user_category=$user['UserMembership']['type'];
      switch($user_category)
      {
        case 0://Client = 0
          return view('admin.client.top',compact('user'));
        break;
        case 1://provider=1,
          return view('admin.provider.top',compact('user'));
        break;
        case 2://sys admin=2
          return view('admin.sys.top',compact('user'));
        break;
      }
      return back('/');
    }
    public function update_basic_details(Request $request)
    {
      $validatedData = $request->validate([
        'first_name' => 'required|max:255',
        'middle_name' => 'nullable|max:255',
        'last_name' => 'required|max:255',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      if(User::where('id','=',Auth::id())->update([
        'first_name' => $request->input('first_name'),
        'middle_name' => $request->input('middle_name'),
        'last_name' => $request->input('last_name'),
      ])){
          if($request->hasFile('avatar'))
          {
            $image=$request->avatar;
            $destinationPath = 'avatar';
            $extension=$request->avatar->extension();
            $name=Auth::id().'.'.$extension;
            $path='avatar/'.$name;
            $image->move($destinationPath, $name);
            User::where('id','=',Auth::id())->update(['avatar'=>$path]);
          }
          session::flash('update_success', 'Update succesful!');
         }
         else
         {
           session::flash('update_unsuccessful', 'Error!! please contact support@webdesignerscenter.com for help');
         }
      return back();

    }
    public function update_personal_details(Request $request)
    {
      $validatedData = $request->validate([
        'id_no' => 'nullable|numeric|min:5',
        'passport' => 'nullable|max:255',
        'nationality' => 'max:255',
        'dob' => 'nullable|max:255|date_format:m/d/Y',
      ]);
      if($request->input('dob')!=''){$dob=Carbon::createFromTimestamp(strtotime($request->input('dob')))->toDateString('m/d/Y');}else{$dob='';}
      if(User::where('id','=',Auth::id())->update([
        'id_no' => $request->input('id_no'),
        'passport' => $request->input('passport'),
        'nationality' => $request->input('nationality'),
        'dob' => $dob,
      ])){
          session::flash('update_success', 'Update succesful!');
         }
         else
         {
           session::flash('update_unsuccessful', 'Error!! please contact support@webdesignerscenter.com for help');
         }
      return back();

    }
    public function update_password_change(Request $request)
    {
      $validatedData = $request->validate([
        'current_password' => 'required|min:8',
        'new_password' => 'required|min:8',
        'new_password_confirmation' => 'required|min:8|same:new_password',
      ]);
      if(!Auth::attempt(['email' => Auth::user()->email, 'password' => $request->input('current_password')]))
      {
        session::flash('current_pass_mismatch', 'The current password was wrong!');
        return back();
      }
      if(User::where('id','=',Auth::id())->update([
        'password' => bcrypt($request->input('new_password')),
      ])){
          session::flash('update_success', 'Update succesful!');
         }
         else
         {
           session::flash('update_unsuccessful', 'Error!! please contact support@webdesignerscenter.com for help');
         }
      return back();

    }
    public function update_contact_details(Request $request)
    {
      $validatedData = $request->validate([
        'phone' => 'nullable|numeric|min:5',
        'address' => 'nullable|max:255',
        'website' => "nullable|max:255",
      ]);
      if(User::where('id','=',Auth::id())->update([
        'phone' => $request->input('phone'),
        'address' => $request->input('address'),
        'website' => $request->input('website'),
      ])){
          session::flash('update_success', 'Update succesful!');
         }
         else
         {
           session::flash('update_unsuccessful', 'Error!! please contact support@webdesignerscenter.com for help');
         }
      return back();

    }
    public function delete_account($id='')
    {
      $user=User::find(Auth::id());
      $user->userMembership()->delete();
      $user->chat()->delete();
      $user->project()->delete();
      $user->delete();
      Auth::logout();
      return redirect('/');
    }
}
