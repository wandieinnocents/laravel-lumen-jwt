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

 // API route group
$router->group(['prefix' => 'api'], function ($router) {
    // $router->group(['prefix' => 'api', 'middleware' => 'auth'], function ($router)  {
    // Matches "/api/register
   $router->post('register', 'AuthController@register');

     // Matches "/api/login
   $router->post('login', 'AuthController@login');
   
   // Matches "/api/profile
   $router->get('profile', 'UserController@profile');

   // Matches "/api/users/1 
   //get one user by id
   $router->get('users/{id}', 'UserController@singleUser');

   // Matches "/api/users
   $router->get('users', 'UserController@allUsers');

});
$router->group(['middleware' => 'auth'], function ($router)  {
$router->get('test', 'AuthController@test');
});


// create post single route
//$router->get('create',['uses', 'PostController@create']);

// group routes
$router->group(['prefix' => 'apiV1'] , function() use ($router){
    $router->get('create',['uses', 'PostController@create']);
});




