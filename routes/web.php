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
    //Maestro
    Route::get('/maestro','MaestroController@index')->name('maestro.index');
    Route::post('/maestro/import', 'MaestroController@import')->name('maestro.import');;
    //Store
    Route::resource('store', 'StoreController');//->middleware('admin');
    Route::resource('address', 'AddressController');//->middleware('admin');
    Route::resource('campaign', 'CampaignController');//->middleware('admin');
        Route::group(['prefix' => 'campaign'], function () {
            //Campaign
            Route::post('/asociar', 'CampaignController@asociar');
            Route::post('/asociarstore', 'CampaignController@asociarstore');
            Route::get('/{id?}/generarcampaign', 'CampaignController@generarcampaign')->name('campaign.generar');
            Route::get('/{id?}/filtro', 'CampaignController@filtrar')->name('campaign.filtrar');
            Route::get('/{id?}/conteo', 'CampaignController@conteo')->name('campaign.conteo');
            Route::get('/{id?}/eliminar', 'CampaignController@destroy')->name('campaign.eliminar');
            // Route::delete('/{id?}/eliminar', 'CampaignController@destroy')->name('campaign.eliminar');
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
                Route::get('/edit/{presupuestoId}', 'CampaignPresupuestoController@edit')->name('campaign.presupuesto.edit');
                Route::get('/cotizacion/{presupuestoId}', 'CampaignPresupuestoController@cotizacion')->name('campaign.presupuesto.cotizacion');
                Route::post('/update/{presupuestoId}', 'CampaignPresupuestoController@update')->name('campaign.presupuesto.update');
                Route::get('/refresh/{campaignId}/{presupuestoId}', 'CampaignPresupuestoController@refresh')->name('campaign.presupuesto.refresh');
                Route::post('/store','CampaignPresupuestoController@store')->name('campaign.presupuesto.store');
                Route::delete('/delete/{presupuestoId}', 'CampaignPresupuestoController@destroy')->name('campaign.presupuesto.delete');
                //presupuesto detalles
                Route::group(['prefix' => 'detalle'], function () {
                    Route::post('/update/{presupuestodetallelId}', 'CampaignPresupuestoDetalleController@update')->name('campaign.presupuesto.detalle.update');
                    Route::post('/store', 'CampaignPresupuestoDetalleController@store')->name('campaign.presupuesto.detalle.store');
                    Route::get('/delete/{detalleId}', 'CampaignPresupuestoDetalleController@destroy')->name('campaign.presupuesto.detalle.delete');
                });
                //presupuesto extras
                Route::group(['prefix' => 'extra'], function () {
                    Route::post('/update/{presupuestoextraId}', 'CampaignPresupuestoExtraController@update')->name('campaign.presupuesto.extra.update');
                    Route::post('/store', 'CampaignPresupuestoExtraController@store')->name('campaign.presupuesto.extra.store');
                    Route::get('/delete/{extraId}', 'CampaignPresupuestoExtraController@destroy')->name('campaign.presupuesto.extra.delete');
                });

            });
            // albaran
            Route::group(['prefix' => 'reporting'], function () {
                Route::get('/etiquetas/pdf/{campaignId}', 'CampaignReportingController@pdf')->name('campaign.etiquetas.pdf');
                Route::get('/etiquetas/{campaignId}', 'CampaignReportingController@index')->name('campaign.etiquetas.index');
            }); 

        });
        // Tarifas
        Route::resource('tarifa', 'TarifaController');//->middleware('admin');
        Route::resource('tarifafamilia', 'TarifaFamiliaController');//->middleware('admin');
        Route::get('tarifafamilia/actualizar/{id}', 'TarifaFamiliaController@actualizar')->name('tarifafamilia.actualizar');//->middleware('admin');
        Route::resource('element', 'ElementController');//->middleware('admin');


});



