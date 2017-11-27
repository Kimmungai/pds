<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\ProjectType;
use App\Company;
use Session;

class dynamic extends Controller
{
  public function project_details()
  {
    $project_id=$_GET['project_id'];
    $data=Project::with('ProjectType','Bid')->where('id','=',$project_id)->first();
    session(['current_project_id'=>$project_id]);
    return $data;
  }
  public function company_name()
  {
    $company_id=$_GET['company_id'];
    $data=Company::where('user_id','=',$company_id)->value('company_name');
    return $data;
  }
}
