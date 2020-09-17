<?php

namespace App\Http\Controllers\frontEnd;
use Illuminate\Http\Request;
use App\Repositories\ServiceRepositories;
use App\Repositories\QueriesRepositories;
use App\Libraries\Ennvisage;

class Controller
{
	protected $serviceRespositories, $queriesRepositories;

	public function __construct(ServiceRepositories $services,QueriesRepositories $queries){
		
		$this->serviceRespositories = $services;
		$this->queriesRepositories = $queries;

	}


    public function index()
    {
    	$services = $this->serviceRespositories->getAll();
        return view('frontEnd.index',compact(['services']));
    }

    public function query(Request $request)
    {
        if(!Ennvisage::recaptchaChecking()){
            return redirect('/')->with('error','ReCaptcha Error!');
        }
    	$check = $this->queriesRepositories->insert($request);
    	if($check)
    		return redirect('/')->with('success','Your query sent successfully!');
    	else
    		return redirect('/')->with('error','Something went wrong, try again later!');
    }
}
