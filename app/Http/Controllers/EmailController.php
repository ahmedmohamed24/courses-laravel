<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\traits\AjaxResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;




class EmailController extends Controller
{
    use AjaxResponse;
    public function send(Request $request){
        $validator=Validator::make($request->all(),
        [
            'message'=>'required|string|min:10',
            'name'=>'required|string|min:10|max:100',
            'email'=>'required|email|max:100',
            'subject'=>'required|string|max:100',
        ]);
        if($validator->fails())
            return $this->response(false,$validator->messages());
        Email::create([
            'message'=>$request->message,
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
        ]);
        return $this->response(true,"Message sent successfully");
    }
}
