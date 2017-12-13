<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\ProjectType;
use App\Company;
use App\Chat;
use App\User;
use App\Bid;
use Session;
use Auth;

class dynamic extends Controller
{
  public function project_details()
  {
    $data=array();
    $bidder_profiles=array();
    $count=0;
    $project_id=$_GET['project_id'];
    $data[0]=Project::with('ProjectType','Bid')->where('id','=',$project_id)->first();
    $bidders=Bid::where('project_id','=',$project_id)->get();
    foreach($bidders as $bidder)
    {
      $bidder_profiles[$count]=User::with('Company')->where('id','=',$bidder['bidder_id'])->first();
      $count++;
    }
    $data[1]=$bidder_profiles;
    session(['current_project_id'=>$project_id]);
    return $data;
  }
  public function chat_up()
  {
    $provider_id=$_GET['provider_id'];
    if(count(Chat::where('user_id','=',Auth::id())->where('provider_id','=',$provider_id)->first()))
    {
      return;
    }
    $new_chat=new Chat;
    $new_chat->user_id=Auth::id();
    $new_chat->provider_id=$provider_id;
    if(!$new_chat->save())
    {
      session::flash('update_error', 'Sorry the provider could not be selected! Kindly contact support@webdesignerscenter.com for help.');
    }
    $provider_ids=Chat::where('user_id','=',Auth::id())->get();
    $count=0;
    $providers=array();
    foreach($provider_ids as $provider_id)
    {
      $providers[$count]=User::where('id','=',$provider_id['provider_id'])->first();
      $count++;
    }
    return $providers;
  }
}
