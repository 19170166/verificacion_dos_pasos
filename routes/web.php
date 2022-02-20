<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('Login',function(){
    return view('login');
});
Route::get('Verification-code/{id}',function($id){
    return view('numberV',['id'=>$id]);
})->where(['id'=>'[0-9]+']);
/*Route::get('send-email',function () {
    $verification = [
        'title'=>'Verification',
        'body'=>1654351
    ];

    \Mail::to('19170166@uttcampus.edu.mx')->send(new \App\Mail\Verification($verification));
    dd('Email enviado');
});*/
