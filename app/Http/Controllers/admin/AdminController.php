<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Course;
use App\Student;
use App\Category;
use App\HomePage;
use Illuminate\Http\Request;
use Facade\FlareClient\Flare;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
       
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
    // \App\HomePage::create(['mainTitle'=>'The New Way To Learn Properly is With Us','secondaryTitle'=>'popular Online Courses','email'=>'ahmed@gmail.com','phoneNumber'=>' 01010 1010 1010','Address'=>'Buttonwood, California.','AboutUs'=>'{"Our Mission":"Consectetur adipiscing elit, sued do eiusmod tempor ididunt udfgt labore et dolore magna aliqua. Quis ipsum suspendisces gravida. Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan lacus. Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan lacus.    Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan lacus. Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan.",    "Our Vision":"Consectetur adipiscing elit, sued do eiusmod tempor ididunt udfgt labore et dolore magna aliqua. Quis ipsum suspendisces gravida. Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan lacus. Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan lacus."}','socialLinks'=>'{    "facebook":"www.facebook.com",    "twitter":"www.twitter.com",    "gmail":"www.gmail.com",    "github":"www.github.com"}','siteName'=>'Online EDU','created_at'=>now(),'updated_at'=>now(),])

}
