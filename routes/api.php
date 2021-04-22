<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


        route::Post('login','AuthController@Login');
        route::Post('register','AuthController@register');

        route::post('forgot','forgotController@forgot');
        route::post('reset','forgotController@reset')->name('reset');



    route::group(['namespace' => 'User\Api'],function (){

        route::group(['prefix' => 'post'],function (){

            route::get ('posts','PostController@posts');
            route::Post('addPost','PostController@add');
            route::Post('update','PostController@update');
            route::get ('delete','PostController@delete');

        });

        route::group(['prefix' => 'comment'],function(){

            route::post('add','commentController@add');
            route::get ('delete','commentController@delete');
            route::Post ('update','commentController@update');
        });


        route::group(['prefix' => 'reply'],function(){

            route::post('add','replyController@add');
            route::get ('delete','replyController@delete');
            route::Post('update','replyController@update');

        });

        route::group(['prefix' => 'group'],function(){

            route::post('create','GroupController@create');
            route::get ('show','GroupController@show');
            route::Post('join','GroupController@join');
            route::get ('out/{id}','GroupController@out');

        });


        ##

        route::group(['prefix' => 'friend'],function (){

            route::get ('all','friendController@all');            //
            route::Post('sendRequest','friendController@sendRequest');
            route::get ('friendRequest','friendController@friendRequest');

        });

        route::group(['prefix' => 'timeLine'],function(){
            route::get('friend','timeline@friend');
        });











    });


