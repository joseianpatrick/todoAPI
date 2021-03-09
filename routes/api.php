<?php

use App\Http\Controllers\TodoController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('todo')->group(function(){
    Route::get('/', [TodoController::class,'get']);
    Route::post('/', [TodoController::class,'create']);
    Route::put('/{id}', [TodoController::class,'update']);
    Route::post('/massDelete', [TodoController::class,'massDelete']);
});
