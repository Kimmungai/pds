<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\ProjectType;
use Session;

class dynamic extends Controller
{
  public function project_details()
  {
    $project_id=$_GET['project_id'];
    $data=Project::with('ProjectType')->where('id','=',$project_id)->first();
    session(['current_project_id'=>$project_id]);
    return $data;
  }
}
