<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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



Route::middleware('auth')->group(function() {
    Route::get('/principal', [UserController::class, 'telaPrincipal'])->name('tela-principal');  

    Route::middleware('admin')->group(function() {    
      
        Route::get('/admin', [UserController::class, 'telaAdmin'])->name('tela-admin');
        Route::get('/cadastrar', [UserController::class, 'telaCadastrar'])->name('tela-cadastrar');
        Route::get('/editar/{user}', [UserController::class, 'telaEditar'])->name('tela-editar');
        
    
        Route::get('/index',[UserController::class, 'index'])->name('listar');
        Route::post('/store',[UserController::class, 'store'])->name('cadastrar');
        Route::put('/update/{user}', [UserController::class, 'update'])->name('atualizar');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('excluir');
    });
});



Route::get('/', [UserController::class, 'telaLogin'])->name('tela-login');
Route::post('/autenticar-usuario', [UserController::class, 'autenticarUsuario'])->name('autenticar-usuario');


