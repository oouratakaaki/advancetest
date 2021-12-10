<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdvanceController;
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



Route::get('/index', [IndexController::class, 'index']);
Route::post('/confirm', [IndexController::class, 'confirm']);
Route::post('/process', [IndexController::class, 'process']);
Route::get('/thanks', [IndexController::class, 'thanks']);


Route::get('/', [AdvanceController::class, 'index2']);
Route::get('/advance', [AdvanceController::class, 'find']);
Route::post('/advance', [AdvanceController::class, 'search']);
Route::get('/advance/{advance}', [AdvanceController::class, 'bind']);
Route::get('/delete', [AuthorController::class, 'delete']);







