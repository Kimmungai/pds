<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Bid;
use App\Project;
use App\User;
use App\Chat;
use App\Company;
use Session;
use App\Mail\winnerNotification;
use App\Mail\clientBidChoiceNotification;
use Mail;

class bids extends Controller
{
    public function create(Request $request)
    {
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
        $average_price=Bid::where('project_id','=',$request->input('project_id'))->avg('bid_price');
        Project::where('id','=',$request->input('project_id'))->update(['avg_price'=>$average_price]);
        session::flash('update_success', 'Ksh. '.$request->input('price').'/= bid placed successfully!');
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
      $chat_session=new Chat;
      $chat_session->user_id=Auth::id();
      $chat_session->provider_id=$winner['id'];
      if(project::where('id','=',$bid_details['project_id'])->update([
        'final_price' => $bid_details['bid_price'],
        'winner' =>$bid_details['bidder_id']
      ]) && $chat_session->save()){
          $winnerProject=Project::where('id','=',$bid_details['project_id'])->where('user_id','=',Auth::id())->where('winner','=',$winner['id'])->first();
          $email_winner=new winnerNotification($winner,$winnerProject);
          $email_client=new clientBidChoiceNotification($winner,$winnerProject);
          Mail::to($winner['email'])->send($email_winner);
          Mail::to(Auth::user()->email)->send($email_client);
          session::flash('update_success', 'Bid closed successfully! A confirmation has been sent to '.$winner['company']['company_name']. ' through '.$winner['first_name'].' '.$winner['last_name'].' ( '.$winner['email'].' )');
      }else{
          session::flash('update_error', 'Failed! Kindly contact support@webdesignerscenter.com for assistance');
      }
      return back();
    }
}
