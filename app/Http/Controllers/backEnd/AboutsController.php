<?php
namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AboutRepositories;
use Auth, Hash, Session, Mail;

class AboutsController extends Controller{

	protected $aboutRepositories;

	public function __construct(AboutRepositories $aboutRepositories){
		$this->aboutRepositories = $aboutRepositories;
	}
	
	public function index(){
		$page = 'abouts';
		$about = $this->aboutRepositories->get();
		return view('backEnd.abouts.index',compact(['page','about']));
	}

}