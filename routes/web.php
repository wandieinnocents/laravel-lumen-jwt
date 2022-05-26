<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

// WORKING ROUTES
// AUTHENTICATION
 // API route group
// $router->group(['prefix' => 'api', 'middleware' => 'auth'], function ($router) {
    $router->group(['prefix' => 'api'], function ($router)  {
    // register
   $router->post('register', 'AuthController@register');

     // login
   $router->post('login', 'AuthController@login');
   
   // user profile
   $router->get('profile', 'UserController@profile');

   //get one user by id
   $router->get('users/{id}', 'UserController@singleUser');

   // all users
   $router->get('users', 'UserController@allUsers');


// AUTHORS
    $router->get('authors', ['uses' => 'AuthorController@showAllAuthors']);

    $router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);

    $router->post('authors', ['uses' => 'AuthorController@create']);

    $router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);

    $router->put('authors/{id}', ['uses' => 'AuthorController@update']);



});


// TESTING ROUTES
// test
$router->group(['middleware' => 'auth'], function ($router)  {
$router->get('test', 'AuthController@test');
});


// create post single route
//$router->get('create',['uses', 'PostController@create']);

// group routes
$router->group(['prefix' => 'apiV1'] , function() use ($router){
    $router->get('create',['uses', 'PostController@create']);
});

$router->get('tester', 'TestController@test');



