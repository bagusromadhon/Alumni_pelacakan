<?php
use App\Http\Controllers\AlumniController;
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
Route::get('/alumni', [AlumniController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::post('/alumni/{id}/track', [AlumniController::class, 'track']);

Route::get('/alumni/{id}', [AlumniController::class, 'show']);

Route::post('/alumni', [AlumniController::class, 'store']);