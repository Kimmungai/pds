<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ProviderEmailVerification;
use App\User;
use App\Project;
use App\Company;
use App\UserMembership;
use App\UserAlerts;
use Mail;
use Session;
use Carbon\Carbon;
use Auth;


class providers extends Controller
{
  public function create(Request $request)
  {
    $validatedData = $request->validate([
      'first_name' => 'required|max:255',
      'middle_name' => 'max:255',
      'last_name' => 'required|max:255',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:8',
      'terms' => 'required',
      'password_confirmation' => 'required|min:8|same:password',
    ]);

    $newUser=new User;
    $email_token=str_random(14);
    $newUser->first_name=$request->input('first_name');
    $newUser->middle_name=$request->input('middle_name');
    $newUser->last_name=$request->input('last_name');
    $newUser->email=$request->input('email');
    $newUser->password=bcrypt($request->input('password'));
    $newUser->email_token=$email_token;
    $email=new ProviderEmailVerification($newUser);
    if($newUser->save())
    {
      Mail::to($request->input('email'))->queue($email);
      $newUserAlert=new UserAlerts;
      $newUserAlert->user_id=$newUser->id;
      $newUserAlert->save();
      session::flash('message', 'We have sent you an email to '.$request->input('email'). '. Check your inbox to complete registration!');
      session::flash('deactivate-next', '0');
    }
    else
    {
      session::flash('error_message', 'Error!! please contact support@webdesignerscenter.com for help');
    }
    return back();
  }
  public function create_provider_company(Request $request)
  {
    $validatedData = $request->validate([
      'company_name' => 'required|max:255',
      'company_legal_name' => 'required|max:255',
      'company_reg_no' => 'required|max:255',
      'company_incoporation_date' => 'nullable|max:255|date_format:m/d/Y',
      'company_address' => 'required|max:255',
      'company_fax' => 'nullable|max:255',
      'company_tel' => 'required|numeric|min:5',
      'company_industry' => 'required|max:255',
      'company_website' => 'required|url|max:255',
      'company_youtube' => 'nullable|url|max:255',
      'company_description' => 'required',
    ]);
    if($request->input('company_youtube')!=''){$youtube_video=substr($request->input('company_youtube'),strrpos($request->input('company_youtube'),'=')+1);}else{$youtube_video='';}
    $user_company=new Company;
    $user_company->user_id=Auth::id();
    $user_company->company_name=$request->input('company_name');
    $user_company->company_legal_name=$request->input('company_legal_name');
    $user_company->company_reg_no=$request->input('company_reg_no');
    $user_company->company_incoporation_date=$request->input('company_incoporation_date');
    $user_company->company_address=$request->input('company_address');
    $user_company->company_fax=$request->input('company_fax');
    $user_company->company_tel=$request->input('company_tel');
    $user_company->company_industry=$request->input('company_industry');
    $user_company->company_website=$request->input('company_website');
    $user_company->company_youtube=$youtube_video;
    $user_company->company_description=$request->input('company_description');
    if($user_company->save())
    {
      session::flash('update_success', 'Company details saved! Please proceed to fill the subscription details');
      return view('new-provider.bidder-register-subscription-details');
    }
    else
    {
      session::flash('company_update_error', 'Company not saved! Please contact support@webdesignerscenter.com for help');
      return back();
    }
  }
  public function provider_membership(Request $request)
  {
    $validatedData = $request->validate([
      'type' => 'required|numeric|max:10',
    ]);
    //assign the user a membership
    $membership_type=$request->input('type');
    session(['billing_cycle' => $request->input('billing-cycle')]);
    if($membership_type==1){
      $start_date=Carbon::now();
      $end_date=Carbon::now()->addMonths(3);
      $price=0;
      $plan='Promotional Plan';
      session(['plan'=>1]);
      $this->create_membership($membership_type,$price,$start_date,$end_date,$plan);
      session(['total_subscription_fee'=>0]);
    }else if($membership_type==2){
      //return redirect('https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=M67CN4BLHKHUE');
      session(['plan'=>2]);
      $total=100 * session('billing_cycle');
      session(['total_subscription_fee'=>$total]);
    }else if($membership_type==3){
      //return redirect('https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=24YT9AAUYSD4U');
      session(['plan'=>3]);
      $total=200*session('billing_cycle');
      session(['total_subscription_fee'=>$total]);
    }else if($membership_type==4){
      //return redirect('https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=F248MB6X66M38');
      session(['plan'=>4]);
      $total=350*session('billing_cycle');
      session(['total_subscription_fee'=>$total]);
    }
    return redirect('service-provider-subscription');
  }
  public function create_provider_company_back()
  {
    $data=Company::where('user_id','=',Auth::id())->firstOrFail();
    return view('new-provider.bidder-register-company-details',compact('data'));
  }
  public function update_provider_company(Request $request)
  {
    $validatedData = $request->validate([
      'company_name' => 'required|max:255',
      'company_legal_name' => 'required|max:255',
      'company_reg_no' => 'required|max:255',
      'company_incoporation_date' => 'nullable|max:255|date_format:m/d/Y',
      'company_address' => 'required|max:255',
      'company_fax' => 'nullable|max:255',
      'company_tel' => 'required|numeric|min:5',
      'company_industry' => 'required|max:255',
      'company_website' => 'required|url|max:255',
      'company_youtube' => 'nullable|url|max:255',
      'company_description' => 'required',
    ]);
    if($request->input('company_youtube')!=''){$youtube_video=substr($request->input('company_youtube'),strrpos($request->input('company_youtube'),'=')+1);}else{$youtube_video='';}
    if(Company::where('user_id','=',Auth::id())->update([
      'company_name' => $request->input('company_name'),
      'company_legal_name' => $request->input('company_legal_name'),
      'company_reg_no' => $request->input('company_reg_no'),
      'company_incoporation_date' => $request->input('company_incoporation_date'),
      'company_address' => $request->input('company_address'),
      'company_fax' => $request->input('company_fax'),
      'company_tel' => $request->input('company_tel'),
      'company_industry' => $request->input('company_industry'),
      'company_website' => $request->input('company_website'),
      'company_youtube' => $youtube_video,
      'company_description' => $request->input('company_description'),
    ]))
    {
      session::flash('update_success', 'Company Details Updated!');
      return redirect('/service-provider-subscription');
    }
    else
    {
      session::flash('company_update_error', 'Company details not updated! Please contact support@webdesignerscenter.com for help');
      return back();
    }
  }
  public function payment_basic_sucess()
  {
    $start_date=Carbon::now();
    $end_date=Carbon::now()->addMonths(1);
    $price=10000;
    $plan='Basic Plan';
    $membership_type=2;
    $this->create_membership($membership_type,$price,$start_date,$end_date,$plan);
    session(['plan'=>2]);
    return redirect('service-provider-subscription');
  }
  public function payment_basic_aborted()
  {
    $plan='Basic Plan';
    session()->forget('plan');
    session()->forget('finish_registration');
    session::flash('plan_error', $plan.' Has not been selected!.');
    return redirect('service-provider-subscription');
  }
  public function payment_silver_sucess()
  {
    $start_date=Carbon::now();
    $end_date=Carbon::now()->addMonths(4);
    $price=27500;
    $plan='Silver Plan';
    $this->create_membership($membership_type,$price,$start_date,$end_date,$plan);
    session(['plan'=>3]);
    return redirect('service-provider-subscription');
  }
  public function payment_silver_aborted()
  {
    $plan='Silver Plan';
    session()->forget('plan');
    session()->forget('finish_registration');
    session::flash('plan_error', $plan.' Has not been selected!.');
    return redirect('service-provider-subscription');
  }
  public function payment_gold_sucess()
  {
    $start_date=Carbon::now();
    $end_date=Carbon::now()->addYears(1);
    $price=100000;
    $plan='Gold Plan';
    $this->create_membership($membership_type,$price,$start_date,$end_date,$plan);
    session(['plan'=>4]);
    return redirect('service-provider-subscription');
  }
  public function payment_gold_aborted()
  {
    $plan='Gold Plan';
    session()->forget('plan');
    session()->forget('finish_registration');
    session::flash('plan_error', $plan.' Has not been selected!.');
    return redirect('service-provider-subscription');
  }
  private function create_membership($membership_type,$price,$start_date,$end_date,$plan)
  {
    if(!count(UserMembership::where('user_id','=',Auth::id())->get()))//check if user already choose a membership
    {
      $membership=new UserMembership;
      $membership->user_id=Auth::id();
      $membership->type=$membership_type;
      $membership->price=$price;
      $membership->discount=0;
      $membership->start_date=$start_date;
      $membership->end_date=$end_date;
      if($membership->save())
      {
          session::flash('plan_success', $plan.' Has been successfully selected!');
          session(['finish_registration'=>1]);
      }
      else
      {
          session::flash('plan_error', $plan.' Has not been selected! Contact info@webdesignerscenter.com for help.');
      }
    }
    else
    {
      if(UserMembership::where('user_id','=',Auth::id())->update([
        'type' => $membership_type,
        'price'=> $price,
        'discount' => 0,
        'start_date' => $start_date,
        'end_date' => $end_date,
      ])){
        session::flash('plan_success', $plan.' Has been successfully updated!');
        session(['finish_registration'=>1]);
      }
      else {
        session::flash('plan_error', $plan.' Has not been updated! Contact info@webdesignerscenter.com for help.');
      }
    }
  }
  public function provider_profile()
  {
    $user=User::with('UserMembership')->where('id','=',Auth::id())->first();
    $user_category=$user['UserMembership']['type'];
    return view('admin.provider.profile',compact('user'));
  }
  public function update_company_incorp_details(Request $request)
  {
    $validatedData = $request->validate([
      'company_name' => 'required|max:255',
      'company_legal_name' => 'required|max:255',
      'company_reg_no' => 'required|max:255',
      'company_incoporation_date' => 'nullable|max:255|date_format:m/d/Y',
      'company_reg_cert' => 'nullable|mimes:pdf|max:2000',
    ]);
    if(Company::where('user_id','=',Auth::id())->update([
      'company_name' => $request->input('company_name'),
      'company_legal_name' => $request->input('company_legal_name'),
      'company_reg_no' => $request->input('company_reg_no'),
      'company_incoporation_date' => $request->input('company_incoporation_date'),
    ]))
    {
      if($request->hasFile('company_reg_cert'))
      {
        $image=$request->company_reg_cert;
        $destinationPath = 'Inc_certs';
        $extension=$request->company_reg_cert->extension();
        $name=$request->input('company_name').'.'.$extension;
        $path='Inc_certs/'.$name;
        $image->move($destinationPath, $name);
        Company::where('user_id','=',Auth::id())->update(['company_reg_cert'=>$path]);
      }
      session::flash('update_success', 'Company Details Updated!');
      return back();
    }
    else
    {
      session::flash('company_update_error', 'Company details not updated! Please contact support@webdesignerscenter.com for help');
      return back();
    }
  }
  public function company_contacts_update(Request $request)
  {
    $validatedData = $request->validate([
      'company_address' => 'required|max:255',
      'company_fax' => 'nullable|max:255',
      'company_tel' => 'required|numeric|min:5',
      'company_website' => 'required|max:255',
      'company_email' => 'nullable|email',
    ]);
    if(Company::where('user_id','=',Auth::id())->update([
      'company_address' => $request->input('company_address'),
      'company_fax' => $request->input('company_fax'),
      'company_tel' => $request->input('company_tel'),
      'company_website' => $request->input('company_website'),
      'company_email' => $request->input('company_email')
    ]))
    {
      session::flash('update_success', 'Company Details Updated!');
    }
    else
    {
      session::flash('company_update_error', 'Company details not updated! Please contact support@webdesignerscenter.com for help');
    }
    return back();
  }
  public function update_company_promotion(Request $request)
  {
    $validatedData = $request->validate([
      'company_industry' => 'required|max:255',
      'company_description' => 'required',
      'company_youtube' => 'nullable|url|max:255',
    ]);
    if($request->input('company_youtube')!=''){$youtube_video=substr($request->input('company_youtube'),strrpos($request->input('company_youtube'),'=')+1);}else{$youtube_video='';}
    if(Company::where('user_id','=',Auth::id())->update([
      'company_industry' => $request->input('company_industry'),
      'company_description' => $request->input('company_description'),
      'company_youtube' => $youtube_video,
    ]))
    {
      session::flash('update_success', 'Company Details Updated!');
    }
    else
    {
      session::flash('company_update_error', 'Company details not updated! Please contact support@webdesignerscenter.com for help');
    }
    return back();
  }
  function membership()
  {
    $membership=UserMembership::where('user_id','=',Auth::id())->first();
    return view('admin.provider.subscription',compact('membership'));
  }
  function chats()
  {
    $membership=UserMembership::where('user_id','=',Auth::id())->first();
    return view('admin.provider.chat',compact('membership'));
  }
  public function alerts()
  {
    $userAlerts=UserAlerts::where('user_id','=',Auth::id())->first();
    return view('admin.provider.alerts',compact('userAlerts'));
  }
  public function public_profile($provider_id)
  {
    $provider_type=UserMembership::where('user_id','=',$provider_id)->value('type');
    if($provider_type==0 || $provider_type==1){$limit='';}else if($provider_type==2){$limit=2;}else if($provider_type==3){$limit=5;}else if($provider_type==4){$limit='';}
    $provider=User::with('company')->where('id','=',$provider_id)->first();
    $projects_completed=count(Project::where('winner','=',$provider_id)->get());

    if($provider_type==0 || $provider_type==1)
    {
      $projects=[];
    }
    else
    {
      $projects=Project::with('user','projectType','bid')->where('winner','=',$provider_id)->where('end_date','<>','')->offset($limit)->paginate(4);
    }

    return view('provider-public-profile',compact('provider','projects_completed','projects'));
  }
  public function renew_membership()
  {
    $chosen_plan=$_GET['choosen_plan'];
    $billing_cycle=$_GET['billing_cycle'];
    $price=$_GET['total_price'];
    $dt=Carbon::now();
    if(UserMembership::where('user_id','=',Auth::id())->update([
      'type' => $chosen_plan,
      'start_date' => Carbon::now(),
      'end_date' => $dt->addMonths($billing_cycle),
      'price' => $price,
    ]))
    {
      session(['finish_registration'=>1]);
      session(['plan'=>$chosen_plan]);
      return 1;
    }
    else {
      session()->forget('finish_registration');
      session()->forget('plan');
      session()->forget('billing_cycle');
      return 0;
    }
  }
}
