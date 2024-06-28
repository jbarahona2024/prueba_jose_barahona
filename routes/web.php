<?php

use App\Http\Controllers\crudcontroller;
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

//Route::get("/", [crudcontroller::class, "index"])-> name("crud.index");   

 // ruta para registrar usuarios -->

//Route::post("/usuarios", [crudcontroller::class, "create"])-> name("crud.create"); 


Route::get('/', [CrudController::class, 'index']);

Route::get('/', CrudController::class . '@index')->name('usuario.index');

Route::get('/create', CrudController::class . '@create')->name('usuario.create');

Route::post('/usuario', CrudController::class .'@store')->name('usuario.store');

Route::get('/usuario/{post}', CrudController::class .'@show')->name('usuario.show');

Route::get('/usuario/{post}/edit', CrudController::class .'@edit')->name('usuario.edit');

Route::put('/usuario/{post}', CrudController::class .'@update')->name('usuario.update');

Route::delete('/usuario/{post}', CrudController::class .'@destroy')->name('usuario.destroy');
