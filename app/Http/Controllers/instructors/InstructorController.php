<?php

namespace App\Http\Controllers\instructors;

use App\Models\Course;
use App\Models\Lecture;
use App\Models\Category;
use Illuminate\Http\Request;
use App\traits\ImageUploader;
use App\Http\Controllers\Controller;

class InstructorController extends Controller
{
    use ImageUploader;
    public function __construct()
    {
        $this->middleware('instructorAuth');
    }
    public function index()
    {
        $courses = Course::where('instructor_id', '=', Auth('instructor')->user()->id)->paginate(9);
        return view('instructor.dashboard', ["courses" => $courses]);
    }
    public function add()
    {
        $cats = Category::get();
        return view('instructor.addCourse', ["categories" => $cats]);
    }
    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'briefDesc' => 'required|string',
            'desc' => 'required|string',
            'price' => 'required|numeric|max:9999.99|min:0.99',
            'category' => 'numeric|required|exists:categories,id',
            'img' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        $img = $request->img;
        $newName = $img->hashName();
        $img->move(public_path('uploads/courses'), $newName);
        Course::create([
            'title' => $request->title,
            'briefDesc' => $request->briefDesc,
            'desc' => $request->desc,
            'price' => $request->price,
            'img' => $newName,
            'cat_id' => $request->category,
            'instructor_id' => Auth('instructor')->user()->id,
        ]);
        $request->session()->flash('courseAdded', true);
        return redirect()->back();
    }
    public function lectureAdd($id)
    {
        return view('instructor.addLecture', ["id" => $id]);
    }
    public function lectureSave(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'desc' => 'required|string',
            'img' => 'required|image|mimes:png,jpg,jpeg',
            'course' => 'required|numeric|exists:courses,id'
        ]);
        $newName=$this->upload($request->img,'uploads/lectures');
        Lecture::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'img' => $newName,
            'duration' => now(),
            'course_id' => $request->course
        ]);
        $request->session()->flash('lectureAdded', true);
        return redirect()->back();
    }
}
