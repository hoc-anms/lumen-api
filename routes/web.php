<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix'=>'api/v1'],function ($app){

    $app->group(['prefix'=>'posts','middleware'=>'auth'],function ($app){
        $app->post('add','PostsController@createPost');

        $app->get('view/{id}','PostsController@viewPost');

        $app->put('edit/{id}','PostsController@updatePost');

        $app->delete('delete/{id}','PostsController@deletePost');

        $app->get('index','PostsController@index');
    });
    $app->group(['prefix'=>'users'],function ($app){

        $app->post('add','UsersController@add');

    });


});