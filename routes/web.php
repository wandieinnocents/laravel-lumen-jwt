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

// routes
$router->get('foo',function(){
    return "hello wandie";
});

// create post single route
//$router->get('create',['uses', 'PostController@create']);

// group routes
$router->group(['prefix' => 'api'] , function() use ($router){
    $router->get('create',['uses', 'PostController@create']);
});


// $router->group(['prefix' => 'apiv'] , function() use ($router){
// $router->get('students',         ['uses' => 'StudentController@showAllStudents']);
// $router->get('students/{id}',    ['uses' => 'StudentController@showOneStudent']);
// $router->post('students',        ['uses' => 'StudentController@create']);
// $router->delete('students/{id}', ['uses' => 'StudentController@delete']);
// $router->put('students/{id}',    ['uses' => 'StudentController@update']);


// });


