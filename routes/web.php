<?php

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
Route::get('/decoder', [
    'uses' => 'CipherController@index',
    'as' => 'decoder'
]);

// Route::get('/decoder/{id}', [
//     'uses' => 'CipherController@show',
//     'as' => 'decoder'
// ]);

// Route::get('/decoder', [
//     'uses' => 'CipherController@show',
//     'as'   => 'decoder',
// ]);

Route::post('/decoder', [
    'uses' => 'CipherController@store',
    'as' => 'decoder',
]);
