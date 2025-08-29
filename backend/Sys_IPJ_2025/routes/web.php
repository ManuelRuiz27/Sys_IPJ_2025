<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeneficiarioController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('beneficiarios', BeneficiarioController::class)->except(['destroy']);
