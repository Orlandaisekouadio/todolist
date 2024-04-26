<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::controller(TaskController::class)->group(function () {
    Route::get('/home', 'index');
    Route::delete('/delete/{id}', 'destroy');

    Route::get('/status/{id}', 'status');
    Route::get('/edit/{id}/{nb}', 'edit');

    Route::post('/update/{id}/{nb}', 'update');

    Route::get('/uncompleted', 'uncompletedTasks');
    Route::post('/ajouter', 'create');

    Route::get('/completed', 'completedTasks');

});

require __DIR__ . '/auth.php';
