<?php

namespace App\Http\Controllers\admin;

use App\Models\Home;
use App\Models\About;
use App\Models\Admin;
use App\Models\Contact;
use App\traits\AjaxResponse;
use Illuminate\Http\Request;
use App\traits\ImageUploader;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    use ImageUploader, AjaxResponse;
    //admin home page
    public function index()
    {

        $data = Home::first();
        return view('admin.index', ['data' => $data]);
    }
    public function updateIndex(Request $request)
    {
        $validators = Validator::make(
            $request->all(),
            [
                'siteName' => 'required|string|max:50|min:3',
                'mainTitle' => 'required|string|max:150|min:5',
                'secondaryTitle' => 'required|string|max:150|min:5',
                'logo' => 'nullable|image|mimes:png,jpg,jpeg',
            ]
        );
        if ($validators->fails())
            return $this->response(false, $validators->messages(), null);
        $id = Home::select('id')->get()->first();
        if ($request->file('logo') !== null) {
            //Remove old image and add new Image Path
            $newName = $this->upload($request->file('logo'), 'assets/img/logo');
            Home::findOrFail($id['id'])->update([
                'mainTitle' => $request->mainTitle,
                'secondaryTitle' => $request->secondaryTitle,
                'siteName' => $request->siteName,
                'logo' => $newName,
            ]);
        } else {
            Home::findOrFail($id['id'])->update([
                'mainTitle' => $request->mainTitle,
                'secondaryTitle' => $request->secondaryTitle,
                'siteName' => $request->siteName,
            ]);
        }
        return $this->response(true, 'Success');
    }
    //admin for updating about us page
    public function about()
    {
        $data = About::get();
        return view('admin.about', ['data' => $data]);
    }
    public function updateAbout(Request $request)
    {
        $validators = Validator::make(
            $request->all(),
            [
                'sectionHeader' => 'required|string|max:100',
                'sectionContent' => 'required|string',
                'id' => 'numeric|required|exists:abouts,id'
            ]
        );
        if ($validators->fails())
            return $this->response(false, $validators->messages());
        About::findOrFail($request->id)->update([
            'sectionHeader' => $request->sectionHeader,
            'sectionContent' => $request->sectionContent,
        ]);
        return $this->response(true, 'Success');
    }

    //admin for updating contacts pade
    public function contacts()
    {
        $data = Contact::get()->first();
        return view('admin.contacts', ['data' => $data]);
    }
    public function updaeContacts(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'phone' => 'required|string|numeric',
            'email' => 'required|email|max:50',
            'address' => 'required|string',
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'github' => 'required|url',
            'gmail' => 'required|url'
        ]);
        if ($validators->fails())
            return $this->response(false, $validators->messages());
        $id = Contact::select('id')->get()->first();
        $id = $id['id'];
        Contact::findOrFail($id)->update([
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'github' => $request->github,
            'gmail' => $request->gmail
        ]);
        return $this->response(true, 'success');
    }
    //for adding new  admin
    public function add()
    {
        return view('admin.newAdmin');
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6|max:100'
        ]);
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $request->session()->flash('isAdminAdded', true);
        return redirect()->back();
    }


    //change admin settings and reset password
    public function settings()
    {
        return view('admin/settings');
    }
    public function change(Request $request)
    {
        $request->validate([
            'password' => 'string|required',
            'newPass' => 'string|required',
            'ConfirmNewPass' => 'string|required',
        ]);
        if (Hash::check($request->password, Auth('admin')->user()->password) && $request->newPass === $request->ConfirmNewPass) {
            Admin::find(Auth('admin')->user()->id)->update(['password' => Hash::make($request->newPass)]);
            $request->session()->flash('isUpdated', true);
            return redirect()->back();
        } else {
            $request->session()->flash('isNotUpdated', true);
            return redirect()->back();
        }
    }
}
