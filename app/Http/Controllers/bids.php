<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Bid;
use App\Project;
use App\User;
use App\UserMembership;
use App\UserAlerts;
use App\Chat;
use App\Company;
use Session;
use App\Mail\winnerNotification;
use App\Mail\clientBidChoiceNotification;
use App\Mail\BidEvent;
use App\Mail\BidClosingNotification;
use Mail;
use Carbon\Carbon;

class bids extends Controller
{
    public function create(Request $request)
    {
      $no_of_bids_placed_today=Bid::where('bidder_id','=',Auth::id())->whereDate('created_at', '=', Carbon::today()->toDateString())->distinct('project_id')->count('project_id');
      if(Auth::user()->userMembership->type==1)//promotional plan (2 bids per day)
      {
        if($no_of_bids_placed_today > 2)
        {
          session::flash('update_error', 'Bid failed!! You have exhausted your daily bidding limit ');
          session::flash('daily_bidding_limit',1);
          return back();
        }
      }
      else if(Auth::user()->userMembership->type==2)//basic plan (7 bids per day)
      {
        if($no_of_bids_placed_today > 7)
        {
          session::flash('update_error', 'Bid failed!! You have exhausted your daily bidding limit ');
          session::flash('daily_bidding_limit',1);
          return back();
        }
      }
      else if(Auth::user()->userMembership->type==3)//silver plan (14 bids per day)
      {
        if($no_of_bids_placed_today > 14)
        {
          session::flash('update_error', 'Bid failed!! You have exhausted your daily bidding limit ');
          session::flash('daily_bidding_limit',1);
          return back();
        }
      }
      else if(Auth::user()->userMembership->type==4)//gold plan (unlimited bids)
      {

      }

      $validatedData = $request->validate([
        'price' => 'required|numeric',
        'project_id' => 'required|numeric',
      ]);
      $new_bid=new Bid;
      $new_bid->project_id=$request->input('project_id');
      $new_bid->bidder_id=Auth::id();
      $new_bid->bid_price=$request->input('price');
      $new_bid->message=$request->input('message');
      if($new_bid->save())
      {
        $average_price=round(Bid::where('project_id','=',$request->input('project_id'))->avg('bid_price'),2);
        Project::where('id','=',$request->input('project_id'))->update(['avg_price'=>$average_price]);
        $project=Project::where('id','=',$request->input('project_id'))->first();
        $bidder=User::with('company')->where('id','=',Auth::id())->first();
        $client=User::where('id','=',$project['user_id'])->first();
        $clientOptions=UserAlerts::where('id','=',$project['user_id'])->first();
        session::flash('update_success', '$ '.$request->input('price').'/= bid placed successfully!');
        $this->notify_stakeholders($new_bid,$client,$project,$bidder,$clientOptions);
      }
      else
      {
        session::flash('update_error', 'Bid failed!! Please contact support@webdesignerscenter.com for help');
      }
      return back();
    }
    public function close($bid_id)
    {
      $bid_details=Bid::where('id','=',$bid_id)->first();
      $winner=User::with('Company')->where('id','=',$bid_details['bidder_id'])->first();
      if(!count(Chat::where('user_id','=',Auth::id())->where('provider_id','=',$winner['id'])))
      {
        $chat_session=new Chat;
        $chat_session->user_id=Auth::id();
        $chat_session->provider_id=$winner['id'];
        $chat_session->save();
      }
      if(project::where('id','=',$bid_details['project_id'])->update([
        'final_price' => $bid_details['bid_price'],
        'winner' =>$bid_details['bidder_id']
      ])){
          $winnerProject=Project::with(['projectType','bid'])->where('id','=',$bid_details['project_id'])->where('user_id','=',Auth::id())->where('winner','=',$winner['id'])->first();
          $email_winner=new winnerNotification($winner,$winnerProject);
          $email_client=new clientBidChoiceNotification($winner,$winnerProject);
          Mail::to($winner['email'])->queue($email_winner);
          Mail::to(Auth::user()->email)->queue($email_client);
          //notify subscribers of bid clousure
          $client=User::where('id','=',Auth::id())->first();
          $this->notify_bid_closed($client,$winnerProject,$winner);

          session::flash('update_success', 'Bid closed successfully! A confirmation has been sent to '.$winner['company']['company_name']. ' through '.$winner['first_name'].' '.$winner['last_name'].' ( '.$winner['email'].' )');
      }else{
          session::flash('update_error', 'Failed! Kindly contact support@webdesignerscenter.com for assistance');
      }
      return back();
    }
    private function notify_stakeholders($bid,$client,$project,$bidder,$clientOptions)
    {
      if($clientOptions['alert5'])
      {
        $notify_bid_to_client=new BidEvent($bid,$client,$project,$bidder);
        Mail::to($client['email'])->queue($notify_bid_to_client);
      }
    }
    private function notify_bid_closed($client,$project,$winner)
    {
      $subscribers=UserMembership::where('type','<>',0)->get();
      foreach ($subscribers as $subscriber)
      {
        if(UserAlerts::where('user_id','=',$subscriber['user_id'])->value('alert3'))
        {
          $subscriber_details=User::where('id','=',$subscriber['user_id'])->first();
          if($winner['id'] != $subscriber_details['id'])
          {
            $notify_subscriber=new BidClosingNotification($client,$project,$subscriber_details,$winner);
            Mail::to($subscriber_details['email'])->queue($notify_subscriber);
          }
        }
      }
    }
}
