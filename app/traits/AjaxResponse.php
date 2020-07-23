<?php 


namespace App\traits;

trait AjaxResponse{
    public function response($status,$msg,$data=null){
        return response()->json([
            'status'=>$status,
            'msg'=>$msg,
            'data'=>$data
        ]);
    }
}