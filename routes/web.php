<?php

use App\Http\Controllers\Usuariocontroller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UsuarioController::class, 'index']);

Route::get('/', UsuarioController::class . '@index')->name('usuario.index');

Route::get('/create', UsuarioController::class . '@create')->name('usuario.create');

Route::post('/usuario', UsuarioController::class .'@store')->name('usuario.store');

Route::get('/usuario/{post}',UsuarioController::class .'@show')->name('usuario.show');

Route::get('/usuario/{post}/edit',UsuarioController::class .'@edit')->name('usuario.edit');

Route::put('/usuario/{post}', UsuarioController::class .'@update')->name('usuario.update');

Route::delete('/usuario/{post}', UsuarioController::class .'@destroy')->name('usuario.destroy');
