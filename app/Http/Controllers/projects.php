<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Carbon\Carbon;
use App\Project;
use App\ProjectType;


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
      ]);
      $new_project=new Project;
      $new_project->user_id=Auth::id();
      $new_project->title=$request->input('title');
      $new_project->description=$request->input('description');
      if($new_project->save())
      {
        if($request->hasFile('caption'))
        {
          $image=$request->caption;
          $destinationPath = 'project-captions';
          $extension=$request->caption->extension();
          $name=$new_project->id.'.'.$extension;
          $path='caption/'.$name;
          $image->move($destinationPath, $name);
          Project::where('id','=',$new_project->id)->update(['caption'=>$path]);
        }
        #########save project cetegory starts here######
        if($request->input('mobile-app')){$mobile_app=$request->input('mobile-app');}else{$mobile_app=0;}
        if($request->input('e-commerce')){$e_commerce=$request->input('e-commerce');}else{$e_commerce=0;}
        if($request->input('blog')){$blog=$request->input('blog');}else{$blog=0;}
        if($request->input('website')){$website=$request->input('website');}else{$website=0;}
        $new_project_category=new ProjectType;
        $new_project_category->project_id=$new_project->id;
        $new_project_category->category=$mobile_app.$e_commerce.$blog.$website;
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
      return view('new-project.new-project',compact('data'));
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
          $path='caption/'.$name;
          $image->move($destinationPath, $name);
          Project::where('id','=',session('new_project_id'))->update(['caption'=>$path]);
        }
        #########save project cetegory starts here######
        if($request->input('mobile-app')){$mobile_app=$request->input('mobile-app');}else{$mobile_app=0;}
        if($request->input('e-commerce')){$e_commerce=$request->input('e-commerce');}else{$e_commerce=0;}
        if($request->input('blog')){$blog=$request->input('blog');}else{$blog=0;}
        if($request->input('website')){$website=$request->input('website');}else{$website=0;}
        $new_project_category=new ProjectType;
        $new_project_category->project_id=session('new_project_id');
        $new_project_category->category=$mobile_app.$e_commerce.$blog.$website;
        $new_project_category->save();
        #########save project category ends here######
        session::flash('project_basic_updated', 'Project basic details succesfully updated!');
        return redirect('/new-project-features');
      }
      else{
        session::flash('project_basic_details_error', 'Error!! please contact support@webdesignerscenter.com for help');
        return back();
      }
    }
}
