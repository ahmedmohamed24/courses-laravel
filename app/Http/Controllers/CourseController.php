<?php

namespace App\Http\Controllers;

use App\Home;
use App\About;
use App\Course;
use App\Review;
use App\Contact;
use App\Category;
use App\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CourseController extends Controller
{
    public function index(){
        $data=[];
        $data['categories']=Category::get()->take(6);
        $data['courses']=Course::get()->take(3);
        $data['home']=Home::get()->first();
        return view('front.index',["data"=>$data]);
    }
    public function about(){
        $data=About::get();
        return view('front.about',['data'=>$data]);
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

        $request->validate([
            'starsRate'=>'required|numeric|min:1|max:5',
            'reviewDesc'=>'required|string',
            'course'=>'required|numeric|exists:courses,id'
        ]);
        Review::create([
            'content'=>$request->reviewDesc,
            'rate'=>$request->starsRate,
            'course_id'=>$request->course,
            'student_id'=>Auth('student')->user()->id,
        ]);
        //return "added";
         return response()->json([
             'status'=>"200",
             "message"=>'Successfully Added',
             "data"=> Null,
         ]);
    }
}
