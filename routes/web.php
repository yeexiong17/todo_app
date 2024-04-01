<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('today');
});

Route::post('/todo/create', [TodoController::class, 'create']);
