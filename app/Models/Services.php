<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    protected $fillable = [ 'service_name',
    'icon','link','created_at','updated_at' ];


}