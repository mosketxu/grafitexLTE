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
    return view('auth/login');
});
Route::get('/home', 'CampaignController@index')->name('home');

// Auth::routes([
//     'register' => false,
// ]);
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    // Route::resource('user', 'UserController');//->middleware('admin');
    // Route::resource('store', 'StoreController');//->middleware('admin');
    // Route::resource('address', 'AddressController');//->middleware('admin');
    Route::resource('campaign', 'CampaignController');//->middleware('admin');
    // Route::resource('element', 'ElementController');//->middleware('admin');
    
    // ruta stores asociadas
    // Route::group(['prefix' => 'campaign'], function () {
    //     Route::get('/stoAsoc/{campaignid}', 'CampaignStoreController@stoAsoc');
    //     Route::get('/stoDisp/{campaignid}', 'CampaignStoreController@stoDisp');
    //     Route::post('/asoc', 'CampaignStoreController@store')->name('campaign.asoc');
    //     Route::delete('/disp', 'CampaignStoreController@destroy');
    // });

    // asociacion de elementos a stores
    // Route::group(['prefix' => 'store'], function () {
    //     Route::get('/eleAsoc/{storeid}', 'StoreElementController@eleAsoc');
        // Route::get('store/eleDisp/{storeid}', 'StoreElementController@eleDisp');
    //     Route::post('/asoc', 'StoreElementController@store')->name('store.asoc');
    //     Route::delete('/disp', 'StoreElementController@store');
    // });

});
