<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordInterface;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;

class Instructor extends Authenticatable implements MustVerifyEmail,CanResetPasswordInterface
{
    use Notifiable,CanResetPasswordTrait;
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
