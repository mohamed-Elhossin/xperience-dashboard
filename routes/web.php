<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PayCourseController;
use App\Http\Controllers\SectionContentController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\RealController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ContactController;
Route::get('/', function () {
    return view('auth.login');
})->middleware("guest");

Route::get('/dashboard', function () {

    return view('admin.pages.index');
})->middleware(['auth'])->name('dashboard');
// user-type:employee
// user-type:owner
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




Route::prefix('fields')->name('fields.')->group(function () {
    Route::get('/',       [FieldController::class, 'index'])->name('index');
    Route::get('/create', [FieldController::class, 'create'])->name('create');
    Route::post('/',      [FieldController::class, 'store'])->name('store');
    Route::get('/{field}', [FieldController::class, 'show'])->name('show');
    Route::get('/{field}/edit', [FieldController::class, 'edit'])->name('edit');
    Route::put('/{field}', [FieldController::class, 'update'])->name('update');
    Route::delete('/{field}', [FieldController::class, 'destroy'])->name('destroy');
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





Route::prefix('employees')->name('employees.')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('index');
    Route::get('/create', [EmployeeController::class, 'create'])->name('create');
    Route::post('/', [EmployeeController::class, 'store'])->name('store');
    Route::get('/{employee}', [EmployeeController::class, 'show'])->name('show');
    Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('edit');
    Route::put('/{employee}', [EmployeeController::class, 'update'])->name('update');
    Route::delete('/{employee}', [EmployeeController::class, 'destroy'])->name('destroy');
});


Route::prefix('instructor')->name('instructors.')->group(function () {

    Route::get('/', [InstructorController::class, 'index'])->name('index');
    Route::get('/create', [InstructorController::class, 'create'])->name('create');
    Route::post('/', [InstructorController::class, 'store'])->name('store');
    Route::get('/{instructor}', [InstructorController::class, 'show'])->name('show');
    Route::get('/{instructor}/edit', [InstructorController::class, 'edit'])->name('edit');
    Route::put('/{instructor}', [InstructorController::class, 'update'])->name('update');
    Route::delete('/{instructor}', [InstructorController::class, 'destroy'])->name('destroy');
});


Route::prefix('owners')->name('owners.')->group(function () {
    Route::get('/',       [OwnerController::class, 'index'])->name('index');
    Route::get('/create', [OwnerController::class, 'create'])->name('create');
    Route::post('/',      [OwnerController::class, 'store'])->name('store');
    Route::get('/{owner}', [OwnerController::class, 'show'])->name('show');
    Route::get('/{owner}/edit', [OwnerController::class, 'edit'])->name('edit');
    Route::put('/{owner}', [OwnerController::class, 'update'])->name('update');
    Route::delete('/{owner}', [OwnerController::class, 'destroy'])->name('destroy');
});

Route::prefix('reals')->name('reals.')->group(function () {
    Route::get('/', [RealController::class, 'index'])->name('index');
    Route::get('/create', [RealController::class, 'create'])->name('create');
    Route::post('/', [RealController::class, 'store'])->name('store');
    Route::get('/{real}', [RealController::class, 'show'])->name('show');
    Route::get('/{real}/edit', [RealController::class, 'edit'])->name('edit');
    Route::put('/{real}', [RealController::class, 'update'])->name('update');
    Route::delete('/{real}', [RealController::class, 'destroy'])->name('destroy');
});



 Route::prefix('partner')->name('partners.')->group(function () {
    Route::get('/', [PartnerController::class, 'index'])->name('index');
    Route::get('/create', [PartnerController::class, 'create'])->name('create');
    Route::post('/', [PartnerController::class, 'store'])->name('store');
    Route::get('/{partner}', [PartnerController::class, 'show'])->name('show');
    Route::get('/{partner}/edit', [PartnerController::class, 'edit'])->name('edit');
    Route::put('/{partner}', [PartnerController::class, 'update'])->name('update');
    Route::delete('/{partner}', [PartnerController::class, 'destroy'])->name('destroy');
});




Route::prefix('contacts')->name('contacts.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::get('/create', [ContactController::class, 'create'])->name('create');
    Route::post('/', [ContactController::class, 'store'])->name('store');
    Route::get('/{contact}', [ContactController::class, 'show'])->name('show');
    Route::get('/{contact}/edit', [ContactController::class, 'edit'])->name('edit');
    Route::put('/{contact}', [ContactController::class, 'update'])->name('update');
    Route::delete('/{contact}', [ContactController::class, 'destroy'])->name('destroy');
});



Route::prefix('feedbacks')->name('feedback.')->group(function () {
    Route::get('/', [FeedbackController::class, 'index'])->name('index');
    Route::get('/create', [FeedbackController::class, 'create'])->name('create');
    Route::post('/', [FeedbackController::class, 'store'])->name('store');
    Route::get('/{feedback}', [FeedbackController::class, 'show'])->name('show');
    Route::get('/{feedback}/edit', [FeedbackController::class, 'edit'])->name('edit');
    Route::put('/{feedback}', [FeedbackController::class, 'update'])->name('update');
    Route::delete('/{feedback}', [FeedbackController::class, 'destroy'])->name('destroy');
});

});


Route::get("error403", function () {
    return view('error403');
})->name("error403");



require __DIR__ . '/auth.php';
