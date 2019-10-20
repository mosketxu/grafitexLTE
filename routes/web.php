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
    Route::resource('element', 'ElementController');//->middleware('admin');

    Route::resource('campaignasociar', 'CampaignAsociarController');//->middleware('admin');

    Route::resource('campaignstore', 'CampaignStoreController');//->middleware('admin');
    Route::resource('campaignmedida', 'CampaignMedidaController');//->middleware('admin');
    Route::resource('campaigncarteleria', 'CampaignCarteleriaController');//->middleware('admin');
    Route::resource('campaignmobiliario', 'CampaignMobiliarioController');//->middleware('admin');
    Route::resource('campaignubicacion', 'CampaignUbicacionController');//->middleware('admin');
    Route::resource('campaignsegmento', 'CampaignSegmentoController');//->middleware('admin');
    Route::resource('campaignstoreconcept', 'CampaignStoreconceptController');//->middleware('admin');
    Route::resource('campaignarea', 'CampaignAreaController');//->middleware('admin');
    Route::resource('campaigncountry', 'CampaignCountryController');//->middleware('admin');

    

});
