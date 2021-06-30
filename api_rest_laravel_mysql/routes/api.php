<?php

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

$rutaCategoria = 'App\Http\Controllers\categoria_controller';
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categoria/getAll', $rutaCategoria . '@getCategorias');
Route::get('categoria/getId/{id}', $rutaCategoria . '@getcategoriaxId');
Route::post('categoria/add', $rutaCategoria . '@insertCategoria');
Route::put('categoria/update/{id}', $rutaCategoria . '@updateCategoria');
Route::delete('categoria/delete/{id}', $rutaCategoria . '@deleteCategoria');
