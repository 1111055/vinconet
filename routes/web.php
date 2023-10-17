<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\DeliverynoteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\TransferdadosController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/teste', function(){ 
    dd('aki');
})->name('teste');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


//Utilizadores
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');
Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::post('user', [UserController::class, 'store']);


//Roles
Route::get('role/edit/{id}',                          ['as' => 'role.edit',    'uses' => 'RoleController@edit']); 
Route::put('role/update/{id}',                        ['as' => 'role.update',  'uses' => 'RoleController@update']);
Route::delete('role/destroy/{id}',                    ['as' => 'role.destroy', 'uses' => 'RoleController@destroy']);
Route::delete('role/removerole/{role_id}/{user_id}',  ['as' => 'role.removerole', 'uses' => 'RoleController@removerole']);
Route::get('role/show/{id}',                          ['as' => 'role.show',    'uses' => 'RoleController@show']);
Route::post('role', 'RoleController@store');



Route::get('/role', [RoleController::class, 'index'])->name('role');
Route::get('role/show/{id}', [RoleController::class, 'show'])->name('role.show');


//certificados
Route::get('/certificado', [CertificadoController::class, 'index'])->name('certificado');
Route::post('/certificado', [CertificadoController::class, 'index'])->name('certificado');


//Deliveries
Route::get('/delivery', [DeliverynoteController::class, 'index'])->name('deliverynote');
Route::post('/delivery', [DeliverynoteController::class, 'index'])->name('deliverynote');
Route::get('/delivery/show/{id}', [DeliverynoteController::class, 'show'])->name('deliveryshow');

//Deliveries
Route::get('/item', [ProdutoController::class, 'index'])->name('item');
Route::post('/item', [ProdutoController::class, 'index'])->name('item');

