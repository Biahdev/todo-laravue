<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::controller(TaskController::class)->group(function () {
  Route::get('/', 'index');
  Route::post('/task', 'store');
  Route::put('/task/status/{id}', 'updateStatus');
  Route::put('/task/title/{id}', 'updateTask');
  Route::delete('/task/{id}', 'destroy');
});
 