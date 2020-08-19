<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class DashboadController extends Controller
{
	public function index(){
	    $page = 'dashboard';
	    return view('backEnd.dashboard',compact('page'));
	}
}
