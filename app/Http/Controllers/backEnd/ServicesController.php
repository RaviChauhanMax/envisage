<?php
namespace App\Http\Controllers\backEnd;

use App\Repositories\ServiceRepositories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth, Hash, Session, Mail;
use App\Models\Admin;

class ServicesController extends Controller{
	
	protected $servicesRepositories;
	

	public function __construct(ServiceRepositories $services){

		$this->servicesRepositories = $services;

	}

	public function index(){
		$page = 'services';
		$services = $this->servicesRepositories->getPaginatedServices();
		return view('backEnd.services.index', compact(['page','services']));
	}

	public function addServices(Request $request){
		$page = 'services';
		if($request->isMethod('POST')){
			$insert = $this->servicesRepositories->insert($request);
			if($insert)
				return redirect('/admin/services')->with('success','Service added successfully!');
			else
				return redirect('/admin/services')->with('error','Something went wrong, try again later!');
		}
		return view('backEnd.services.form',compact('page'));
	}

}