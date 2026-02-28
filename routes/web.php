<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BuyController;

/*
|--------------------------------------------------------------------------
| TommyCoin Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/price', [HomeController::class, 'price'])->name('price');

Route::prefix('buy')->name('buy.')->group(function () {
    Route::get('/',     [BuyController::class, 'index'])->name('index');
    Route::post('/',    [BuyController::class, 'store'])->name('store');
    Route::get('/success', [BuyController::class, 'success'])->name('success');
});

// Simple JSON price endpoint (mock live data)
Route::get('/api/price', function () {
    $base  = 0.0042;
    $delta = (mt_rand(-50, 200) / 10000);
    $price = max(0.0001, $base + $delta);

    return response()->json([
        'price'        => round($price, 6),
        'change_24h'   => round(mt_rand(-20, 150) / 10, 2),
        'market_cap'   => '$' . number_format(mt_rand(800000, 1200000)),
        'volume_24h'   => '$' . number_format(mt_rand(50000, 150000)),
        'holders'      => number_format(mt_rand(12000, 13500)),
        'timestamp'    => now()->toIso8601String(),
    ]);
})->name('api.price');
