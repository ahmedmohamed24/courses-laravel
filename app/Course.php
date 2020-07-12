<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=['title','briefDesc','desc','price','img','cat_id','instructor_id'];


    public function instructor(){
        return $this->belongsTo('App\Instructor');
    }
    public function student(){
        return $this-> belongsToMany('App\Student');
    }
    public function review(){
        return $this->hasMany('App\Review');
    }
    public function category(){
        return $this->belongsTo('App\Category','cat_id');
    }
    public function lecture(){
        return $this->hasMany('App\Lecture');
    }
}
