<?php

use Illuminate\Support\Facades\Route;


Auth::routes(["register" => false, "reset" => false]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(["middleware" => "auth"], function () {
    Route::resource("cursos", "App\Http\Controllers\CursoController");
    Route::resource("actividades", "App\Http\Controllers\ActividadController");
    Route::resource("estudiantes", "App\Http\Controllers\EstudianteController")->except("show");
    Route::get("estudiantes/{estudiante}/qr", "App\Http\Controllers\EstudianteController@generarQR")
        ->name("estudiantes.qr");
    Route::resource("tutores", "App\Http\Controllers\TutorController");
    Route::resource("estudiantes.tutores", "App\Http\Controllers\EstudianteTutorController");
    Route::get('/', function () {
        return view('inicio');
    });
});

Route::get("/estudiantes/{estudiante}", "App\Http\Controllers\EstudianteController@show")
    ->name("estudiantes.show");

