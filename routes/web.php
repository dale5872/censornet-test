<?php

use App\Http\Controllers\VegetableController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'vegetables'
], function() {
    Route::get('', [VegetableController::class, 'index']);
});
