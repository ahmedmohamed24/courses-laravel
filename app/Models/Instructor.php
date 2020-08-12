<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordInterface;

class Instructor extends Authenticatable implements MustVerifyEmail,CanResetPasswordInterface,JWTSubject
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
        return $this->hasMany('App\Models\Course');
    }
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}
