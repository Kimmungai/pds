<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserMembership;
use App\Company;
use App\Project;
use App\ProjectType;
use Auth;
use Session;
use Carbon\Carbon;

class admin extends Controller
{
    public function profile()
    {
      $user=User::with('UserMembership','Project')->where('id','=',Auth::id())->first();
      $user_projects=$user->project()->with('ProjectType')->orderBy('created_at','desc')->paginate(4);
      $user_category=$user['UserMembership']['type'];
      $all_companies=count(Company::all());
      session(['all_companies'=>$all_companies]);
      if(session('sort')){$result_order=session('sort');}else{$result_order='desc';}
      if(session('filter')){$result_filter=session('filter');$sign='=';}else{$result_filter='';$sign='!=';}
      if(session('bid_filtering') && session('bid_filtering')==1){
        $field='final_price';
        $criteria_sign='=';
        $criteria=null;
      }else if(session('bid_filtering') && session('bid_filtering')==2){
        $field='final_price';
        $criteria_sign='<>';
        $criteria=null;
      }else if(session('bid_filtering') && session('bid_filtering')==3){
        $field='id';
        $criteria_sign='<>';
        $criteria=null;
      }else {
        $field='id';
        $criteria_sign='<>';
        $criteria=null;
      }
      switch($user_category)
      {
        case 0://Client = 0 zero
          return view('admin.client.top',compact('user','user_projects'));
        break;
        case 1://provider=1 positive numbers,
          $all_projects=Project::with('user')->where($field,$criteria_sign,$criteria)->whereHas('projectType', function ($query) {if(session('filter')){$result_filter=session('filter');$sign='=';}else{$result_filter='';$sign='!=';}$query->where('category', $sign, $result_filter);})->orderBy('created_at',$result_order)->paginate(4);
          $all_projects_types=ProjectType::orderBy('created_at',$result_order)->whereHas('project',function($query){
            if(session('bid_filtering') && session('bid_filtering')==1){
              $field='final_price';
              $criteria_sign='=';
              $criteria=null;
            }else if(session('bid_filtering') && session('bid_filtering')==2){
              $field='final_price';
              $criteria_sign='<>';
              $criteria=null;
            }else if(session('bid_filtering') && session('bid_filtering')==3){
              $field='id';
              $criteria_sign='<>';
              $criteria=null;
            }else {
              $field='id';
              $criteria_sign='<>';
              $criteria=null;
            }
            $query->where($field,$criteria_sign,$criteria);
          })->where('category',$sign,$result_filter)->paginate(4);
          return view('admin.provider.top',compact('all_projects','all_projects_types'));
        break;
        case -1://sys admin=negative numbers
          return view('admin.sys.top');
        break;
        default://provider=1 positive numbers,
          return view('admin.provider.top');
        break;
      }
      return back('/');
    }
    public function update_basic_details(Request $request)
    {
      $validatedData = $request->validate([
        'first_name' => 'required|max:255',
        'middle_name' => 'nullable|max:255',
        'last_name' => 'required|max:255',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      if(User::where('id','=',Auth::id())->update([
        'first_name' => $request->input('first_name'),
        'middle_name' => $request->input('middle_name'),
        'last_name' => $request->input('last_name'),
      ])){
          if($request->hasFile('avatar'))
          {
            $image=$request->avatar;
            $destinationPath = 'avatar';
            $extension=$request->avatar->extension();
            $name=Auth::id().'.'.$extension;
            $path='avatar/'.$name;
            $image->move($destinationPath, $name);
            User::where('id','=',Auth::id())->update(['avatar'=>$path]);
          }
          session::flash('update_success', 'Update succesful!');
         }
         else
         {
           session::flash('update_unsuccessful', 'Error!! please contact support@webdesignerscenter.com for help');
         }
      return back();

    }
    public function update_personal_details(Request $request)
    {
      $validatedData = $request->validate([
        'id_no' => 'nullable|numeric|min:5',
        'passport' => 'nullable|max:255',
        'nationality' => 'max:255',
        'dob' => 'nullable|max:255|date_format:m/d/Y',
      ]);
      if($request->input('dob')!=''){$dob=Carbon::createFromTimestamp(strtotime($request->input('dob')))->toDateString('m/d/Y');}else{$dob='';}
      if(User::where('id','=',Auth::id())->update([
        'id_no' => $request->input('id_no'),
        'passport' => $request->input('passport'),
        'nationality' => $request->input('nationality'),
        'dob' => $dob,
      ])){
          session::flash('update_success', 'Update succesful!');
         }
         else
         {
           session::flash('update_unsuccessful', 'Error!! please contact support@webdesignerscenter.com for help');
         }
      return back();

    }
    public function update_password_change(Request $request)
    {
      $validatedData = $request->validate([
        'current_password' => 'required|min:8',
        'new_password' => 'required|min:8',
        'new_password_confirmation' => 'required|min:8|same:new_password',
      ]);
      if(!Auth::attempt(['email' => Auth::user()->email, 'password' => $request->input('current_password')]))
      {
        session::flash('current_pass_mismatch', 'The current password was wrong!');
        return back();
      }
      if(User::where('id','=',Auth::id())->update([
        'password' => bcrypt($request->input('new_password')),
      ])){
          session::flash('update_success', 'Update succesful!');
         }
         else
         {
           session::flash('update_unsuccessful', 'Error!! please contact support@webdesignerscenter.com for help');
         }
      return back();

    }
    public function update_contact_details(Request $request)
    {
      $validatedData = $request->validate([
        'phone' => 'nullable|numeric|min:5',
        'address' => 'nullable|max:255',
        'website' => "nullable|max:255",
      ]);
      if(User::where('id','=',Auth::id())->update([
        'phone' => $request->input('phone'),
        'address' => $request->input('address'),
        'website' => $request->input('website'),
      ])){
          session::flash('update_success', 'Update succesful!');
         }
         else
         {
           session::flash('update_unsuccessful', 'Error!! please contact support@webdesignerscenter.com for help');
         }
      return back();

    }
    public function delete_account($id='')
    {
      $user=User::find(Auth::id());
      $user->userMembership()->delete();
      $user->chat()->delete();
      $user->project()->delete();
      $user->company()->delete();
      $user->delete();
      Auth::logout();
      return redirect('/');
    }
    public function company_details()
    {
      $company=Company::where('user_id','=',Auth::id())->first();
      return view('admin.provider.company',compact('company'));
    }
    public function provider_controls(Request $request)
    {
      $task=$request->input('task');
      switch($task)
      {
        case 'sort':
          if($request->input('sort-projects')==1)
          {
            session(['sort'=> 'desc']);
          }
          else
          {
            session(['sort'=> 'asc']);
          }
        break;
        case 'filter':
          session(['filter'=> $request->input('project-category')]);
          if(session('filter')==0){session()->forget('filter');}
        break;
        case 'bids':
        break;
        default:
          if(isset($_GET['projects']) && $_GET['projects'] == 0){
            session()->forget('sort');
            session()->forget('filter');
            session()->forget('bid_filtering');
          }else if(isset($_GET['projects']) && $_GET['projects'] == 1){
            session(['bid_filtering'=> 1]);
          }
          else if(isset($_GET['projects']) && $_GET['projects'] == 2){
            session(['bid_filtering'=> 2]);
          }
          else if(isset($_GET['projects']) && $_GET['projects'] == 3){
            session(['bid_filtering'=> 3]);
          }
        break;
      }
      return redirect('/profile');
    }
}
