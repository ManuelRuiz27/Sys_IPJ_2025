<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\DomicilioController;
use App\Http\Controllers\ProgramaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('beneficiarios', BeneficiarioController::class)->except(['destroy']);

Route::get('beneficiarios/{beneficiario}/programas', [BeneficiarioController::class, 'editProgramas'])
    ->name('beneficiarios.programas.edit');
Route::put('beneficiarios/{beneficiario}/programas', [BeneficiarioController::class, 'updateProgramas'])
    ->name('beneficiarios.programas.update');

Route::resource('beneficiarios.domicilio', DomicilioController::class)
    ->shallow()
    ->only(['create', 'store', 'edit', 'update']);

Route::resource('programas', ProgramaController::class);

Route::post('programas/{programa}/beneficiarios/{beneficiario}', [ProgramaController::class, 'toggleBeneficiario'])
    ->name('programas.toggleBeneficiario');
