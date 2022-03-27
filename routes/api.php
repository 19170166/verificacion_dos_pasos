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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('Login','Login@LoginAction');
Route::post('Verify/{id}','code@verifyCode')->where(['id'=>'[0-9]+']);
Route::get('download/{code}','code@downloadCode')->where(['code'=>'[0-9]+']);
