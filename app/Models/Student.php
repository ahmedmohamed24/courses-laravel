<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password','email_verified_at','cardNumber','cardNumber_verified_at','img',
        'DOB',
    ];
    protected $hidden = [
        'password', 'remember_token','cardNumber'
    ];
    public function course(){
        return $this->belongsToMany('App\Models\Course');
    }
    public function review(){
        return $this->hasMany('App\Models\Review');
    }
    public function getNameAttribute($name){
       return ucfirst($name);
    }
    public function setNameAttribute($name){
        $this->attributes['name']=ucfirst($name);
    }

}
