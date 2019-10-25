<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/api/campaigns', 'APIController@getCampaigns')->name('api.campaigns.index');
Route::get('/api/{id}/campaignresumen', 'APIController@getCampaignResumen')->name('api.campaigns.resumen');
Route::get('/api/{id}/campaigncontador', 'APIController@getCampaignContador')->name('api.campaigns.contador');
Route::get('/api/{id}/campaignsegmento', 'APIController@getCampaignSegmento')->name('api.campaigns.segmento');
