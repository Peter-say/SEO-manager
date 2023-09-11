<?php

namespace App;

use finfo;
use Illuminate\Http\Request;

class ImageFile
{
  public function checkImageFile()
  {
    $recommended_file_extensions = ['jpg', 'png'];
    $uploaded_file_extension = request()->file('image')->getClientOriginalExtension();

    if (in_array($uploaded_file_extension, $recommended_file_extensions)) {
      return 'Image file is good';
    } else {
      return 'File extension is not recommended';
    }
  }


  public static function saveImageRequest($file, $path, Request  $request)
  {

    $file_name = $file->getClientOriginalName();
    $file->move(public_path($path), $file_name);
    return $path . "/" . $file_name;
  }
}
