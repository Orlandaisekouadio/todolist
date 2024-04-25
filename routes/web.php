<?php

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

Route::controller(TaskController::class)->group(function () {
    Route::get('/home', 'index');
    Route::delete('/delete/{id}','destroy');

    Route::get('/status/{id}','status');
    Route::get('/edit/{id}/{nb}','edit');

    Route::post('/update/{id}/{nb}','update');

    Route::get('/uncompleted', 'uncompletedTasks');
    Route::post('/ajouter','create');

    Route::get('/completed', 'completedTasks');

});
