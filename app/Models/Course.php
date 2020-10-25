<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 'briefDesc', 'desc', 'price', 'img', 'cat_id', 'instructor_id'];


    public function instructor()
    {
        return $this->belongsTo('App\Models\Instructor');
    }
    public function student()
    {
        return $this->belongsToMany('App\Models\Student');
    }
    public function review()
    {
        return $this->hasMany('App\Models\Review');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'cat_id');
    }
    public function lecture()
    {
        return $this->hasMany('App\Models\Lecture');
    }
}
