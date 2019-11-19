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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/donors/index', 'DonorController@index');

Route::get('/donors/create', 'DonorController@create');

Route::post('donors/store', ['uses' => 'DonorController@store']);

Route::get('/donors/view/{id}', ['uses' => 'DonorController@view']);

Route::get('/donors/edit/{id}', ['uses' => 'DonorController@edit']);

Route::post('donors/edit/update', ['uses' => 'DonorController@update']);

Route::get('/donors/delete/{id}', ['uses' => 'DonorController@delete']);

//Route::post('donors/search-result', ['uses' => 'DonorController@search']);

Route::get('donors/search/{keyword}', ['uses' => 'DonorController@search']);

Route::get('donors/search', function (){
    return view('Donors.search');
});

Route::post('donors/search-result', function (){
    $path = "donors/search/".$_POST['keyword'];
    return redirect($path);
});


