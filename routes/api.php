<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiUrlController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/urls', [ApiUrlController::class, 'index']);
Route::get('/url/{short_uri}/{token}', [ApiUrlController::class, 'show']);
Route::post('/create/{url}', [ApiUrlController::class, 'create']);


// Route::middleware('auth:sanctum')->get('/url/{token}', function (Request $request) {
//     return $request->user();
// });
