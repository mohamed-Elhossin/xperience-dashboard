<?php

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LeaveUsageController;


Route::get('/', function () {
    return view('auth.login');
})->middleware("guest");

Route::get('/dashboard', function () {

    return view('admin.pages.index');
})->middleware(['auth'])->name('dashboard');

// -------------
Route::middleware('auth')->group(function () {



    Route::get("profile_info", [UserController::class, 'profile_info'])->name("profile_info");
    Route::get('/profile', [UserController::class, 'profile_info'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get("error403", function () {
    return view('error403');
})->name("error403");



require __DIR__ . '/auth.php';
 