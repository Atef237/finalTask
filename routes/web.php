<?php

use App\Models\Admin_group;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|    public function login(){
        return view('user.auth.login');
    }

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




        route::group(['namespace' => 'User','middleware' => 'auth:admin'],function (){

            route::get('/','userController@index')->name('index');

            route::group(['prefix' => 'friend'],function (){

                route::get('show','friendController@AllFriends')->name('AllFriends'); //
                route::get('add','friendController@addFriend')->name('AddFriends'); //
                route::get('sendRequest/{id}','friendController@sendRequest')->name('sendRequest'); //
                route::get('friendRequest','friendController@friendRequest')->name('friendRequest'); //
                route::get('accept_request/{id}','friendController@accept_request')->name('accept_request'); //

            });

            route::group(['prefix' => 'posts'],function (){

                route::get('Post','postController@Post')->name('Post'); //
                route::Post('addPost','postController@addPost')->name('addPost'); //

                route::get('addComment/{id}','commentController@addComment')->name('addComment'); //
                route::Post('addComment','commentController@postComment')->name('postComment'); //
                route::get('addLike/{id}','likeController@addLike')->name('addLike'); //
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

            route::group([ 'prefix' => 'groups'],function (){
                route::get('create','GroupController@create')->name('createGroup');
                route::Post('create','GroupController@postGroup')->name('postGroup');
                route::get('show','GroupController@show')->name('showGroup');
                route::get('Join/{id}','GroupController@join')->name('join');

            });

        });


        route::group(['namespace' => 'User','middleware'=>'guest:web'],function (){

            route::get('register','AuthController@register')->name('register');

            route::get('PostRegister','AuthController@store')->name('PostRegister');

            route::get('login','AuthController@login')->name('login');

            route::Post('login','AuthController@postLogin')->name('admin.post.login');

            route::get('forgot','AuthController@forgotPass')->name('forgot');

            route::Post('resetPass','AuthController@resetPass')->name('resetPass');

            route::Post('updatePassword','AuthController@updatePassword')->name('updatePassword');

            route::get('postFriend','friendController@ggg');
        });


    });
