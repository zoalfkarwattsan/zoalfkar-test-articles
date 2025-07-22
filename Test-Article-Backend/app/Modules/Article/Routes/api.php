<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth:sanctum', "prefix" => "Articles"], function () {
    Route::get('index/search', [\App\Modules\Article\Controllers\ArticleDashboardController::class, 'searchSelectOptions']);
});

Route::group([], function () {
    Route::get('Articles/datatable', [\App\Modules\Article\Controllers\ArticleDashboardController::class, 'indexDT']);
    Route::resource('Articles', \App\Modules\Article\Controllers\ArticleDashboardController::class);
});
