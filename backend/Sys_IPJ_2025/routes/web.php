<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\DomicilioController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('beneficiarios', BeneficiarioController::class)->except(['destroy']);

Route::resource('beneficiarios.domicilio', DomicilioController::class)
    ->shallow()
    ->only(['create', 'store', 'edit', 'update']);
