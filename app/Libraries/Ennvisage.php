<?php
namespace App\Libraries;

use File;
use Carbon\Carbon;
use Mail;
use Config;

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

    public static function CommonSendEmail($mailview,$data,$from,$fromname,$to,$subject){
        try {
            $message="abcd";
            $response = Mail::send($mailview, $data, function($message) use ($from,$fromname,$to,$subject){
                $message->from($from,$fromname);
                $message->to($to);
                $message->subject($subject);
            });
            if (count(Mail::failures()) <= 0) {
                return true;
            }    
        } catch (Exception $e) {
            if (count(Mail::failures()) > 0) {
               return false;
            }
        }

        return $response;
    }

    public static function recaptchaChecking(){
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $data = [
                'secret' => config('services.recaptcha.secret'),
                'response' => $request->get('recaptcha'),
                'remoteip' => $remoteip
              ];
        $options = [
                'http' => [
                  'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                  'method' => 'POST',
                  'content' => http_build_query($data)
                ]
            ];
        $context = stream_context_create($options);
                $result = file_get_contents($url, false, $context);
                $resultJson = json_decode($result);
        }

        if ($resultJson->success != true) {
           return false;
        } else if ($resultJson->score >= 0.3) {
           return true;
        } else {
           return false;       
        }

}