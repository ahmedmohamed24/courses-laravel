<?php

namespace App\Http\Controllers\instructors;

use App\Instructor;
use App\Mail\TestMail;
use App\traits\AjaxResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\ResetPassword as ResetModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class ResetPassword extends Controller
{
    use AjaxResponse;
    public function index(){
        return view('instructor.reset');
    }
    public function sendResetMail(Request $request)
    {
        $validators=Validator::make($request->all(),
        [
            'email'=>'required|email|exists:instructors,email'
        ]);
        if($validators->fails())
            return $this->response(false,$validators->messages());
        //check if he tried this before (1 hour)
        $temp=ResetModel::where('email',$request->email)->get()->last();
        if($temp !== null){
            //not resetting password for the first time
            $delay=(strtotime(date("Y-m-d H:i:s"))-strtotime($temp->created_at))/60;//in minutes
            if($delay < 10){
                session()->flash('isNotWaited',true);
                return  $this->response(400,"Please visite your email or wait 10 minutes to resend");
            }
        }

        //generate random token
        $token = bin2hex(random_bytes(50));
        ResetModel::create([
            'email'=>$request->email,
            'token'=>$token,
            'updated_at'=>null,
        ]);
        Mail::to($request->email)->send(new TestMail($token));
        return $this->response(true,"Email send successfully, please check your email");
    }
    public function reset($token)
    {
        return $token;
        $result=ResetModel::where('token',$token)->get()->last();
        dd($result);
        if($result=== null){
            //Token is not right
            return abort(404,"This link is no more available ");
        }
        if($result->updated_at === null ){
            //this link used before
            return abort(404,"This link is no more available ");
        }
        $delay=(strtotime(date("Y-m-d H:i:s"))-strtotime($result->created_at))/60;
        if($delay < 10){
            //this link sent before 10 minutes
            return abort(404,"This link is no more available ");
        }
        session()->put('emailToBeReset',$result->email);
        return redirect(route('instructor.newpassword'));

    }
    public function createNewPassword()
    {
        if(! session()->has('emailToBeReset'))
            return abort(404,"Not Found");
        return view('instructor.createPass');
    }
    public function savePassword(Request $request)
    {
        if(!session()->has('emailToBeReset'))
            return abort(404,"Not Found");
        $request->validate([
            'password'=>'required|string',
            'password-c'=>'required|string|same:password'
        ]);
        $instructor=Instructor::where('email',session()->get('emailToBeReset'))->get();
        if($instructor===null)
            return abort(500,"Serve Error");
        Instructor::findOrFail($instructor->id)->update(['password'=>$request->password]);
        Auth('instructor')->attempt(['email'=>$instructor->email,'password'=>$instructor->password]);
        return redirect(route('instructor.dashboard'));

    }
}
