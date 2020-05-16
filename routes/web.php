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
$router->group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function() use($router)
{
    $router->get('insurances','InsuranceController@index');
    $router->post('insurances','InsuranceController@store');
    $router->get('insurances/{insurance}','InsuranceController@show');
    $router->put('insurances/{insurance}','InsuranceController@update');
    $router->patch('insurances/{insurance}','InsuranceController@update');
    $router->delete('insurances/{insurance}','InsuranceController@destroy');
});
