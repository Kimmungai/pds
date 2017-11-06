<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserMembership;
use Auth;

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
    public function client_profile()
    {
      $user=User::with('UserMembership')->where('id','=',Auth::id())->first();
      return view('admin.client.profile',compact('user'));
    }
}
