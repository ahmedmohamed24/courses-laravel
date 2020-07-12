<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Category;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use Facade\FlareClient\Flare;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $students=Student::findOrFail(18)->course;
        return view('admin.index',['students'=>$students]);
    }
    public function add(){
        return view('admin.newAdmin');
    }
    public function save(Request $request){
        $request->validate([
            'name'=>'required|string|max:100',
            'email'=>'required|email|unique:admins,email',
            'password'=>'required|min:6|max:100'
        ]);
        Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        $request->session()->flash('isAdminAdded',true);
        return redirect()->back();
    }
    public function settings(){
        return view('admin/settings');
    }
    public function change(Request $request){
        $request->validate([
            'password'=>'string|required',
            'newPass'=>'string|required',
            'ConfirmNewPass'=>'string|required',
        ]);
        if(Hash::check($request->password, Auth('admin')->user()->password) && $request->newPass === $request->ConfirmNewPass){
            Admin::find(Auth('admin')->user()->id)->update(['password'=>Hash::make($request->newPass)]);
            $request->session()->flash('isUpdated',true);
            return redirect()->back();
        }else{
            $request->session()->flash('isNotUpdated',true);
            return redirect()->back();
        }
    }
}
