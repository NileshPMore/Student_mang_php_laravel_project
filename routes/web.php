<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Students\StudentsAddController;
use App\Http\Controllers\Students\DashboardController;
use Illuminate\Support\Facades\Route;



//tempory i use here modal

// Route::get('/', function () {
//     return view('welcome');
// });

Route::any('/dashboard',[DashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

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
