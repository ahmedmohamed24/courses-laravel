<?php
namespace App\traits;

trait ImageUploader{


    public function upload($img,$folder){
        $newName=$img->hashName();
        $img->move(public_path($folder),$newName);
        return $newName;

    }
}



