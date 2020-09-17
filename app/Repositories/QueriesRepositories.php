<?php

namespace App\Repositories;

use App\Models\Queries;
use Illuminate\Http\Request;
use DB;
use App\Libraries\Ennvisage;
use Config;

class QueriesRepositories{
	
	public function insert(Request $request){
		try{
			DB::beginTransaction();
		    $newQuery =  $request->all();
			unset($newQuery['_token']);
			$insert = Queries::create($newQuery);

			/******** Send Mail to Syncboat  *************/
	        $emailto  = Config::get('variable.INFO_EMAIL');
	        $from =  Config::get('variable.FROM_EMAIL');
	        $fromname = Config::get('variable.FROM_NAME');
	        $dataarray = ['data'=>$newQuery];
	        if(Ennvisage::CommonSendEmail('emails.schedule-meet',['data'=>$dataarray],$from,$fromname,$emailto,'Query')){
	        	DB::commit();
	        	return true;
	        } else{
	        	DB::rollback();
	        	return false;
	        }
	    } catch(Exception $e){
            DB::rollback();
   			return false;
        }
		
	}

}