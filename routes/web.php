<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LoginController;

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
    return view('login');
})->name('login');

Route::post('/loginvarify', [LoginController::class, 'login'])->name('loginvarify');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome')->middleware('auth');


Route::get('/view', function () {
    return view('view');
})->name('view');

Route::get('/showdata', [DataController::class, 'showdata'])->name('showdata');
Route::get('/download', [DataController::class, 'download'])->name('data.download');

Route::get('/fileupload', function () {
    return view('fileupload');
})->name('fileupload');

Route::post('/upload', [DataController::class, 'upload'])->name('upload');
