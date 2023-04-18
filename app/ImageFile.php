<?php

namespace App;

use finfo;
use Illuminate\Http\Request;

Class ImageFile {
    public function checkImageFile()
    {
      $recommended_file_extension = ['jpg' , 'png']; 
      $uploaded_file_extension = checkImageFile()->extension();
      if($uploaded_file_extension == $recommended_file_extension){
        return 'image is good';
      }else{
        
      }
    }

    public static function saveImageRequest($file , $path , Request  $request)
    { 
       
       $file_name = $file->getClientOriginalName();
        $file->move(public_path($path) , $file_name);
        return $path."/".$file_name;
      
    }
}