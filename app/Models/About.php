<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['sectionHeader', 'sectionContent'];
    public $timestamps = false;
}
