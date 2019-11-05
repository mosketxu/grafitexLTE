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
            Route::get('/{id?}/conteo', 'CampaignController@conteo')->name('campaign.conteo');
            //Elementos
            Route::group(['prefix' => 'elementos'], function () {
                Route::get('/{id}', 'CampaignElementoController@index')->name('campaign.elementos');
                // Route::get('/{campaignlemento}', 'CampaignElementoController@edit')->name('campaign.elementos.edit');
                Route::get('/{campaign}/{campaigngaleria}/edit', 'CampaignElementoController@editelemento')->name('campaign.elemento.editelemento');
                Route::post('/update', 'CampaignElementoController@update')->name('campaign.elemento.update');
                Route::post('/updateimagenindex', 'CampaignElementoController@updateimagenindex')->name('campaign.elementos.updateimagenindex');
            });
            // galeria
            Route::group(['prefix' => 'galeria'], function () {
                Route::get('/{campaignId}', 'CampaignGaleriaController@index')->name('campaign.galeria');
                Route::get('/{campaigngaleria}', 'CampaignGaleriaController@edit')->name('campaign.galeria.edit');
                Route::get('/{campaign}/{campaigngaleria}/edit', 'CampaignGaleriaController@editgaleria')->name('campaign.galeria.editgaleria');
                Route::post('/update', 'CampaignGaleriaController@update')->name('campaign.galeria.update');
                Route::post('/updateimagenindex', 'CampaignGaleriaController@updateimagenindex')->name('campaign.galeria.updateimagenindex');
            });
            // presupuesto
            Route::group(['prefix' => 'presupuesto'], function () {
                Route::get('/{campaignId}', 'CampaignPresupuestoController@index')->name('campaign.presupuesto');
            });
            // albaran
            Route::group(['prefix' => 'albaran'], function () {
                Route::get('/{campaignId}', 'CampaignAlbaranController@index')->name('campaign.albaranes');
            });

        });

    Route::resource('element', 'ElementController');//->middleware('admin');

    Route::get('/import', 'MaestroController@import');
});



