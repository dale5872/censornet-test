<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\VegetableController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'vegetables'
], function() {
    Route::get('', [VegetableController::class, 'index']);
    Route::get('{vegetable}', [VegetableController::class, 'read']);
    Route::post('', [VegetableController::class, 'create']);
    Route::patch('{vegetable}', [VegetableController::class, 'update']);
    Route::delete('{vegetable}', [VegetableController::class, 'delete']);
});
