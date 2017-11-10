<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ProviderEmailVerification;
use App\User;
use App\Company;
use Mail;
use Session;
use Carbon;
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
      Mail::to($request->input('email'))->send($email);
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
      'company_website' => 'required|max:255',
      'company_description' => 'required|max:255',
    ]);
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
    $user_company->company_description=$request->input('company_description');
    if($user_company->save())
    {
      session::flash('update_success', 'Company details saved! Please proceed to fill the subscription details');
      return view('new-provider.bidder-register-subscription-details');
    }
    else
    {
      session::flash('company_update_error', 'Company not saved! Please contact support@webdesignerscenter.com for help');
      return back('/');
    }
  }
}
