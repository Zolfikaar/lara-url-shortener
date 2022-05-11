<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

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

Route::get('/', [UrlController::class, 'index']);
Route::get('open-url', [UrlController::class, 'open_url'])->name('open-url');
Route::post('create', [UrlController::class, 'create'])->name('create');
Route::get('delete/{id}', [UrlController::class, 'destroy'])->name('delete');
Route::get('delete-all', [UrlController::class, 'deleteAll'])->name('delete-all');
