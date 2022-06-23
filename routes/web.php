<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

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

Route::resource('/series', SeriesController::class)
  ->only(['index', 'create', 'store', 'destroy']);

/*
Route::controller(SeriesController::class)->group(function () {

                                   // Nomeando as rotas para que seja utilizado nas view
    Route::get('/series', 'index')->name('series.index');
    Route::get('/series/criar', 'create')->name('series.create');
    Route::post('/series/salvar', 'store')->name('series.store');

});
*/

/*
  Route::get('/series', [SeriesController::class, 'index']);
  Route::get('/series/criar', [SeriesController::class, 'create']);
  Route::post('/series/salvar', [SeriesController::class, 'store']);
*/