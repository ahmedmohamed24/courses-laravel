<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $fillable = ['mainTitle', 'secondaryTitle', 'siteName', 'logo'];
    public $timestamps = false;
}
