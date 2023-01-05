<?php

use App\Http\Controllers\AdvertController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [AdvertController::class, 'index'])->name('adverts.index');
Route::get('/adverts/{advert}', [AdvertController::class, 'show'])->name('adverts.show');
Route::get('/adverts', [AdvertController::class, 'create'])->name('adverts.create');
Route::post('/adverts', [AdvertController::class, 'store'])->name('adverts.store');
Route::get('/adverts/{advert}/edit', [AdvertController::class, 'edit'])->name('adverts.edit');
Route::put('/adverts/{advert}', [AdvertController::class, 'update'])->name('adverts.update');
Route::delete('/adverts/{advert}', [AdvertController::class, 'destroy'])->name('adverts.destroy');
Auth::routes();
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/applications/{advert}', [ApplicationController::class, 'applications'])->name('applications');
Route::get('/applications/application/{id}', [ApplicationController::class, 'create'])->name('applications.create');
Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
Route::get('/application/{application}', [ApplicationController::class, 'show'])->name('applications.show');
Route::delete('/application/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
Route::get('/statistics', [StatisticsController::class, 'statistics'])->name('home.statistics');
Route::get('/statistic/{id}', [StatisticController::class, 'statistic'])->name('statistic');