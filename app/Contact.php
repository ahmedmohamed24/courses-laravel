<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable=['phone','email','address','facebook','twitter','github','gmail'];
    public $timestamps=false;
}
