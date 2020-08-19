<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessRightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_right', function (Blueprint $table) {
            $table->increments('id');
            $table->string('route');
            $table->string('module_name');
            $table->string('submodule_name');
            $table->string('module_code');
            $table->unsignedInteger('management_section_id');
            $table->unsignedInteger('main_page');
            $table->unsignedInteger('main_route_id');
            $table->unsignedInteger('disabled');
            $table->unsignedInteger('tag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access_right');
    }
}
