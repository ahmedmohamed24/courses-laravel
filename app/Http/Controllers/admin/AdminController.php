<?php

namespace App\Http\Controllers\admin;

use App\Home;
use App\About;
use App\Admin;
use App\Course;
use App\Contact;
use App\Student;
use App\Category;
use App\HomePage;
use Illuminate\Http\Request;
use Facade\FlareClient\Flare;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use \App\traits\ImageUploader;

class AdminController extends Controller
{
    use ImageUploader;
    public function index(){
      
      $data= Home::first();
      return view('admin.index',['data'=>$data]);
      
    }
    public function updateHome(Request $request){
        $validators=Validator::make(
            $request->all(),
            [
                'siteName'=>'required|string|max:50|min:3',
                'mainTitle'=>'required|string|max:150|min:5',
                'secondaryTitle'=>'required|string|max:150|min:5',
                'logo'=>'nullable|image|mimes:png,jpg,jpeg',
            ]
        );
        if($validators->fails())
            return response()->json(['failed'=>$validators,401]);

        if($request->file('logo') !== null){
                //Remove old image and add new Image Path
            $newName=$this->upload($request->file('logo'),'assets/img/logo');
            Home::update([
                'mainTitle'=>$request->mainTitle,
                'secondaryTitle'=>$request->secondaryTitle,
                'siteName'=>$request->siteName,
                'logo'=>$newName,
            ]);
        }else{
            Home::update([
                'mainTitle'=>$request->mainTitle,
                'secondaryTitle'=>$request->secondaryTitle,
                'siteName'=>$request->siteName,
            ]);
        }
        return response()->json(['success',200]);
    }
    public function about(){
        $data= About::get();
        
    }
    public function contacts(){
        $data= Contact::get();
        
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
