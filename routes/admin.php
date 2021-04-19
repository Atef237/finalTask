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


Route::get('/', function () {
    return view('welcome');
});




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){




    route::group(['namespace' => 'Admin','prefix' => 'admin'],function (){
       route::get('//','adminController@index')->name('admin.dashboard');

       route::get('show','adminController@allUsers')->name('AllUsers'); // get all users
       route::get('edit/{id}','adminController@editUser')->name('editUser'); // edit user
       route::post('update/{id}','adminController@updateUser')->name('updateUser'); // edit user
       route::get('delete','adminController@deleteUser')->name('deleteUser'); // delete user


       route::get('Postt','adminController@Postt')->name('Postt'); // delete user
       route::Post('addPost','adminController@addPostt')->name('addPostt'); // delete user



    });




    route::group(['namespace' => 'Admin','prefix' => 'admin'],function (){

        route::get('login','adminController@login');



        route::Post('login','adminController@postLogin')->name('admin.post.login');

    });
});

*/
