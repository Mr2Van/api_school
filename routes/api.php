<?php

use App\Http\Controllers\MatiereController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


///////////////////// routes Test //////////////////////////////////////////////////
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function(){
    return 'API';
});



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::apiResource('/notes', controller: NotesController::class);


Route::apiResource('/matieres', controller: MatiereController::class);

