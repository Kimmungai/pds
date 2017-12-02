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
      if(session('bid_types') && session('bid_types')==1){
        $filter='final_price';$criteria='';$sign='<>';
      }else if(session('bid_types') && session('bid_types')==2){
        $filter='final_price';$criteria='';$sign='=';
      }
        else{$filter='id';$criteria='';$sign='<>';
      }
      if(session('sort_projects') && session('sort_projects')==1)
      {
        $orderFilter='created_at';$orderCriteria='desc';
        session()->forget('sort_projects');
      }
      else if(session('sort_projects') && session('sort_projects')==2)
      {
        $orderFilter='created_at';$orderCriteria='asc';
      }
      else if(session('sort_projects') && session('sort_projects')==3)
      {
        $orderFilter='avg_price';$orderCriteria='asc';
      }
      else if(session('sort_projects') && session('sort_projects')==4)
      {
        $orderFilter='avg_price';$orderCriteria='desc';
      }
      else
      {
        $orderFilter='created_at';$orderCriteria='desc';
      }
      $provider_companies=Company::paginate(3);
      $projects=Project::with('user','projectType','bid')->where($filter,$sign,$criteria)->orderBy($orderFilter,$orderCriteria)->paginate(2);
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
    public function filter_closed($backTo=0)
    {
      session(['bid_types'=>1]);
      if($backTo){return $this->projects_display();}
      return $this->index();
    }
    public function filter_open($backTo=0)
    {
      session(['bid_types'=>2]);
      if($backTo){return $this->projects_display();}
      return $this->index();
    }
    public function filter_all($backTo=0)
    {
      session()->forget('bid_types');
      if($backTo){return $this->projects_display();}
      return $this->index();
    }
    public function sort(Request $request,$backTo=0)
    {
      session(['sort_projects'=>$request->input('sort-projects')]);
      if($backTo){return $this->projects_display();}
      return $this->index();;
    }
    function projects_display()
    {
      if(session('bid_types') && session('bid_types')==1){
        $filter='final_price';$criteria='';$sign='<>';
      }else if(session('bid_types') && session('bid_types')==2){
        $filter='final_price';$criteria='';$sign='=';
      }
        else{$filter='id';$criteria='';$sign='<>';
      }
      if(session('sort_projects') && session('sort_projects')==1)
      {
        $orderFilter='created_at';$orderCriteria='desc';
        session()->forget('sort_projects');
      }
      else if(session('sort_projects') && session('sort_projects')==2)
      {
        $orderFilter='created_at';$orderCriteria='asc';
      }
      else if(session('sort_projects') && session('sort_projects')==3)
      {
        $orderFilter='avg_price';$orderCriteria='asc';
      }
      else if(session('sort_projects') && session('sort_projects')==4)
      {
        $orderFilter='avg_price';$orderCriteria='desc';
      }
      else
      {
        $orderFilter='created_at';$orderCriteria='desc';
      }
      $projects=Project::with('user','projectType','bid')->where($filter,$sign,$criteria)->orderBy($orderFilter,$orderCriteria)->paginate(4);
      return view('projects',compact('projects'));
    }
}
