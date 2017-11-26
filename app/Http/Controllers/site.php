<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Project;
use Carbon\Carbon;

class site extends Controller
{
    public function index()
    {
      $provider_companies=Company::paginate(4);
      $projects=Project::with('user','projectType','bid')->orderBy('created_at','desc')->paginate(2);
      return view('welcome',compact('provider_companies','projects'));
    }
}
