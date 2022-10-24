<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\ToDoListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('/signIn/email', [AuthenticationController::class, 'signInWithEmailAndPassword'])->name("auth");
    Route::post('/signOut', [AuthenticationController::class, 'signOut']);
});

Route::get('/ToDoList',[ToDoListController::class,'index']);
Route::get('/ToDoList/{id}',[ToDoListController::class,'show']);
Route::post('/ToDoList',[ToDoListController::class,'store']);
Route::put('/ToDoList/{id}',[ToDoListController::class,'update']);
Route::delete('/ToDoList/{id}',[ToDoListController::class,'destroy']);
