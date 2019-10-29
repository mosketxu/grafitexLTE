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
        Route::group(['prefix' => 'campaign'], function () {
            Route::post('/asociar', 'CampaignController@asociar');
            Route::post('/asociarstore', 'CampaignController@asociarstore');
            Route::get('/{id?}/generarcampaign', 'CampaignController@generarcampaign')->name('campaign.generar');
            Route::get('/{id?}/filtro', 'CampaignController@filtrar')->name('campaign.filtrar');
            Route::get('/{id?}/elementos', 'CampaignController@elementos')->name('campaign.elementos');
            Route::get('/{id?}/conteo', 'CampaignController@conteo')->name('campaign.conteo');
            // galeria
            Route::get('/{campaignId?}/galeria', 'CampaignGaleriaController@index')->name('campaign.galeria.index');
            Route::get('/{campaignId?}/{imagenId?}/galeria', 'CampaignGaleriaController@edit')->name('campaign.galeria.edit');
            Route::post('/galeria/update', 'CampaignGaleriaController@update')->name('campaign.galeria.update');
            // Route::get('/{campaign}/galeriaimagenes', 'CampaignGaleriaController@index')->name('campaign.galeriaimagenes');
            // Route::post('/galeriaimagenesupdate', 'CampaignGaleriaController@galeriaimagenesupdate')->name('campaign.galeriaimagenesupdate');

        });
    Route::resource('element', 'ElementController');//->middleware('admin');
});



