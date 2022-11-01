<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CanalController;

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

Route::get('/', [CanalController::class, 'index']);
Route::get('/canal/create', [CanalController::class, 'create'])->middleware('auth');
Route::get('/canal/detalhes/{id}', [CanalController::class, 'show']);
Route::post('/canais', [CanalController::class, 'store']);

Route::get('/dashboard', [CanalController::class, 'dashboard'])->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
]);
