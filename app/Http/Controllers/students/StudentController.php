<?php

namespace App\Http\Controllers\students;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function log(){
        return view('student/log');
    }
    public function doLog(Request $request){
        $request->validate([
            'email'=>'required|email|max:100|exists:students,email',
            'password'=>'required|min:6'
        ]);
        $isLogged=Auth('student')->attempt(['email'=>$request->email,'password'=>$request->password]);
        if(! $isLogged){
            //forget password
            $request->session()->flash('isNotStudent',true);
            return redirect(route('student.register'));
        }else{
            return redirect(route('home'));
        }
    }
    public function register(){
        return view('student/register');
    }
    public function doRegister(Request $request){
         $request->validate([
            'name'=>'required|string|max:100',
            'email'=>'required|email|max:100|unique:students,email',
            'password'=>'required|min:6',
            'confirm-Password'=>'required|min:6|same:password',
            'img'=>'nullable|image|mimes:png,jpg,jpeg',
            'DOB'=>'nullable|date'
        ]);
        if($request->hasFile('img')){
            $img=$request->file('img');
            $newName=$img->hashName();
            $img->move(public_path('uploads/students'),$newName);
            Student::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'img'=>$newName,
                'DOB'=>$request->DOB,
            ]);
        }else{
            Student::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'DOB'=>$request->DOB,
            ]);
        }
        Auth('student')->attempt([
            'name'=>$request->name,
            'password'=>$request->password
        ]);
        return redirect(route('home'));

    }

    public function logout(){
        Auth('student')->logout();
        return redirect(route('home'));

    }
}
