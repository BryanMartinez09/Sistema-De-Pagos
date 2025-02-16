<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ArqueoController;

Route::resource('empleados', EmpleadoController::class);
Route::resource('arqueos', ArqueoController::class);


