<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FilterController;

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
Route::get('dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/filter', function () {return view('filter');
})->name('filter');
Route::get('end-year',[FilterController::class, 'end_year'])->name('end-year');
Route::get('topic',[FilterController::class, 'topic'])->name('topic');
Route::get('end-year-submit',[FilterController::class, 'end_yearSubmit'])->name('end-yearSubmit');
Route::get('topic-submit',[FilterController::class, 'topicSubmit'])->name('topicSubmit');
// Route::get('/table', function () {return view('table');
// })->name('table');
