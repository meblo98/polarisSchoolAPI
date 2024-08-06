<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('etudiants/{etudiant}', [EtudiantController::class, 'update']);

Route::get("etudiants/archives", [EtudiantController::class, "trashed"])->middleware('auth');
Route::delete('etudiants/{id}/force-delete', [EtudiantController::class, "forceDelete"])->middleware("auth");
Route::post('etudiants/{id}/restore', [EtudiantController::class, "restore"])->middleware("auth");

Route::post("login", [AuthController::class, "login"]);
Route::middleware("auth")->group(
    function () {
        Route::get("logout", [AuthController::class, "logout"]);
        Route::get("refresh", [AuthController::class, "refreshToken"]);
        Route::get('etudiants', [EtudiantController::class, 'index']);
        Route::post('etudiant/ajout', [EtudiantController::class, 'store']);
        Route::get('etudiants/{etudiant}', [EtudiantController::class, 'show']);
        Route::delete('etudiants/{etudiant}', [EtudiantController::class, 'destroy']);
    }
);
