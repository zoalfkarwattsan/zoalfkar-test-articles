<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth:sanctum', "prefix" => "Comments"], function () {
    Route::get('index/search', [\App\Modules\Comment\Controllers\CommentDashboardController::class, 'searchSelectOptions']);
});

Route::group([], function () {
    Route::get('Comments/datatable', [\App\Modules\Comment\Controllers\CommentDashboardController::class, 'indexDT']);
    Route::resource('Comments', \App\Modules\Comment\Controllers\CommentDashboardController::class);
});
