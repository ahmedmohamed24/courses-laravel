<?php

namespace App\Http\Controllers\instructors;

use App\Category;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lecture;

class InstructorController extends Controller
{
    public function index(){
        $courses=Course::where('instructor_id','=',Auth('instructor')->user()->id)->paginate(9);
        return view('instructor.dashboard',["courses"=>$courses]);
    }
    public function add(){
        $cats=Category::get();
        return view('instructor.addCourse',["categories"=>$cats]);
    }
    public function save(Request $request){
        $request->validate([
            'title'=>'required|string|max:100',
            'briefDesc'=>'required|string',
            'desc'=>'required|string',
            'price'=>'required|numeric|max:9999.99|min:0.99',
            'category'=> 'numeric|required|exists:categories,id',
            'img'=>'required|image|mimes:png,jpg,jpeg'
        ]);
        $img=$request->img;
        $newName=$img->hashName();
        $img->move(public_path('uploads/courses'),$newName);
        Course::create([
            'title'=>$request->title,
            'briefDesc'=>$request->briefDesc,
            'desc'=>$request->desc,
            'price'=>$request->price,
            'img'=>$newName,
            'cat_id'=>$request->category,
            'instructor_id'=>Auth('instructor')->user()->id,
        ]);
        $request->session()->flash('courseAdded',true);
        return redirect()->back();
    }
    public function lectureAdd($id){
        return view('instructor.addLecture',["id"=>$id]);
    }
    public function lectureSave(Request $request){
        $request->validate([
            'title'=>'required|string|max:100',
            'desc'=>'required|string',
            'img'=>'required|image|mimes:png,jpg,jpeg',
            'course'=>'required|numeric|exists:courses,id'
        ]);
        $img=$request->img;
        $newName=$img->hashName();
        $img->move(public_path('uploads/lectures'),$newName);
        Lecture::create([
            'title'=>$request->title,
            'desc'=>$request->desc,
            'img'=>$newName,
            'duration'=>now(),
            'course_id'=>$request->course
        ]);
        $request->session()->flash('lectureAdded',true);
        return redirect()->back();
    }
}
