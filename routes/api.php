<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\ProcesoController;
use App\Http\Controllers\TipoDocumentoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post("auth/register",[authController::class,"register"]);
Route::post("auth/login",[authController::class,"login"]); 
Route::middleware(["auth:sanctum"])->group(function () {
    Route::get("/tipoDocumento", [TipoDocumentoController::class,"index"]);
    Route::get("/tipoProceso", [ProcesoController::class,"index"]);
    Route::get("/documento", [DocumentoController::class,"index"]); 
    Route::get("/documento/{id}", [DocumentoController::class,"show"]); 
    Route::post("/documento", [DocumentoController::class,"store"]); 
    Route::put("/documento/{id}", [DocumentoController::class,"update"]); 
    Route::delete("/documento/{id}", [DocumentoController::class,"destroy"]); 
    Route::get("auth/logout",[authController::class,"logout"]); 
});

/* Route::put("/documento", [DocumentoController::class,"index"]);  */