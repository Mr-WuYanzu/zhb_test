<?php

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
use \Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index','IndexController@index');
Route::get('/details','IndexController@details');
Route::get('/auth_code','IndexController@getAuthCode');
Route::post('/login','IndexController@login');
Route::get('/get_specialty','IndexController@getSpecialty');
Route::get('/get_school','IndexController@getSchool');
/** 后台 **/
Route::get('/admin/index','Admin\controller\Index@index')->middleware('checkLogin');
Route::get('/admin/user','Admin\controller\Index@user_list')->middleware('checkLogin');
Route::get('/admin/specialty_list','Admin\controller\Index@specialty_list')->middleware('checkLogin');
Route::get('/admin/spe_add','Admin\controller\Index@spe_add');
Route::post('/admin/spe_add_do','Admin\controller\Index@spe_add_do')->middleware('checkLogin');
Route::get('/admin/spe_del','Admin\controller\Index@spe_del')->middleware('checkLogin');
Route::get('/admin/check_reg','Admin\controller\Index@check_reg')->middleware('checkLogin');
Route::get('/admin/check_reg_del','Admin\controller\Index@check_reg_del')->middleware('checkLogin');
Route::get('/admin/link_reg','Admin\controller\Index@link_reg')->middleware('checkLogin');
Route::post('/admin/link_reg_add','Admin\controller\Index@link_reg_add')->middleware('checkLogin');

Route::get('/admin/school_check_reg','Admin\controller\Index@school_check_reg')->middleware('checkLogin');
Route::get('/admin/school_check_reg_del','Admin\controller\Index@school_check_reg_del')->middleware('checkLogin');
Route::get('/admin/school_link_reg','Admin\controller\Index@school_link_reg')->middleware('checkLogin');
Route::post('/admin/school_link_reg_add','Admin\controller\Index@school_link_reg_add')->middleware('checkLogin');
Route::get('/admin/back_ground_img','Admin\controller\Index@backGroundImg')->middleware('checkLogin');
Route::post('/admin/upload_img','Admin\controller\Index@upload_img')->middleware('checkLogin');

Route::get('/admin/reg_list','Admin\controller\Index@reg_list')->middleware('checkLogin');
Route::get('/admin/reg_add','Admin\controller\Index@reg_add')->middleware('checkLogin');
Route::post('/admin/reg_add_do','Admin\controller\Index@reg_add_do')->middleware('checkLogin');
Route::get('/admin/reg_del','Admin\controller\Index@reg_del')->middleware('checkLogin');

Route::get('/admin/school_list','Admin\controller\Index@school_list')->middleware('checkLogin');
Route::get('/admin/school_add','Admin\controller\Index@school_add')->middleware('checkLogin');
Route::post('/admin/school_add_do','Admin\controller\Index@school_add_do')->middleware('checkLogin');
Route::get('/admin/school_del','Admin\controller\Index@school_del')->middleware('checkLogin');

Route::post('/admin/password_add_do','Admin\controller\Index@password_add_do')->middleware('checkLogin');
Route::get('/admin/password_add','Admin\controller\Index@password_add')->middleware('checkLogin');


Route::get('/admin/login','Admin\controller\Index@loginView')->name('login');
Route::post('/admin/login_do','Admin\controller\Index@login');
