<?php

namespace App\Repositories;

use App\Models\Abouts;
use Illuminate\Http\Request;
use App\Libraries\Ennvisage;

class AboutRepositories{

	public function get(){
		$abouts = Abouts::get();
		return $abouts;
	}

	public function insert(Request $request){
		$ennv = new Ennvisage();
		if(is_file($request['file']))
			$checkIfFileUploaded = $ennv->image_upload($request['file'],'abouts');
		$about = [
			"title" => $request['title'],
			"description" => $request['description'],
			"status" => $request['status']
		];
		if(isset($checkIfFileUploaded)){
			$about = [
				"image" => $checkIfFileUploaded,
				"link" => 'storage/abouts/'.$checkIfFileUploaded;
			];
		}
		
	}
	
}