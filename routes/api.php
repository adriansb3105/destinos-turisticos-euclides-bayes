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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('atractivos/{destino}/{persona}/{edad}/{interes}', ['as' => 'atractivos', 'uses' => 'AtractivosAppController@getAtractivosEuclides']);

//Route::get('tipos/{destino}/{persona}/{edad}/{interes}', ['as' => 'tipos', 'uses' => 'AtractivosAppController@getTiposBayes']);
Route::post('tipos', 'AtractivosAppController@getTiposBayes');

Route::get('atractivosTodos', 'AtractivosAppController@getAtractivosTodos');

Route::post('agregarAtractivo', 'AtractivosAppController@agregarAtractivo');

Route::get('administrador/{usuario}/{contrasena}', ['as' => 'usuarios', 'uses' => 'UsuariosController@login']);