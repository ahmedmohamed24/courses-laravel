<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable=[
        'content','rate','course_id','student_id'
    ];
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
    public function student(){
        return $this->belongsTo('App\Models\Student');
    }
}
