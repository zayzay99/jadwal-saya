<?php
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('tasks', TaskController::class);
Route::get('/', fn() => redirect()->route('tasks.index'));