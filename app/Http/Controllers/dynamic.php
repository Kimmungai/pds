<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\ProjectType;
use App\Company;
use App\Chat;
use App\ChatMessage;
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
    $data=array();
    $provider_id=$_GET['provider_id'];
    if(!count(Chat::where('user_id','=',Auth::id())->where('provider_id','=',$provider_id)->first()))
    {
      $new_chat=new Chat;
      $new_chat->user_id=Auth::id();
      $new_chat->provider_id=$provider_id;
      if(!$new_chat->save())
      {
        session::flash('update_error', 'Sorry the provider could not be selected! Kindly contact support@webdesignerscenter.com for help.');
      }
    }
    $provider_ids=Chat::where('user_id','=',Auth::id())->get();
    $count=0;
    $providers=array();
    foreach($provider_ids as $provider_id)
    {
      $providers[$count]=User::with('company')->where('id','=',$provider_id['provider_id'])->first();
      $count++;
    }
    $unread_messages=count(ChatMessage::where('recipient_id','=',Auth::id())->where('author_id','=',$provider_id['provider_id'])->where('read','=',0)->get());
    $data[0]=$providers;
    $data[1]=$unread_messages;
    return $data;
  }
  public function chat_messages()
  {
    if(Auth::id()==$_GET['client_id'] && !Auth::user()->userMembership->type)
    {
      $provider_id=$_GET['provider_id'];$client_id=$_GET['client_id'];
    }
    else if(Auth::id()==$_GET['provider_id'] && Auth::user()->userMembership->type)
    {
      $provider_id=$_GET['client_id'];$client_id=$_GET['provider_id'];
    }
    else
    {
      $provider_id=$_GET['client_id'];$client_id=$_GET['provider_id'];
    }
    $chat_id=Chat::where('provider_id','=',$provider_id)->where('user_id','=',$client_id)->value('id');
    $messages=ChatMessage::where('chat_id','=',$chat_id)->get();
    return $messages;
  }
  public function new_chat_messages()
  {
    if(Auth::id()==$_GET['client_id'] && !Auth::user()->userMembership->type)
    {
      $provider_id=$_GET['provider_id'];$client_id=$_GET['client_id'];
    }
    else if(Auth::id()==$_GET['provider_id'] && Auth::user()->userMembership->type)
    {
      $provider_id=$_GET['client_id'];$client_id=$_GET['provider_id'];
    }
    else
    {
      $provider_id=$_GET['client_id'];$client_id=$_GET['provider_id'];
    }
    $chat_message=$_GET['chat_message'];
    $chat_id=Chat::where('provider_id','=',$provider_id)->where('user_id','=',$client_id)->value('id');
    if(Auth::id()==$client_id){$author_id=$client_id;$recipient_id=$provider_id;}else{$author_id=$provider_id;$recipient_id=$client_id;}
    $new_message=new ChatMessage;
    $new_message->chat_id=$chat_id;
    $new_message->author_id=$author_id;
    $new_message->message=$chat_message;
    $new_message->recipient_id=$recipient_id;
    if($new_message->save())
    {

    }
    return;
  }
  public function pull_chat_messages()
  {
    if(Auth::id()==$_GET['client_id'] && !Auth::user()->userMembership->type)
    {
      $provider_id=$_GET['provider_id'];$client_id=$_GET['client_id'];
    }
    else if(Auth::id()==$_GET['provider_id'] && Auth::user()->userMembership->type)
    {
      $provider_id=$_GET['client_id'];$client_id=$_GET['provider_id'];
    }
    else
    {
      $provider_id=$_GET['client_id'];$client_id=$_GET['provider_id'];
    }
    $chat_id=Chat::where('provider_id','=',$provider_id)->where('user_id','=',$client_id)->value('id');
    ChatMessage::where('chat_id','=',$chat_id)->where('recipient_id','=',Auth::id())->update([
      'read' => 1,
    ]);
    $messages=ChatMessage::where('chat_id','=',$chat_id)->get();
    return $messages;
  }
  public function load_contacts()
  {
    $data=array();
    if(Auth::User()->userMembership->type)
    {
      $contact_ids=Chat::where('provider_id','=',Auth::id())->get();
      $count=0;
      $contacts=array();
      foreach($contact_ids as $contact_id)
      {
        $contacts[$count]=User::with('company')->where('id','=',$contact_id['user_id'])->first();
        $count++;
      }
      $unread_messages=count(ChatMessage::where('recipient_id','=',Auth::id())->where('author_id','=',$contact_id['user_id'])->where('read','=',0)->get());
    }
    else {
      $contact_ids=Chat::where('user_id','=',Auth::id())->get();
      $count=0;
      $contacts=array();
      foreach($contact_ids as $contact_id)
      {
        $contacts[$count]=User::with('company')->where('id','=',$contact_id['provider_id'])->first();
        $count++;
      }
      $unread_messages=count(ChatMessage::where('recipient_id','=',Auth::id())->where('author_id','=',$contact_id['provider_id'])->where('read','=',0)->get());
    }
    $data[0]=$contacts;
    $data[1]=$unread_messages;
    return $data;
  }
  public function check_new_messages()
  {
    $unread_messages=count(ChatMessage::where('recipient_id','=',Auth::id())->where('read','=',0)->get());
    return $unread_messages;
  }
}
