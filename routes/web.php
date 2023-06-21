<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\EmployeeCalendar;
use Livewire\Livewire;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Schedule;
use App\Models\payrollList;
use App\Models\salaryTypes;
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

    Route::get('/dashboard', function () {
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

    Route::get('/attendance/calendar', function () {
        return view('dashboard.attendance');
    })->name('attendance');

    Route::get('/payslips', function () {
        return view('/dashboard.view-payslip');
    })->name('payslips');

    Route::get('/profile', function () {
        return view('/dashboard.user-profile');
    })->name('user.profile');

    Route::get('/profile/setting', function () {
        return view('/dashboard.user-account-setting');
    })->name('user.account.setting');

    
    Route::get('/{id}/employee-payslip-view', function ($id) {
        $payslipRecord = payrollList::where('id', $id)->get();
        $employee = User::findOrFail($payslipRecord[0]->user_id);
        $salaryRecord = salaryTypes::where('daily_rate', $employee->salary_rate)->get();
        return view('livewire.view-payslip-details-emp', compact('employee', 'payslipRecord','salaryRecord'));
    })->name('employee-payslip-view');
});



Route::prefix('admin')->middleware('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard.admin-dash');
    })->name('admin.dashboard');

    Route::get('/payslip', function () {
        return view('/dashboard.view-payslipA');
    })->name('payslip'); 

    Route::get('/profile', function () {
        return view('dashboard.admin-profile');
    })->name('admin.profile');

    Route::get('/document', function () {
        return view('dashboard.admin-document');
    })->name('admindpen');

    Route::get('/leave', function () {
        return view('dashboard.admin-leave');
    })->name('adminleave');

    Route::get('/loan', function () {
        return view('dashboard.admin-loan');
    })->name('adminloan');

    Route::get('/other', function () {
        return view('dashboard.admin-other');
    })->name('adminother');

    Route::get('/account-setting', function () {
        return view('dashboard.admin-account-setting');
    })->name('admin.account.setting');

    Route::get('/account-employees', function () {
        return view('dashboard.admin-employee-list');
    })->name('admin.employee.list');

    Route::get('/add-employee', function () {
        return view('dashboard.admin-add-user');
    })->name('admin.addemployee');

    Route::get('/department', function () {
        return view('dashboard.admin-department-list');
    })->name('admin.department');

    Route::get('/attendance/calendar', function () {
        return view('dashboard.attendance2');
    })->name('attendance2');


    Route::get('/schedule', function () {
        return view('dashboard.sched');
    })->name('schedule');

    Route::get('/annoucement', function () {
        return view('dashboard.announcement');
    })->name('announcement');

    Route::get('/salary', function () {
        return view('dashboard.salary');
    })->name('salary');

    
    Route::get('/payroll', function () {
        return view('dashboard.payroll');
    })->name('payroll');

    Route::get('/{id}/employee-calendar', function ($id) {
        $employee = User::findOrFail($id);
        $attendanceRecords = Attendance::where('user_id', $id)->get();
        $scheduleRecords = Schedule::where('user_id', $id)->get();
        return view('livewire.employee-calendar', compact('employee', 'attendanceRecords','scheduleRecords'));
    })->name('employee-calendar');
    
    
    Route::get('/{id}/employee-payslip', function ($id) {
        $payslipRecord = payrollList::where('id', $id)->get();
        $employee = User::findOrFail($payslipRecord[0]->user_id);
        $salaryRecord = salaryTypes::where('daily_rate', $employee->salary_rate)->get();
        return view('livewire.view-payslip-details', compact('employee', 'payslipRecord','salaryRecord'));
    })->name('employee-payslip');
});


