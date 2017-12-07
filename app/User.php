<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'password','middle_name','last_name','phone','address','avatar','id_no','passport','nationality','admin_approved','website','verified','email_token'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function project()
    {
      return $this->hasMany('App\Project');
    }
    public function company()
    {
      return $this->hasOne('App\Company');
    }
    public function userMembership()
    {
      return $this->hasOne('App\UserMembership');
    }
    public function chat()
    {
      return $this->hasMany('App\Chat');
    }
    public function userAlerts()
    {
      return $this->hasOne('App\UserAlerts');
    }
    public function verified()
    {
      $this->verified=1;
      $this->email_token=null;
      if($this->save()){return 1;}else{return 0;}
    }
}
