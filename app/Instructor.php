<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Instructor extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password','email_verified_at','cardNumber','cardNumber_verified_at','img',
        'DOB','about','specialize','experience','country'
    ];
    protected $hidden = [
        'password', 'remember_token','cardNumber'
    ];
    public function Course(){
        return $this->hasMany('App\Course');
    }

}
