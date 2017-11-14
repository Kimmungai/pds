<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class site extends Controller
{
    public function index()
    {
      $provider_companies=Company::paginate(4);
      return view('welcome',compact('provider_companies'));
    }
}
