<?php

use App\Http\Resources\crudResource;
use App\Models\crud;
use App\Http\Controllers\BookController;
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
Route::middleware(['cors'])->group(function () {
    Route::post('/hogehoge', 'Controller@hogehoge');
});

Route::get('/cruds', function() {
    return crudResource::collection(crud::all());
});

Route::get('/crud/{id}', function($id) {
    return new crudResource(crud::findOrFail($id));
});

Route::put('/crud/{id}',[BookController::class,'update']);

Route::delete('/crud/{id}',[BookController::class,'destroy']);

Route::post('/crud',[BookController::class,'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
