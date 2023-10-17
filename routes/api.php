<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TranferdadosController;


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


/*Route::post('deliverynote', [TranferdadosController::class,'deliverynotepost']);

Route::post('deliverynote', [TranferdadosController::class, 'deliverynotepost'])->name('item');

*/

Route::post('deliverynote', [TranferdadosController::class, 'deliverynotepost']);

Route::post('produto', [TranferdadosController::class, 'produtopost']);

Route::post('certificado', [TranferdadosController::class, 'certificadopost']);

Route::post('userp', [TranferdadosController::class, 'userspost']);