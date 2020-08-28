<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Queries extends Model
{
    protected $table = 'queries';

    protected $fillable = [ 
    	'name', 'mobile_no','scheduled_at','query','created_at','updated_at' 
    ];


}