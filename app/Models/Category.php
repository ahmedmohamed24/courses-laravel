<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name','img'];
    public function course(){
        return $this->hasMany('App\Models\Course','cat_id');
    }
}
