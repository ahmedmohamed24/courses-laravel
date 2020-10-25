<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'img',
        'duration',
        'course_id'
    ];
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
