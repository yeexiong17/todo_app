<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class, 'showToday']);

Route::get('/week', [TodoController::class, 'showWeek']);

Route::get('/month', [TodoController::class, 'showMonth']);

Route::get('/calendar', [TodoController::class, 'navigateMonth']);

Route::post('/todo/create', [TodoController::class, 'create']);

Route::put('/todo/done/{todo}', [TodoController::class, 'updateDone']);

Route::put('/todo/undone/{todo}', [TodoController::class, 'updateUndone']);

Route::delete('/todo/delete/{todo}', [TodoController::class, 'delete']);

Route::put('/todo/edit/{todo}', [TodoController::class, 'updateTodo']);
