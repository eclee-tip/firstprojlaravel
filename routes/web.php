<?php

use App\Http\Controllers\InvokeController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Models\Teacher;
use Termwind\Components\Raw;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    // $name = "Test";
    // $email = "test@gmail.com";

    // Using with method
    // return view('about')->with('name',$name)->with('email',$email);

    // Using compact method
    // return view('about',compact('name','email'));

    // Using array method
    // return view('about',['name' => $name,'email' => $email]);

    return view('about');
});

Route::view('/contact', 'contacts');

Route::controller(StudentController::class)->group(function () {
    Route::get('students', 'index');
    Route::get('about','about');
});

Route::get('invoke', InvokeController::class);

Route::resource('resource', ResourceController::class);

// Route::get('teachers', function () {
//     return Teacher::all();
// });

Route::get('teachers', [TeacherController::class, 'index']);

Route::get('addteacher', [TeacherController::class, 'add']);

Route::get('showteacher/{id}', [TeacherController::class, 'show']);

Route::get('updateteacher/{id}', [TeacherController::class, 'update']);

Route::get('deleteteacher/{id}', [TeacherController::class, 'delete']);

// // Sample Routing
// Route::get('/', function () {
//     return 'Hello';
// });

// Route::get('about', function () {
//     return 'About';
// });

// // Grouping Routes
// Route::prefix('details')->group(function () {
//     Route::get('student', function () {
//         return 'Student';
//     })->name('student-Details');

//     Route::get('teacher', function () {
//         return 'Teacher';
//     })->name('teacher-Details');
// });

// // Routing Parameters
// Route::get('student/{id}/{reg}', function ($id,$reg) {
//     return 'Student number ' . $id . ' Registration number ' . $reg;
// });

// // Routing Fallback
// Route::fallback(function () {
//     return 'Page not found';
// });