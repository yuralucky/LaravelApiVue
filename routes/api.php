<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::namespace('Api\V1')->group(function () {
    Route::apiResource('comments', 'CommentsController');
});
Route::fallback(function () {
    return response()->json(['message' => 'Page Not Found'], 404);
})->name('api.fallback.404');
