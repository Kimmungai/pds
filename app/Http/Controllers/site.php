<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Project;
use Carbon\Carbon;
use App\Enquiry;
use App\UserAlerts;
use App\User;
use App\UserMembership;
use Auth;
use Session;
use Mail;
use App\Mail\membershipExpiry;
use App\Mail\acknowledgeEnquiry;
use App\Mail\sendAdminEnquiry;

class site extends Controller
{
    public function index()
    {
      if(session('bid_types') && session('bid_types')==1){
        $filter='final_price';$criteria='';$sign='<>';
      }else if(session('bid_types') && session('bid_types')==2){
        $filter='final_price';$criteria=null;$sign='=';
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
      ##provider sorting starts here ##
      if(session('sort_providers') && session('sort_providers')==1)
      {
        $providerFilter='rank';$providerCriteria='desc';
        session()->forget('sort_providers');
      }
      else if(session('sort_providers') && session('sort_providers')==2)
      {
        $providerFilter='rank';$providerCriteria='asc';
      }
      else if(session('sort_providers') && session('sort_providers')==3)
      {
        $providerFilter='created_at';$providerCriteria='desc';
      }
      else if(session('sort_providers') && session('sort_providers')==4)
      {
        $providerFilter='created_at';$providerCriteria='asc';
      }
      else
      {
        $providerFilter='created_at';$providerCriteria='desc';
        session()->forget('sort_providers');
      }
      ##provider sorting ends here ##
      $provider_companies=Company::with('user')->orderBy($providerFilter,$providerCriteria)->paginate(3);
      $projects=Project::with('user','projectType','bid')->where($filter,$sign,$criteria)->where('end_date','<>','')->orderBy($orderFilter,$orderCriteria)->paginate(2);
      return view('landing',compact('provider_companies','projects'));
    }
    public function enquiry(Request $request)
    {
      $validatedData = $request->validate([
        'prospective_name' => 'required|max:255',
        'prospective_email' => 'required|email',
        'prospective_phone' => 'nullable|numeric|min:5',
        'prospective_message' => 'required',
        'prospective_subject' => 'required|max:255',
      ]);
      $new_enquiry=new Enquiry;
      $new_enquiry->name=$request->input('prospective_name');
      $new_enquiry->email=$request->input('prospective_email');
      $new_enquiry->phone=$request->input('prospective_phone');
      $new_enquiry->subject=$request->input('prospective_subject');
      $new_enquiry->message=$request->input('prospective_message');
      if($new_enquiry->save())
      {
        $acknowledge_enquiry=new acknowledgeEnquiry($new_enquiry);
        Mail::to($new_enquiry->email)->queue($acknowledge_enquiry);
        $notify_admin_enquiry=new sendAdminEnquiry($new_enquiry);
        Mail::to('enquiry@webdesignerscenter.com')->queue($notify_admin_enquiry);
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
    public function sort_providers(Request $request)
    {
      session(['sort_providers'=>$request->input('sort-providers')]);
      return $this->index();;
    }
    function projects_display()
    {
      if(session('bid_types') && session('bid_types')==1){
        $filter='final_price';$criteria='';$sign='<>';
      }else if(session('bid_types') && session('bid_types')==2){
        $filter='final_price';$criteria=null;$sign='=';
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
      $projects=Project::with('user','projectType','bid')->where($filter,$sign,$criteria)->where('end_date','<>','')->orderBy($orderFilter,$orderCriteria)->paginate(4);
      return view('projects',compact('projects'));
    }
    public function set_alerts(Request $request)
    {
      if(!count(UserAlerts::where('user_id','=',Auth::id())->get()))
      {
        $alerts=new UserAlerts;
        $alerts->user_id=Auth::id();
        if($request->input('project-posted')!=null){
        $alerts->alert1=$request->input('project-posted');
        $alerts->alert2=$request->input('project-type');
        $alerts->alert3=$request->input('project-closing');
        $alerts->alert4=$request->input('membership-expiry');
      }else if($request->input('project-bidded')!=null){
        $alerts->alert5=$request->input('project-bidded');
        $alerts->alert6=$request->input('project-desired-price');
        $alerts->alert7=$request->input('project-bidding-closing');
        }
        if($alerts->save())
        {
          session::flash('update_success', 'Alerts successfully set!');
        }
        else
        {
          session::flash('update_error', 'Alerts not set! Kindly contact support@webdesignerscenter.com');
        }
      }
      else
      {
        if($request->input('project-posted')!=null){
        if(UserAlerts::where('user_id','=',Auth::id())->update([
          'alert1' => $request->input('project-posted'),
          'alert2' => $request->input('project-type'),
          'alert3' => $request->input('project-closing'),
          'alert4' => $request->input('membership-expiry')
        ])){
          session::flash('update_success', 'Alerts successfully set!');
        }else{
          session::flash('update_error', 'Alerts not set! Kindly contact support@webdesignerscenter.com');
        }
      }else if($request->input('project-bidded')!=null){
        if(UserAlerts::where('user_id','=',Auth::id())->update([
          'alert5' => $request->input('project-bidded'),
          'alert6' => $request->input('project-desired-price'),
          'alert7' => $request->input('project-bidding-closing')
        ])){
          session::flash('update_success', 'Alerts successfully set!');
        }else{
          session::flash('update_error', 'Alerts not set! Kindly contact support@webdesignerscenter.com');
        }
      }
      }
      return back();
    }
    public function housekeeper()
    {
      // notify providers whose membership period will expire 3days and 1 day
      $all_providers=UserMembership::with('user')->where('type','<>',0)->get();
      foreach($all_providers as $provider)
      {
         $valid_days=Carbon::createFromTimeStamp(strtotime($provider['end_date']))->diffInDays();
         if($valid_days==3 || $valid_days==1)
         {
           if(UserAlerts::where('user_id','=',$provider['user_id'])->value('alert4'))//check if user wants membership expiry alert
           {
             $user_membership_email=new membershipExpiry($provider);
             Mail::to($provider['user']['email'])->queue($user_membership_email);
           }
         }
      }
      $this->close_expired_projects();
      return;
    }
    public function close_expired_projects()
    {
      $all_open_projects=Project::where('final_price','=',null)->get();
      foreach($all_open_projects as $project)
      {
        if(strtotime($project['valid_period']) < strtotime(Carbon::now()))
        {
          Project::where('id','=',$project['id'])->update(['final_price' => 0]);
        }
      }
    }
}
