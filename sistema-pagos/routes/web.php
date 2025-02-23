<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ArqueoController;
use App\Http\Controllers\PagoController;



Route::resource('empleados', EmpleadoController::class);
Route::resource('arqueos', ArqueoController::class);
Route::resource('pagos', PagoController::class);

Route::get('empleados/{empleado}/pagos', [EmpleadoController::class, 'pagos'])->name('empleados.pagos');
Route::post('empleados/{empleado}/pagar', [EmpleadoController::class, 'pagar'])->name('empleados.pagar');
Route::resource('pagos', PagoController::class);
Route::get('pagos/create/{empleado}', [PagoController::class, 'create'])->name('pagos.create');










