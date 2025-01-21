<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/edit/{id}',[StudentController::class,'edit'])->name('student.edit');
Route::put('/update/{id}',[StudentController::class,'update'])->name('student.update');
Route::delete('/delete/{id}',[StudentController::class,'delete'])->name('student.delete');