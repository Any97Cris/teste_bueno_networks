<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'telaLogin'])->name('tela-login');
Route::get('/principal', [UserController::class, 'telaPrincipal'])->name('tela-principal');
Route::get('/admin', [UserController::class, 'telaAdmin'])->name('tela-admin');
Route::get('/cadastrar', [UserController::class, 'telaCadastrar'])->name('tela-cadastrar');
Route::get('/editar', [UserController::class, 'telaEditar'])->name('tela-editar');