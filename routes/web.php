<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\MedCategoryController;
use App\Http\Controllers\MedNameController;
use App\Http\Controllers\PackTemplateController;
use App\Http\Controllers\TemplateMedController;
use App\Http\Controllers\PackController;

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

Route::resource('meds', StockController::class)->middleware(['auth']);

Route::resource('packs','PackController');

Route::resource('med_name',MedNameController::class)->middleware(['auth']);

Route::resource('med_category', MedCategoryController::class)->middleware(['auth']);

Route::resource('pack_template', PackTemplateController::class)->middleware(['auth']);

Route::resource('template_med', TemplateMedController::class)->middleware(['auth']);

Route::resource('packs', PackController::class)->middleware(['auth']);

Route::get('meds/index', 'StockController@indexSorting');

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth'])->name('admin');

Route::get('med_category/index-datatables', 'MedCategoryController@indexDatatables');

require __DIR__.'/auth.php';
