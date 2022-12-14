<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Account\IndexController as AccountIndexController;

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
});

Route::get('/account', AccountIndexController::class)
    ->name('account');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/trainers', [PageController::class, 'index'])
    ->name('trainers.index');
Route::get('/trainers/{id}', [PageController::class, 'show'])
    ->where('id', '\d+')
    ->name('trainers.show');
