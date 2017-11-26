<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Project;
use Carbon\Carbon;
use App\Enquiry;
use Session;

class site extends Controller
{
    public function index()
    {
      $provider_companies=Company::paginate(4);
      $projects=Project::with('user','projectType','bid')->orderBy('created_at','desc')->paginate(2);
      return view('welcome',compact('provider_companies','projects'));
    }
    public function enquiry(Request $request)
    {
      $validatedData = $request->validate([
        'prospective_name' => 'required|max:255',
        'prospective_email' => 'required|email',
        'prospective_phone' => 'nullable|numeric|min:5',
        'prospective_message' => 'required',
      ]);
      $new_enquiry=new Enquiry;
      $new_enquiry->name=$request->input('prospective_name');
      $new_enquiry->email=$request->input('prospective_email');
      $new_enquiry->phone=$request->input('prospective_phone');
      $new_enquiry->message=$request->input('prospective_message');
      if($new_enquiry->save())
      {
        session::flash('update_success', 'Enquiry sent successfully! Our team will get back to you soon.');
      }
      else
      {
        session::flash('update_error', 'Enquiry not sent successfully! Kindly contact support@webdesignerscenter.com');
      }
      return back();
    }
}
