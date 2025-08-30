<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\DomicilioController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\PeriodoManejoController;
use App\Http\Controllers\GrupoManejoController;
use App\Http\Controllers\InscripcionManejoController;
use App\Http\Controllers\TemaNomadaController;
use App\Http\Controllers\ConferenciaNomadaController;
use App\Http\Controllers\ConsultaPsicologicaController;
use App\Http\Controllers\PeriodoEscolarController;
use App\Http\Controllers\BecaController;
use App\Http\Controllers\UsuarioController;

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

Route::resource('periodos', PeriodoManejoController::class);
Route::get('periodos/{periodo}/reporte-sexo', [PeriodoManejoController::class, 'reporteSexo'])
    ->name('periodos.reporte.sexo');

Route::resource('periodos-escolares', PeriodoEscolarController::class)
    ->parameters(['periodos-escolares' => 'periodo']);
Route::resource('becas', BecaController::class);

Route::resource('grupos', GrupoManejoController::class);
Route::get('grupos/{grupo}/reporte-sexo', [GrupoManejoController::class, 'reporteSexo'])
    ->name('grupos.reporte.sexo');

Route::post('inscripciones', [InscripcionManejoController::class, 'store'])
    ->name('inscripciones.store');
Route::delete('inscripciones/{inscripcion}', [InscripcionManejoController::class, 'destroy'])
    ->name('inscripciones.destroy');

Route::resource('consultas-psicologicas', ConsultaPsicologicaController::class)
    ->only(['index', 'create', 'store']);

Route::resource('temas-nomada', TemaNomadaController::class);
Route::resource('conferencias-nomada', ConferenciaNomadaController::class);

Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::post('usuarios/{user}/rol', [UsuarioController::class, 'assignRole'])->name('usuarios.assignRole');
Route::post('usuarios/{user}/restablecer-contrasena', [UsuarioController::class, 'resetPassword'])->name('usuarios.resetPassword');
