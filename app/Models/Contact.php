<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['phone', 'email', 'address', 'facebook', 'twitter', 'github', 'gmail'];
    public $timestamps = false;
}
