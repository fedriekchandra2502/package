<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Models\Package;

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


Route::get('/packages', [PackageController::class, 'getAllPackages']);
Route::get('/package/{id}', [PackageController::class, 'getPackage']);
Route::post('/package', [PackageController::class, 'createPackage']);
Route::put('/package/{id}', [PackageController::class, 'updatePackage']);
Route::patch('/package/{id}', [PackageController::class, 'updatePackageName']);
Route::delete('/package/{id}', [PackageController::class, 'deletePackage']);
