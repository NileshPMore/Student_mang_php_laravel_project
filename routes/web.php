<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Students\StudentsAddController;
use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Models\Teacher;


//tempory i use here modal

// Route::get('/', function () {
//     return view('welcome');
// });

Route::any('/dashboard', function () {
    $getteacherData = Teacher::select('class_teacher_name','id')->pluck('class_teacher_name','id')->toArray();
    $getstudentData = Student::select('id','name','email','class','class_teacher_id','admission_date','yearly_fees')->get()->toArray();
    
    return view('dashboard')->with('studentlist',$getstudentData)->with('getteacherData',$getteacherData);
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::any('/addstudent',[StudentsAddController::class,'addstudent'])->name('addstudent');
    Route::post('/savestudentdata',[StudentsAddController::class,'savestudentdata'])->name('savestudentdata');

    Route::any('/editstudentdata',[StudentsAddController::class,'editstudentdata'])->name('editstudentdata');
    Route::post('/deletestudentdata',[StudentsAddController::class,'deletestudentdata'])->name('deletestudentdata');
    

});

require __DIR__.'/auth.php';
