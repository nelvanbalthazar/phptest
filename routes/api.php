<?php

use Illuminate\Http\Request;
use App\GetUser;
use App\Http\Resources\GetUser as GetUserResource;

Route::group([

    //'middleware' => 'custom',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::get('getuserlist', function(){
        $user = auth()->user();
        if (!$user == null)
        {
          return GetUserResource::collection(GetUser::all());
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }); 

});
