<?php

namespace App\Http\Controllers;

use App\Course;
use App\Category;
use App\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CourseController extends Controller
{
    public function index(){
        $categories=Category::get()->take(6);
        $courses=Course::get()->take(3);
        return view('front.index',["categories"=>$categories,'courses'=>$courses]);
    }
    public function about(){
        return view('front.about');
    }
    public function getCourses(){
        $courses=Course::paginate(9);
        return view('front.courses',['courses'=>$courses]);

    }
    public function getCourse($id){
        $course=Course::findOrFail($id);
        return view('front.course',['course'=>$course]);

    }
    public function searchCourse(Request $request){
        $request->validate([
            'search'=>'required|string|max:100'
        ]);
        $courses=Course::where('title','like',"%$request->search%")->paginate(9);
        return view('front.searchResult',['courses'=>$courses]);
    }
    public function getInstructors(){
        $instructors=Instructor::paginate(9);
        return view('front.instructors',["instructors"=>$instructors]);

    }
    public function getInstructor($id){
        $instructor=Instructor::findOrFail($id);
        return view('front.instructor',["instructor"=>$instructor]);
    }
    public function contact(){
        return view('front.contact');

    }
    public function getCategories(){
        $cats=Category::paginate(9);
        return view('front.categories',["categories"=>$cats]);
    }
    public function getCategory($id){
        $cat=Category::findOrFail($id);
        return view('front.category',["category"=>$cat]);
    }
    public function addReview( Request $request){

        //$validator=Validator::make([$request->all(),[$request->name=>'required']]);
        dd($request);
    }
}
