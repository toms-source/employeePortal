<?php

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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/document/pending', function () {
    return view('dashboard.document');
})->name('document');

Route::get('/document/approved', function () {
    return view('dashboard.document-app');
})->name('document2');


Route::get('/leave/pending', function () {
    return view('dashboard.leave');
})->name('leave');

Route::get('/leave/approved', function () {
    return view('dashboard.leave-app');
})->name('leave2');

Route::get('/loan/pending', function () {
    return view('dashboard.loan');
})->name('loan');

Route::get('/loan/approved', function () {
    return view('dashboard.loan-app');
})->name('loan2');

Route::get('/other/pending', function () {
    return view('dashboard.other-request');
})->name('other');

Route::get('/other/approved', function () {
    return view('dashboard.other-request-app');
})->name('other2');



Route::get('/admin', function(){
    return view('admin');
});
