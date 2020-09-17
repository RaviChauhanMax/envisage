<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('frontEnd')->group(function () {
    Route::get('/', 'Controller@index');
    Route::post('/query','Controller@query');
});


/*********  Admin Route *****/

Route::match(['get', 'post'], 'admin/login', 'backEnd\AuthController@login');
Route::match(['get', 'post'], 'admin', 'backEnd\AuthController@login');
Route::match(['get', 'post'], 'admin/forgot-password', 'backEnd\AuthController@forgot_password');
Route::match(['get', 'post'], 'admin/set-password/{admin_id}/{security_code}', 'backEnd\AuthController@set_password');

/**************** Route After Auth  ***/
Route::group(['prefix' => 'admin', 'middleware' => 'CheckAdminAuth'], function () {
    Route::get('/logout', 'backEnd\AuthController@logout');
    Route::get('dashboard', 'backEnd\DashboadController@index');
    Route::match(['get', 'post'], 'profile', 'backEnd\ProfileController@index');
    Route::match(['get', 'post'], 'change-password', 'backEnd\ProfileController@change_password');

    //Sub Admin management
    Route::match(['get', 'post'], 'sub-admins', 'backEnd\superAdmin\SubAdminController@index');
    Route::match(['get', 'post'], 'sub-admin/add', 'backEnd\superAdmin\SubAdminController@add');
    Route::match(['get', 'post'], 'sub-admin/edit/{sub_admin_id}', 'backEnd\superAdmin\SubAdminController@edit');
    Route::get('sub-admin/delete/{sub_admin_id}', 'backEnd\superAdmin\SubAdminController@delete');
    Route::get('sub-admin/report/excel', 'backEnd\superAdmin\SubAdminController@excel_report');
    Route::get('sub-admin/report/csv', 'backEnd\superAdmin\SubAdminController@csv_report');
    Route::get('sub-admin/report/pdf', 'backEnd\superAdmin\SubAdminController@pdf_report');
    Route::match(['get', 'post'], 'sub-admin/send-credentials/{sub_admin_id}', 'backEnd\superAdmin\SubAdminController@send_credentials');
    Route::get('/validate/sub-admin/email', 'backEnd\superAdmin\SubAdminController@validate_email');
    Route::get('/validate/sub-admin/contact', 'backEnd\superAdmin\SubAdminController@validate_contact');
    //End
    //access rights
    Route::get('access-rights/{sub_admin_id}', 'backEnd\superAdmin\AccessRightController@index');
    Route::match(['get', 'post'], 'access-right/update', 'backEnd\superAdmin\AccessRightController@update');

    //services
    Route::get('services','backEnd\ServicesController@index');
    Route::match(['get','post'],'services/add','backEnd\ServicesController@addServices');

    //abouts
    Route::get('abouts','backEnd\AboutsController@index');
});



/*****  Constant Defind Start Here  ******/

define('projectLink', 'http://localhost:8000/');
define('ADMINLINK', 'http://localhost:8000/admin');
define('PROJECT_NAME', 'Syncboat');
define('systemImgPath', 'images/system');
define('backEndCssPath', 'backEnd/css');
define('backEndJsPath', 'backEnd/js');
define('COMMON_ERROR', 'Some error occured. Please try again later after sometime');
define("UNAUTHORIZE_ERR", "Sorry, You are not authorized to access this page.");



/*******   Image Path  for app and admin  **/
define('profileImagePath', 'images/profile_image');
define('DefaultUserPath', asset('images/system/d2.jpg'));
define('AdminProfileImgath', asset('images/profile/admin'));
