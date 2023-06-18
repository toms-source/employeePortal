<?php

use Illuminate\Support\Facades\Redirect;
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

// Route::get('/', function () {
//     return view('auth.login');
// });

// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


// Route::get('/document/pending', function () {
//     return view('dashboard.document');
// })->name('document');

// Route::get('/document/approved', function () {
//     return view('dashboard.document-app');
// })->name('document2');


// Route::get('/leave/pending', function () {
//     return view('dashboard.leave');
// })->name('leave');

// Route::get('/leave/approved', function () {
//     return view('dashboard.leave-app');
// })->name('leave2');

// Route::get('/loan/pending', function () {
//     return view('dashboard.loan');
// })->name('loan');

// Route::get('/loan/approved', function () {
//     return view('dashboard.loan-app');
// })->name('loan2');

// Route::get('/other/pending', function () {
//     return view('dashboard.other-request');
// })->name('other');

// Route::get('/other/approved', function () {
//     return view('dashboard.other-request-app');
// })->name('other2');

// Route::get('/dashboard', function () {
//     return view('dashboard.main');
// })->name('dashboard');



Auth::routes();

//login routing - middleware
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        if (auth()->check()) {
            if (auth()->user()->role == 'user') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('admin.dashboard');
            }
        } else {
            return redirect()->route('login'); 
        }
    });
});

Route::prefix('user')->middleware('user.role')->group(function () {
    // Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::get('/dashboard', function(){
        return view('/dashboard.main');
    })->name('dashboard');

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
});



Route::prefix('admin')->middleware('admin')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('admin');
    })->name('admin.dashboard');
    //dagdagan mo nalang dito ng route kagaya sa user 
});
