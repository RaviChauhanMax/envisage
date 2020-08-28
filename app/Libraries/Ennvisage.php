<?php
namespace App\Libraries;

use File;
use Carbon\Carbon;

class Ennvisage{

	public function image_upload($imageData, $type)
    {
        
        $allowed_extensions = array('jpeg', 'png', 'jpg');
        $file = $imageData;
        $filename = date('Y-m-d_H:i:s').'_'.$file->getClientOriginalName();
        $extension = File::extension($file->getClientOriginalName());
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        if (in_array($extension, $allowed_extensions) == false) {
            $errors[] = 'File type can be jpg, jpeg or png!';
            return $errors;
        }
        if (empty($errors) == true) {
            $file->move("storage/".$type.'/' , $filename);
            return $filename;
        }
    }

}