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

$router->group(['prefix'=>'api'], function() use ($router){

    $router->get('/contratos', 'ContratoController@index');
    $router->get('/contratos/produtos', 'ContratoController@produtos');
    $router->get('/contratos/produtos/{produto}', 'ContratoController@produto');
    $router->get('/contratos/{produto}/{contrato}', 'ContratoController@show');

    $router->get('/contratos/{produto}/{contrato}/parcelas', 'ParcelaController@parcelasContrato');
    $router->get('/contratos/{produto}/{contrato}/parcelas/{parcela}', 'ParcelaController@show');
    $router->put('/contratos/{produto}/{contrato}/parcelas/{parcela}', 'ParcelaController@update');

    $router->get('/contratos/{produto}/{contrato}/saldos', 'SaldoController@saldosContrato');
    $router->get('/contratos/{produto}/{contrato}/saldos/{saldo}', 'SaldoController@show');
    $router->put('/contratos/{produto}/{contrato}/saldos/{saldo}', 'SaldoController@update');

    
    /*
    $router->get('/saldos', 'SaldoController@index');
    $router->get('/saldosContrato', 'SaldoController@show');

    $router->get('/parcelas', 'ParcelaController@index');
    $router->get('/parcelasContrato', 'ParcelaController@show');

    $router->get('/saldos', 'SaldoController@index');
    $router->get('/saldosContrato', 'SaldoController@show');
    */
     
});
