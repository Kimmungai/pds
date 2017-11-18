<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\ProjectType;

class dynamic extends Controller
{
  public function project_details()
  {
    $project_id=$_GET['project_id'];
    $data=Project::with('ProjectType')->where('id','=',$project_id)->first();
    return $data;
  }
}
