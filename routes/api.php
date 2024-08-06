<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EvaluationController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("etudiants/archives", [EtudiantController::class, "trashed"])->middleware('auth');
Route::delete('etudiants/{id}/force-delete', [EtudiantController::class, "forceDelete"])->middleware("auth");
Route::post('etudiants/{id}/restore', [EtudiantController::class, "restore"])->middleware("auth");
Route::put('note/{evaluation}/modifier', [EvaluationController::class, 'update']);

Route::post("login", [AuthController::class, "login"]);
Route::middleware("auth")->group(
    function () {
        Route::get("logout", [AuthController::class, "logout"]);
        Route::get("refresh", [AuthController::class, "refreshToken"]);
        Route::get('etudiants', [EtudiantController::class, 'index']);
        Route::post('etudiant/ajout', [EtudiantController::class, 'store']);
        Route::get('etudiants/{etudiant}', [EtudiantController::class, 'show']);
        Route::delete('etudiants/{etudiant}', [EtudiantController::class, 'destroy']);
        Route::post('etudiants/{etudiant}', [EtudiantController::class, 'update']);
        Route::post('note/ajout', [EvaluationController::class, 'store']);
        Route::get('note/{evaluation}', [EvaluationController::class, 'show']);
        Route::delete('note/{evaluation}', [EvaluationController::class, 'destroy']);
    }
    
);
