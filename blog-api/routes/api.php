<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/blogs/image-upload', [App\Http\Controllers\BlogController::class, 'imageUpload']);

YajTech\Crud\Helper\CrudRoute::generateRoutes('blog', App\Http\Controllers\BlogController::class);
