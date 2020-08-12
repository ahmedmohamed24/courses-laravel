<?php

namespace App\Http\Controllers\students;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class socialController extends Controller
{
    public function redirect($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function callback($service)
    {

        $user = Socialite::driver($service)->user();
        $validator = Validator::make(
            $user->user,
            [
                'name' => 'required|string|max:100',
                'email' => 'required|email|unique:students,email',
            ]
        );
        if (!$validator->fails()) {
            $data = [
                'name' => $user->user['name'],
                'email' => $user->user['email'],
                'img' => $user->getAvatar(),
            ];
            session(['user' => $user]);
            return view('student.completeAuth');
        } else {
            session(['alreadyUser' => $validator]);
            return view('student.log');
        }
    }
    public function authComplete(Request $request)
    {
        if (!session()->has('user')) {
            return redirect(route('home'));
        }
        $request->validate([
            'password' => 'required|string|max:100|min:6',
            'confirmPassword' => 'required|string|same:password',
        ]);
        $user = session()->get('user');
        $fileContents = file_get_contents($user->getAvatar());
        File::put(public_path() . '/uploads/students/' . $user->getId() . ".jpg", $fileContents);
        Student::create([
            'name' => $user->user['name'],
            'password' => Hash::make($request->password),
            'email' => $user->user['email'],
            'img' => $user->getId() . ".jpg",
        ]);
        Auth::guard('student')->attempt([
            'email' => $user->user['email'],
            'password' => $request->password,
        ]);
        return redirect(route('home'));
    }
}
