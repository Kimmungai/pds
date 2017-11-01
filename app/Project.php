<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  public function User()
  {
    return $this->belongsTo('App\User');
  }
  public function projectType()
  {
    return $this->hasOne('App\ProjectType');
  }
  public function bid()
  {
    return $this->hasMany('App\Bid');
  }
  public function projectTestimonial()
  {
    return $this->hasMany('App\ProjectTestimonial');
  }
  public function projectLike()
  {
    return $this->hasMany('App\ProjectLike');
  }
}
