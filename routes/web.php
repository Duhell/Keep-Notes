<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;


// Get Request
Route::get('/',[NoteController::class,'viewLoginPage'])->name('login');
Route::get('/logout',[NoteController::class,'logout']);
Route::get('/register',[NoteController::class,'viewRegisterPage']);
Route::get('/notes',[NoteController::class,'viewNotesPage'])->middleware('auth');
Route::get('/add',[NoteController::class,'viewAddPage'])->middleware('auth');
Route::get('/delete/{noteid}',[NoteController::class,'deleteNote'])->name('deleteNote')->middleware('auth');
Route::get('notes/edit/{noteid}',[NoteController::class,'viewEditNotePage'])->name('editNote')->middleware('auth');


// Post Request
Route::post('/',[NoteController::class,'login']);
Route::post('/register',[NoteController::class,'register']);
Route::post('/add',[NoteController::class,'add'])->middleware('auth');
Route::post('/edit',[NoteController::class,'editNote'])->middleware('auth');



