<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\ProjectType;
use App\Company;
use App\User;
use App\Bid;
use Session;

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
}
