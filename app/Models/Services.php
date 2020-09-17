<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    protected $fillable = [
    	'icon','link','created_at','updated_at','service_name' 
    ];

}