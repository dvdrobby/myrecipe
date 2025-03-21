<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Middleware\ApiKeysMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(ApiKeysMiddleware::class)->group(function () {

    Route::get('/search', [SearchController::class, 'index']);
    Route::get('/category/{category:slug}', [CategoryController::class, 'show']);
    Route::apiResource('/categories', CategoryController::class);
    Route::get('/recipe/{recipe:slug}', [RecipeController::class, 'show']);
    Route::apiResource('/recipes', RecipeController::class);
});
