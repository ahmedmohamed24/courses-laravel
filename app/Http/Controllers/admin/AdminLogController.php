<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLogController extends Controller
{
    public function adminLogin(){
        return view('admin/log');
    }
    public function AdminDoLog(Request $request){
        $request->validate([
            'adminMail'=>'required|string|max:100|exists:admins,email',
            'adminPass'=>'required|string|min:5|max:100'
        ]);
        $isLogged=Auth('admin')->attempt(['email' => $request->adminMail, 'password' =>$request->adminPass]);
        if(! $isLogged){
            session()->flash('isNotAdmin',true);
            return redirect()->route('home');
        }
        return redirect(route('admin.index'));
    }
    public function logout(){
        Auth('admin')->logout();
        return redirect(route('home'));
    }
}
