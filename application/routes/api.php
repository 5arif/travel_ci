<?php

/**
 * API Routes
 *
 * This routes only will be available under AJAX requests. This is ideal to build APIs.
 */

Route::group('api', function(){
    Route::post('token','api/jwt_controller@index_post');
});

Route::group('api', ['middleware' => ['JwtMiddleware']], function(){
    Route::get('mitra','api/MitraController@index_get');
    Route::post('token_check','api/jwt_controller@token_check');
});
