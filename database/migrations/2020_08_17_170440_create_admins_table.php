<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('contact');
            $table->string('address');
            $table->string('image')->nullable();
            $table->String('access_rights')->nullable();
            $table->string('security_code')->nullable();
            $table->tinyInteger('admin_type')->comment = '0 for super admin and 1 for sub admin';
            $table->tinyInteger('status')->default(1)->comment = '0 for inactive and 1 for active';
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
