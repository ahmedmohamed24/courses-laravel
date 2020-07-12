<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name','img'];
    public function course(){
        return $this->hasMany('App\Course','cat_id');
    }
}
