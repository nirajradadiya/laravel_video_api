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

 
/** Without Middleware Api List **/
Route::group(['prefix' => API_V1_PREFIX,'namespace'=>'Api'], function () {
   
    /*Basic Video Apis Start*/
    Route::get("/users/total-video-size",array(   //2)Get Total Video Size             
        'uses' => 'VideoController@getTotalVideoSize'));

    Route::get("/videos/{videoid}/meta-data",array(   //2)Get Total Video Size             
        'uses' => 'VideoController@getVideoMetaData'));

    Route::put("/videos/{videoid}/meta-data",array(   //3)Update Video Size and Viewers             
        'uses' => 'VideoController@updateVideoSizeViewers'));


    /*Basic Video Apis End*/
});
