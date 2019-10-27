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

Auth::routes([
    'register' => false,
]);
// Auth::routes();

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/home', 'CampaignController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('user', 'UserController');//->middleware('admin');
    Route::resource('store', 'StoreController');//->middleware('admin');
    Route::resource('address', 'AddressController');//->middleware('admin');
    Route::resource('campaign', 'CampaignController');//->middleware('admin');
        Route::post('campaign/asociar', 'CampaignController@asociar');
        Route::post('campaign/asociarstore', 'CampaignController@asociarstore');
        Route::get('campaign/{id}/generarcampaign', 'CampaignController@generarcampaign')->name('campaign.generar');
        Route::get('campaign/{id}/filtro', 'CampaignController@filtrar')->name('campaign.filtrar');
        Route::get('campaign/{id}/elementos', 'CampaignController@elementos')->name('campaign.elementos');
        Route::get('campaign/{id}/conteo', 'CampaignController@conteo')->name('campaign.conteo');
    Route::resource('element', 'ElementController');//->middleware('admin');
});
