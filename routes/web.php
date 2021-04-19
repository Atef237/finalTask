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

    Route::get('test', function () {
        return view('layouts.user');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){




        route::group(['namespace' => 'User'],function (){
            route::get('/','userController@index')->name('index');

            route::group(['prefix' => 'friend'],function (){

                route::get('show','userController@AllFriends')->name('AllFriends'); //
                route::get('add','userController@addFriend')->name('AddFriends'); //
                route::get('sendRequest/{id}','userController@sendRequest')->name('sendRequest'); //

            });

            route::group(['prefix' => 'posts'],function (){

                route::get('Post','userController@Post')->name('Post'); //
                route::Post('addPost','userController@addPost')->name('addPost'); //
                route::get('addComment/{id}','userController@addComment')->name('addComment'); //
                route::Post('addComment','userController@postComment')->name('postComment'); //
                route::get('addLike/{id}','userController@addLike')->name('addLike'); //
            });


      #######################################################################################################################

            route::group([ 'prefix' => 'users'],function (){

                route::get('show','userController@showUsers')->name('showUsers');

                route::get('add','userController@addUsers')->name('addUsers');

                route::Post('add','userController@postUser')->name('postUser');

                route::get('edit/{id}','userController@edit')->name('edit');

                route::Post('update/{id}','userController@update')->name('update');

                route::get('delete/{id}','userController@destroy')->name('delete');

            });
      ######################################################################################################################


        });


        route::group(['namespace' => 'User'],function (){

            route::get('login','userController@login')->name('login');

            route::Post('login','userController@postLogin')->name('admin.post.login');

            route::get('forgot','userController@forgotPass')->name('forgot');

            route::Post('resetPass','userController@resetPass')->name('resetPass');

            route::Post('updatePassword','userController@updatePassword')->name('updatePassword');

        });
    });
