<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    protected $fillable = [ 
    	'title', 'description','image','link','status','created_at','updated_at' 
    ];


}