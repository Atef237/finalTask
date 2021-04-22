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


    route::group(['namespace' => 'User\Api'],function (){

        route::group(['prefix' => 'post'],function (){

            route::get ('posts','PostController@posts');      // It works properly
            route::Post('addPost','PostController@add');     // It works properly
            route::Post('update','PostController@update');  // It works properly
            route::get ('delete','PostController@delete'); // It works properly

        });


        route::group(['prefix' => 'friend'],function (){

            route::get ('all','friendController@all');            // It works properly
            route::Post('sendRequest','friendController@sendRequest');

        });

        route::group(['prefix' => 'timeLine'],function(){
            route::get('friend','timeline@friend');
        });


        route::group(['prefix' => 'comment'],function(){

            route::post('add','commentController@add'); // It works properly
            route::get ('delete','commentController@delete');// It works properly
            route::Post ('update','commentController@update'); // It works properly
        });


        route::group(['prefix' => 'reply'],function(){

            route::post('add','replyController@add');
            route::get ('delete','replyController@delete');
            route::Post('update','replyController@update');

        });



        route::Post('login','AuthController@Login');// It works properly
        route::Post('register','AuthController@register');// It works properly

        route::post('forgot','forgotController@forgot');// It works properly
        route::post('reset','forgotController@reset')->name('reset'); // It works properly


    });


