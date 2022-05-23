<?php

use App\Http\Controllers\CarehomeController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\MockObject\Rule\Parameters;

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
    return view('info');
})->name('/');

Route::get('/home', function () {
    return view('webpages.welcome');
})->name('/home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('webpages.dashboard');
        })->name('dashboard');

    });

    Route::group( ['middleware' => 'auth'], function(){
        Route::resource('carehomes',CarehomeController::class)->parameters(['' => 'webpages']);
    });
