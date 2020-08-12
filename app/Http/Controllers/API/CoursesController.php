<?php

namespace App\Http\Controllers\API;

use App\Models\Course;
use App\Http\Controllers\Controller;
use App\traits\AjaxResponse;

class CoursesController extends Controller
{

    use AjaxResponse;
    public function index(){
       $courses = Course::paginate(10);
       return $this->response(true,'All Courses',$courses);
    }
}
