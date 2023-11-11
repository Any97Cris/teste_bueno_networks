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

        Route::get('/usuarios/logout', [UserController::class, 'sair'])->name('logout');
      
        Route::get('/admin', [UserController::class, 'telaAdmin'])->name('tela-admin');
        Route::get('/usuarios/cadastrar', [UserController::class, 'telaCadastrar'])->name('tela-cadastrar');
        Route::get('/usuarios/editar/{userId}', [UserController::class, 'telaEditar'])->name('tela-editar');
        
    
        Route::get('/usuarios/index',[UserController::class, 'index'])->name('listar');
        Route::post('/usuarios/store',[UserController::class, 'store'])->name('cadastrar');
        Route::put('/usuarios/update/{userId}', [UserController::class, 'update'])->name('atualizar');
        Route::delete('/usuarios/{userId}', [UserController::class, 'destroy'])->name('excluir');
    });
});

Route::get('/teste', [UserController::class, 'teste'])->name('teste');
Route::patch('/fcm-token', [UserController::class, 'updateToken'])->name('fcmToken');

Route::get('/', [UserController::class, 'telaLogin'])->name('tela-login');
Route::get('/login', [UserController::class, 'telaLogin'])->name('login');
Route::post('/usuarios/autenticar-usuario', [UserController::class, 'autenticarUsuario'])->name('autenticar-usuario');


