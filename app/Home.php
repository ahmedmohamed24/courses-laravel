<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $fillable=['mainTitle','secondaryTitle','siteName','logo'];
    public $timestamps=false;
}
