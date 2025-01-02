<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
 |----------------------------------------------------------------------
 | API Routes
 |----------------------------------------------------------------------
 |
 | Here is where you can register API routes for your application. These
 | routes are loaded by the RouteServiceProvider within a group which
 | is assigned the "api" middleware group. Enjoy building your API!
 |
 */

// Route for the authenticated user (optional, only if needed)
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Define the routes for posts using API resource controller
Route::apiResource('posts', PostController::class);
