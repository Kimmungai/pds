<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Carbon\Carbon;
use App\Project;
use App\User;
use App\UserAlerts;
use App\UserMembership;
use App\ProjectType;
use App\Bid;
use Mail;
use App\Mail\NewProjectNotification;


class projects extends Controller
{
    public function create(Request $request)
    {
      $validatedData = $request->validate([
        'title' => 'required|max:255',
        'mobile-app' => '',
        'e-commerce' => '',
        'blog' => '',
        'website' => '',
        'description' => 'required',
        'caption' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1000',
      ]);
      $new_project=new Project;
      $new_project->user_id=Auth::id();
      $new_project->title=$request->input('title');
      $new_project->description=$request->input('description');
      $dt = Carbon::now();
      $new_project->valid_period=$dt->addDays(10);
      if($new_project->save())
      {
        if($request->hasFile('caption'))
        {
          $image=$request->caption;
          $destinationPath = 'project-captions';
          $extension=$request->caption->extension();
          $name=$new_project->id.'.'.$extension;
          $path='project-captions/'.$name;
          $image->move($destinationPath, $name);
          Project::where('id','=',$new_project->id)->update(['caption'=>$path]);
        }
        #########save project cetegory starts here#####
        $new_project_category=new ProjectType;
        $new_project_category->project_id=$new_project->id;
        $new_project_category->category=$request->input('category');
        $new_project_category->save();
        #########save project category ends here######
        session::flash('project_basic_saved', 'Project basic details succesfully saved!');
        session(['new_project_id'=>$new_project->id]);
        return redirect('/new-project-features');
      }
      else
      {
        session::flash('project_basic_details_error', 'Error!! please contact support@webdesignerscenter.com for help');
        return back();
      }
    }
    public function basic_back($id)
    {
      $data=Project::with('ProjectType')->where('id','=',$id)->first();
      $category=ProjectType::where('project_id','=',$id)->first();
      return view('new-project.new-project',compact('data','category'));
    }
    public function project_basic_update(Request $request)
    {
      $validatedData = $request->validate([
        'title' => 'required|max:255',
        'mobile-app' => '',
        'e-commerce' => '',
        'blog' => '',
        'website' => '',
        'description' => 'required',
      ]);
      if(Project::where('id','=',session('new_project_id'))->update([
        'title' => $request->input('title'),
        'description' => $request->input('description')
      ]))
      {
        if($request->hasFile('caption'))
        {
          $image=$request->caption;
          $destinationPath = 'project-captions';
          $extension=$request->caption->extension();
          $name=session('new_project_id').'.'.$extension;
          $path='project-captions/'.$name;
          $image->move($destinationPath, $name);
          Project::where('id','=',session('new_project_id'))->update(['caption'=>$path]);
        }
        #########save project cetegory starts here######
        if(count(ProjectType::where('project_id','=',session('new_project_id'))))
        {
          ProjectType::where('project_id','=',session('new_project_id'))->Update([
            "category" => $request->input('category'),
          ]);
        }
        else
        {
          $new_project_category=new ProjectType;
          $new_project_category->project_id=session('new_project_id');
          $new_project_category->category=$request->input('category');
          $new_project_category->save();
        }
        #########save project category ends here######
        session::flash('project_basic_updated', 'Project basic details succesfully updated!');
        return redirect('/new-project-features');
      }
      else{
        session::flash('project_basic_details_error', 'Error!! please contact support@webdesignerscenter.com for help');
        return back();
      }
    }
    public function project_features_create(Request $request)
    {
      if($request->input('feature1')){$feature1=$request->input('feature1');}else{$feature1=0;}
      if($request->input('feature2')){$feature2=$request->input('feature2');}else{$feature2=0;}
      if($request->input('feature3')){$feature3=$request->input('feature3');}else{$feature3=0;}
      if($request->input('feature4')){$feature4=$request->input('feature4');}else{$feature4=0;}
      if($request->input('feature5')){$feature5=$request->input('feature5');}else{$feature5=0;}
      if($request->input('feature6')){$feature6=$request->input('feature6');}else{$feature6=0;}
      if($request->input('feature7')){$feature7=$request->input('feature7');}else{$feature7=0;}
      if($request->input('feature8')){$feature8=$request->input('feature8');}else{$feature8=0;}
      ProjectType::where('project_id','=',session('new_project_id'))->Update([
        "feature1" => $feature1,
        "feature2" => $feature2,
        "feature3" => $feature3,
        "feature4" => $feature4,
        "feature5" => $feature5,
        "feature6" => $feature6,
        "feature7" => $feature7,
        "feature8" => $feature8,
        "other_features" => $request->input('other-features')
      ]);
      if($request->hasFile('feature9'))
      {
        $image=$request->feature9;
        $destinationPath = 'project-specifications/document-1/';
        $extension=$request->feature9->extension();
        $name=session('new_project_id').'.'.$extension;
        $path='project-specifications/document-1/'.$name;
        $image->move($destinationPath, $name);
        ProjectType::where('project_id','=',session('new_project_id'))->update(['feature9'=>$path]);
      }
      if($request->hasFile('feature10'))
      {
        $image=$request->feature10;
        $destinationPath = 'project-specifications/document-2/';
        $extension=$request->feature10->extension();
        $name=session('new_project_id').'.'.$extension;
        $path='project-specifications/document-2/'.$name;
        $image->move($destinationPath, $name);
        ProjectType::where('project_id','=',session('new_project_id'))->update(['feature10'=>$path]);
      }
      if($request->hasFile('feature11'))
      {
        $image=$request->feature11;
        $destinationPath = 'project-specifications/document-3/';
        $extension=$request->feature11->extension();
        $name=session('new_project_id').'.'.$extension;
        $path='project-specifications/document-3/'.$name;
        $image->move($destinationPath, $name);
        ProjectType::where('project_id','=',session('new_project_id'))->update(['feature11'=>$path]);
      }
      session::flash('project_features_updated', 'Project Features succesfully Saved!');
      return redirect('/new-project-schedule');
    }
    public function new_project_features_back()
    {
      $data=Project::with('ProjectType')->where('id','=',session('new_project_id'))->first();
      $category=ProjectType::where('project_id','=',session('new_project_id'))->first();
      return view('new-project.new-project-features',compact('data','category'));
    }
    public function project_schedule_create(Request $request)
    {
      $validatedData = $request->validate([
        'start_date' => 'required|max:255|date_format:m/d/Y',
        'end_date' => 'required|max:255|date_format:m/d/Y',
        'desired_price' => 'nullable|numeric',
        'message_to_bidders' => 'nullable|max:255',
        'terms' => 'required',
      ]);
      Project::where('id','=',session('new_project_id'))->update([
        'start_date' => $request->input('start_date'),
        'end_date' => $request->input('end_date'),
        'desired_price' => $request->input('desired_price'),
        'message_to_bidders' => $request->input('message_to_bidders')
      ]);
      #Notify bidders of the new project
      $this->notify_bidders(session('new_project_id'));

      session::flash('update_success', 'Project saved successfully!');
      session()->forget('new_project_id');
      return redirect('profile');
    }
    public function new_project_schedule_form()
    {
      if(session('new_project_id'))
      {
        $data=Project::with('ProjectType')->where('id','=',session('new_project_id'))->first();
        $category=ProjectType::where('project_id','=',session('new_project_id'))->first();
        return view('new-project.new-project-schedule',compact('data','category'));
      }
      else
      {
        return view('new-project.new-project-schedule');
      }
    }
    public function new_project_features_form()
    {
      if(session('new_project_id'))
      {
        $data=Project::with('ProjectType')->where('id','=',session('new_project_id'))->first();
        $category=ProjectType::where('project_id','=',session('new_project_id'))->first();
        return view('new-project.new-project-features',compact('data','category'));
      }
      else
      {
        return view('new-project.new-project-features');
      }
    }
    public function quick_new_project(Request $request)
    {
      $validatedData = $request->validate([
        'title' => 'required|max:255',
        'category' => 'required',
        'description' => 'required',
        'start_date' => 'required|max:255|date_format:m/d/Y',
        'end_date' => 'required|max:255|date_format:m/d/Y',
        'desired_price' => 'nullable|numeric',
        'message_to_bidders' => 'nullable|max:255',
        'caption' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1000',
        "feature9" => "nullable|mimes:pdf|max:2000",
        "feature10" => "nullable|mimes:pdf|max:2000",
        "feature11" => "nullable|mimes:pdf|max:2000"
      ]);
      if($request->input('feature1')){$feature1=$request->input('feature1');}else{$feature1=0;}
      if($request->input('feature2')){$feature2=$request->input('feature2');}else{$feature2=0;}
      if($request->input('feature3')){$feature3=$request->input('feature3');}else{$feature3=0;}
      if($request->input('feature4')){$feature4=$request->input('feature4');}else{$feature4=0;}
      if($request->input('feature5')){$feature5=$request->input('feature5');}else{$feature5=0;}
      if($request->input('feature6')){$feature6=$request->input('feature6');}else{$feature6=0;}
      if($request->input('feature7')){$feature7=$request->input('feature7');}else{$feature7=0;}
      if($request->input('feature8')){$feature8=$request->input('feature8');}else{$feature8=0;}
      $new_project=new Project;
      $new_project->user_id=Auth::id();
      $new_project->title=$request->input('title');
      $new_project->description=$request->input('description');
      $new_project->start_date=$request->input('start_date');
      $new_project->end_date=$request->input('end_date');
      $new_project->desired_price=$request->input('desired_price');
      $new_project->message_to_bidders=$request->input('message_to_bidders');
      $dt = Carbon::now();
      $new_project->valid_period=$dt->addDays(10);
      if($new_project->save())
      {
        if($request->hasFile('caption'))
        {
          $image=$request->caption;
          $destinationPath = 'project-captions';
          $extension=$request->caption->extension();
          $name=$new_project->id.'.'.$extension;
          $path='project-captions/'.$name;
          $image->move($destinationPath, $name);
          Project::where('id','=',$new_project->id)->update(['caption'=>$path]);
        }
        $new_type=new ProjectType;
        $new_type->project_id=$new_project->id;
        $new_type->category=$request->input('category');
        $new_type->feature1=$feature1;
        $new_type->feature2=$feature2;
        $new_type->feature3=$feature3;
        $new_type->feature4=$feature4;
        $new_type->feature5=$feature5;
        $new_type->feature6=$feature6;
        $new_type->feature7=$feature7;
        $new_type->feature8=$feature8;
        if($new_type->save())
        {
          if($request->hasFile('feature9'))
          {
            $image=$request->feature9;
            $destinationPath = 'project-specifications/document-1/';
            $extension=$request->feature9->extension();
            $name=$new_project->id.'.'.$extension;
            $path='project-specifications/document-1/'.$name;
            $image->move($destinationPath, $name);
            ProjectType::where('project_id','=',$new_project->id)->update(['feature9'=>$path]);
          }
          if($request->hasFile('feature10'))
          {
            $image=$request->feature10;
            $destinationPath = 'project-specifications/document-2/';
            $extension=$request->feature10->extension();
            $name=$new_project->id.'.'.$extension;
            $path='project-specifications/document-2/'.$name;
            $image->move($destinationPath, $name);
            ProjectType::where('project_id','=',$new_project->id)->update(['feature10'=>$path]);
          }
          if($request->hasFile('feature11'))
          {
            $image=$request->feature11;
            $destinationPath = 'project-specifications/document-3/';
            $extension=$request->feature11->extension();
            $name=$new_project->id.'.'.$extension;
            $path='project-specifications/document-3/'.$name;
            $image->move($destinationPath, $name);
            ProjectType::where('project_id','=',$new_project->id)->update(['feature11'=>$path]);
          }
          session::flash('update_success', 'Project saved successfully!');
          #Notify bidders of the new project
          $this->notify_bidders($new_project->id);
          return redirect('profile');
        }
        else
        {
          session::flash('update_error', 'Project not saved!! Please contact support@webdesignerscenter.com for help');
        }
      }
      else
      {
        session::flash('update_error', 'Project not saved!! Please contact support@webdesignerscenter.com for help');
      }
      return back()->withInput();
    }
    public function single_project_details($project_id)
    {
      $project=Project::with('User','Bid')->where('id','=',$project_id)->first();
      $project_type=$project->projectType()->first();
      $bids=Bid::where('project_id','=',$project_id)->orderBy('created_at','desc')->paginate(4);
      $count=0;
      $companies=array();
      foreach($bids as $bid)
      {
        $companies[$count]=User::with('company')->where('id','=',$bid['bidder_id'])->first();
        $count++;
      }
      return view('project-details',compact('project','project_type','bids','companies'));
    }
    public function project_title_schedule_update(Request $request)
    {
      $validatedData = $request->validate([
        'project-title' => 'required|max:255',
        'project-start-date' => 'required|max:255|date_format:m/d/Y',
        'project-end-date' => 'required|max:255|date_format:m/d/Y'
      ]);
      if(Project::where('id','=',session('current_project_id'))->update([
        'title' => $request->input('project-title'),
        'start_date' => $request->input('project-start-date'),
        'end_date' => $request->input('project-end-date'),
      ])){
        session::flash('update_success', 'Project update successfully!');
      }else {
        session::flash('update_error', 'Project not update!! Please contact support@webdesignerscenter.com for help');
      }
      return back();
    }
    public function project_features_update(Request $request)
    {
      if($request->input('feature1')){$feature1=$request->input('feature1');}else{$feature1=0;}
      if($request->input('feature2')){$feature2=$request->input('feature2');}else{$feature2=0;}
      if($request->input('feature3')){$feature3=$request->input('feature3');}else{$feature3=0;}
      if($request->input('feature4')){$feature4=$request->input('feature4');}else{$feature4=0;}
      if($request->input('feature5')){$feature5=$request->input('feature5');}else{$feature5=0;}
      if($request->input('feature6')){$feature6=$request->input('feature6');}else{$feature6=0;}
      if($request->input('feature7')){$feature7=$request->input('feature7');}else{$feature7=0;}
      if($request->input('feature8')){$feature8=$request->input('feature8');}else{$feature8=0;}
      if(ProjectType::where('project_id','=',session('current_project_id'))->update([
        'category' => $request->input('project-category'),
        'feature1' => $feature1,
        'feature2' => $feature2,
        'feature3' => $feature3,
        'feature4' => $feature4,
        'feature5' => $feature5,
        'feature6' => $feature6,
        'feature7' => $feature7,
        'feature8' => $feature8,
      ])){
        session::flash('update_success', 'Project update successfully!');
      }else {
        session::flash('update_error', 'Project not update!! Please contact support@webdesignerscenter.com for help');
      }
      return back();
    }
    public function project_tech_features_update(Request $request)
    {
      $validatedData = $request->validate([
        'project-description' => 'required',
        'project_doc_1' => 'nullable|mimes:pdf|max:2048',
        'project_doc_2' => 'nullable|mimes:pdf|max:2048',
        'project_doc_3' => 'nullable|mimes:pdf|max:2048',
      ]);
      if($request->hasFile('project_doc_1'))
      {
        $image=$request->project_doc_1;
        $destinationPath = 'project-specifications/document-1/';
        $extension=$request->project_doc_1->extension();
        $name=session('current_project_id').'.'.$extension;
        $path='project-specifications/document-1/'.$name;
        $image->move($destinationPath, $name);
        ProjectType::where('project_id','=',session('current_project_id'))->update(['feature9'=>$path]);
      }
      if($request->hasFile('project_doc_2'))
      {
        $image=$request->project_doc_2;
        $destinationPath = 'project-specifications/document-2/';
        $extension=$request->project_doc_2->extension();
        $name=session('current_project_id').'.'.$extension;
        $path='project-specifications/document-2/'.$name;
        $image->move($destinationPath, $name);
        ProjectType::where('project_id','=',session('current_project_id'))->update(['feature10'=>$path]);
      }
      if($request->hasFile('project_doc_3'))
      {
        $image=$request->project_doc_3;
        $destinationPath = 'project-specifications/document-3/';
        $extension=$request->project_doc_3->extension();
        $name=session('current_project_id').'.'.$extension;
        $path='project-specifications/document-3/'.$name;
        $image->move($destinationPath, $name);
        ProjectType::where('project_id','=',session('current_project_id'))->update(['feature11'=>$path]);
      }
      if(Project::where('id','=',session('current_project_id'))->update([
        'description' => $request->input('project-description'),
      ])){
        session::flash('update_success', 'Project update successfully!');
      }else {
        session::flash('update_error', 'Project not update!! Please contact support@webdesignerscenter.com for help');
      }
      return back();
    }
    public function project_caption_update(Request $request)
    {
      $validatedData = $request->validate([
        'project_caption' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ]);
      if($request->hasFile('project_caption'))
      {
        $image=$request->project_caption;
        $destinationPath = 'project-captions';
        $extension=$request->project_caption->extension();
        $name=session('current_project_id').'.'.$extension;
        $path='project-captions/'.$name;
        $image->move($destinationPath, $name);
      }
      if(Project::where('id','=',session('current_project_id'))->update(['caption'=>$path]))
      {
        session::flash('update_success', 'Project update successfully!');
      }
      else
      {
        session::flash('update_error', 'Project not update!! Please contact support@webdesignerscenter.com for help');
      }
      return back();
    }
    public function project_delete($id='')
    {
      if($id=='')
      {
        $id=session('current_project_id');
      }
      $project=Project::find($id);
      $project->projectType()->delete();
      $project->bid()->delete();
      $project->projectTestimonial()->delete();
      $project->projectLike()->delete();
      $project->delete();
      return back();
    }
    private function notify_bidders($project_id)
    {
      $new_project=Project::with(['projectType','bid'])->where('id','=',$project_id)->first();
      $client=User::where('id','=',Auth::id())->first();
      $bidders=UserMembership::where('type','<>',0)->get();
      foreach($bidders as $bidder)
      {
        if(UserAlerts::where('user_id','=',$bidder['user_id'])->value('alert1'))
        {
          $alert=UserAlerts::where('user_id','=',$bidder['user_id'])->value('alert2');
          if($alert==$new_project['projectType']['category'] || !$alert)
          {
            $bidder_details=User::where('id','=',$bidder['user_id'])->first();
            $notify_bidders=new NewProjectNotification($client,$new_project,$bidder_details);
            Mail::to($bidder_details['email'])->queue($notify_bidders);
          }
        }
      }
    }
}
