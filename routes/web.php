<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PayCourseController;
use App\Http\Controllers\SectionContentController;

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


    // routes/web.php

    Route::prefix('pay-courses')->name('pay-courses.')->group(function () {
        Route::get('/',                 [PayCourseController::class, 'index'])->name('index');
        Route::get('/create',           [PayCourseController::class, 'create'])->name('create');
        Route::post('/',                [PayCourseController::class, 'store'])->name('store');
        Route::get('/{pay_course}',     [PayCourseController::class, 'show'])->name('show');
        Route::get('/{pay_course}/edit', [PayCourseController::class, 'edit'])->name('edit');
        Route::put('/{pay_course}',     [PayCourseController::class, 'update'])->name('update');
        Route::delete('/{pay_course}',  [PayCourseController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('sections')->name('sections.')->group(function () {
        Route::get('/',       [SectionController::class, 'index'])->name('index');
        Route::get('/create', [SectionController::class, 'create'])->name('create');
        Route::post('/',      [SectionController::class, 'store'])->name('store');
        Route::get('/{section}', [SectionController::class, 'show'])->name('show');
        Route::get('/{section}/edit', [SectionController::class, 'edit'])->name('edit');
        Route::put('/{section}', [SectionController::class, 'update'])->name('update');
        Route::delete('/{section}', [SectionController::class, 'destroy'])->name('destroy');
    });



    Route::prefix('section-contents')->name('section_contents.')->group(function () {
        Route::get('/',       [SectionContentController::class, 'index'])->name('index');
        Route::get('/create', [SectionContentController::class, 'create'])->name('create');
        Route::post('/',      [SectionContentController::class, 'store'])->name('store');
        Route::get('/{sectionContent}', [SectionContentController::class, 'show'])->name('show');
        Route::get('/{sectionContent}/edit', [SectionContentController::class, 'edit'])->name('edit');
        Route::put('/{sectionContent}', [SectionContentController::class, 'update'])->name('update');
        Route::delete('/{sectionContent}', [SectionContentController::class, 'destroy'])->name('destroy');
    });
});


Route::get("error403", function () {
    return view('error403');
})->name("error403");



require __DIR__ . '/auth.php';
