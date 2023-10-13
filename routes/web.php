<?php

use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/card', [CardController::class, 'index']) ->name('card.index');
Route::get('/card/create', [CardController::class, 'create']) ->name('card.create');
Route::post('/card', [CardController::class, 'store']) ->name('card.store');
Route::get('/card/{card}/edit', [CardController::class, 'edit'])->name('card.edit');
Route::put('/card/{card}/update', [CardController::class, 'update'])->name('card.update');
Route::delete('/card/{card}/destroy', [CardController::class, 'destroy'])->name('card.destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
