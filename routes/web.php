<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class, 'showToday']);

Route::post('/todo/create', [TodoController::class, 'create']);

Route::post('/todo/done/{Todo}', [TodoController::class, 'done']);
