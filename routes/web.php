<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamNameController;
use App\Http\Controllers\VoteController;

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

Route::get('/', [TeamNameController::class, 'index'])->name('teamNames.index');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/create', [TeamNameController::class, 'create'])->name('teamNames.create');

    Route::post('/store', [TeamNameController::class, 'store'])->name('teamNames.store');

    Route::post('/votes/store', [VoteController::class, 'store'])->name('votes.store');
});
