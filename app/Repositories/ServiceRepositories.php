<?php
namespace App\Repositories;

use App\Models\Services;
use Illuminate\Http\Request;


class ServiceRepositories{

	public function getPaginatedServices(){
		$services = Services::paginate(10);
		return $services;
	}

	public function insert(Request $request){
		
		$newService = [
			'service_name' => $request['service_name'],
			'icon' => $request['icon'],
			'link' => $request['route']
		];
		$create = Services::create($newService);
		return $create;
	}

	public function get(){
		$services = Services::select('service_name','icon','link')->where('service_name','!=','other')->get();
		return $services;
	}

	public function getAll(){
		$services = Services::select('service_name','icon','link')->get();
		return $services;
	}

}