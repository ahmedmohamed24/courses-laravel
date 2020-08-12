<?php

namespace App\Http\Controllers\instructors;

use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class InstructorAuthController extends Controller
{
    public function log(){
        return view('instructor/log');
    }
    public function doLog(Request $request){
        $request->validate([
            'email'=>'required|email|max:100|exists:instructors,email',
            'password'=>'required|min:6'
        ]);
        $isLogged=Auth('instructor')->attempt(['email'=>$request->email,'password'=>$request->password]);
        if(! $isLogged){
            //forget password
            $request->session()->flash('isPassWrong',true);
            return redirect()->back();
        }
        return redirect(route('instructor.dashboard'));
    }
    public function register(){
        return view('instructor.register');
    }
    public function doRegister(Request $request){
         $request->validate([
            'name'=>'required|string|max:100',
            'email'=>'required|email|max:100|unique:instructors,email',
            'password'=>'required|min:6',
            'confirm-Password'=>'required|min:6|same:password',
            'img'=>'required|image|mimes:png,jpg,jpeg',
            'DOB'=>'required|date',
            'about'=>'required|string'
        ]);
        $img=$request->file('img');
        $newName=$img->hashName();
        $img->move(public_path('uploads/instructors'),$newName);
        Instructor::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'img'=>$newName,
            'DOB'=>$request->DOB,
            'about'=>$request->about
        ]);
        Auth('instructor')->attempt(['email'=>$request->email,'password'=>$request->password]);
        return redirect(route('instructor.dashboard'));
    }
    public function logout(){
        Auth('instructor')->logout();
        return redirect(route('home'));
    }
}
