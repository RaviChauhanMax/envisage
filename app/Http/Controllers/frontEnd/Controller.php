<?php

namespace App\Http\Controllers\frontEnd;

use App\Repositories\ServiceRepositories,QueriesRepositories;
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
    	$check = $this->queriesRepositories->insert($request);
    	if($check)
    		return redirect('/')->with('success','Inserted successfully!');
    	else
    		return redirect('/')->with('error','Something went wrong, try again later!');
    }
}
