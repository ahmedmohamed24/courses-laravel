<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PopularReview extends Model
{
    protected $fillable=['review_id'];
    public $timestamps=false;
}
