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
$router->get('/tblstudent',['uses' => 'StudentController@info']); //get all users

$router->get('/guser/{id}', 'StudentController@show'); // get user by id

$router->post('/auser', 'StudentController@student'); // create new user record

$router->put('/uuser/{id}', 'StudentController@update'); // update user record

$router->delete('/duser/{id}', 'StudentController@delete'); // delete record