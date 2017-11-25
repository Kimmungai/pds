<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Bid;
use Session;

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
        session::flash('update_success', 'Ksh. '.$request->input('price').'/= bid placed successfully!');
      }
      else
      {
        session::flash('update_error', 'Bid failed!! Please contact support@webdesignerscenter.com for help');
      }
      return back();
    }
}
