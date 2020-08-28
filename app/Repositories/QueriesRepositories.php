<?php

namespace App\Repositories;

use App\Models\Queries;

class QueriesRepositories{
	
	public function insert(Request $request){

		$newQuery = [
			"name" => $request->input('name'),
			"email" => $request->input('email'),
			"scheduled_at" => $request->input('scheduled_at'),
			"mobile_no" => $request->input('mobile'),
			"subject_id" => $request->input('subject'),
			"query" => $request->input('message')
		];

		$insert = Queries::create($newQuery);
		return $insert;

	}

}