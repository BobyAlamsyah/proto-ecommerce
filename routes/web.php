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
//store front 
Route::get('/', 'Store\Home@index');

//login
Route::get('/login','StoreAuthAdminController@index')->name('login');
Route::get('/logout','StoreAuthAdminController@logout');
Route::post('/auth','StoreAuthAdminController@auth');

//Route::get('/kirim','admin\Home_admin@kirim');

//Admin Store
Route::group(['middleware' => 'SessionAdmin'],function(){
     Route::get('/dashboard_admin','admin\Home_admin@index');
});

//Customer
Route::group(['middleware' => 'SessionCustomer'],function(){
      Route::get('/dashboard','customer\Home_cust@index');
});
 