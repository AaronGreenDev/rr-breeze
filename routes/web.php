<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/standardPack', function () {
    return view('standardPack');
})->middleware(['auth'])->name('standardPack');

Route::get('/controlledPack', function () {
    return view('controlledPack');
})->middleware(['auth'])->name('controlledPack');

Route::get('/restock', function () {
    return view('restock');
})->middleware(['auth'])->name('restock');

Route::get('/stockList', function () {
    return view('stockList');
})->middleware(['auth'])->name('stockList');

Route::resource('meds', StockController::class);

Route::resource('medPack','PackController');

Route::get('meds/index', 'StockController@indexSorting');

require __DIR__.'/auth.php';
