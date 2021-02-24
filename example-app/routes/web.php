<?php

use App\Http\Controllers\mainController;
use App\Http\Models\Quote;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

//Route::get('/', [mainController::class,'index']);
Route::get('/', [mainController::class, 'index'])->name('home');

Route::post('/add', [mainController::class, 'add'])->name('add');

Route::post('/find', [mainController::class, 'find'])->name('find');
