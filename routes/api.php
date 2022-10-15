<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SyncController;
use App\Http\Controllers\UserController;
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

Route::post('auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['apiJwt']], function () {
    Route::get('users', [UserController::class, 'index']);

    Route::any('sync/users', [SyncController::class, 'syncUsers']);
    Route::any('sync/owners', [SyncController::class, 'syncOwners']);
    Route::any('sync/property-types', [SyncController::class, 'syncPropertyTypes']);
    Route::any('sync/properties', [SyncController::class, 'syncProperties']);
});
