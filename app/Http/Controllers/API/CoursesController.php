<?php

namespace App\Http\Controllers\API;

use App\Course;
use App\Http\Controllers\Controller;
use App\traits\AjaxResponse;
use Illuminate\Http\Request;

class CoursesController extends Controller
{

    use AjaxResponse;
    public function index(){
       $courses = Course::paginate(10);
       return $this->response(true,'All Courses',$courses);
    }
}
