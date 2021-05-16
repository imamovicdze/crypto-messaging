<?php

use App\Http\Controllers\HomeController;
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
})->name('home');

Route::get('/encryption/symmetric', [HomeController::class, 'symmetric'])->name('encryption-symmetric');
Route::get('/encryption/asymmetric/anonymous', [HomeController::class, 'asymmetricAnonymous'])->name('encryption-asymmetric-anonymous');
Route::get('/encryption/asymmetric/authenticated', [HomeController::class, 'asymmetricAuthenticated'])->name('encryption-asymmetric-authenticated');

Route::get('/authentication/symmetric', [HomeController::class, 'authenticationSymmetric'])->name('authentication-symmetric');
Route::get('/authentication/asymmetric', [HomeController::class, 'authenticationAsymmetric'])->name('authentication-asymmetric');
