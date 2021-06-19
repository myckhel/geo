<?php

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

//shared server clear cache
Route::get('/clear-cache', fn () => Artisan::call('cache:clear'));

// migrate db
Route::get('/db/migrate', fn() => Artisan::call('migrate'));

Route::get('/db/migrate/fresh', fn () => Artisan::call('migrate:fresh'));
