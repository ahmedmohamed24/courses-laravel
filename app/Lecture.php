<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable=[
        'title',
        'desc',
        'img',
        'duration',
        'course_id'
    ];
    public function course(){
        return $this->belongsTo('App\Course');
    }
}
