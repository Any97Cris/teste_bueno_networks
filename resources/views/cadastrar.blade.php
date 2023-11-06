@extends('layouts.head')
<div class="container">
    
    <div class="row justify-content-md-center cotainer">
        <h2 class="mb-3 mt-5 text-center">Cadastrar</h2>
        <h5 class="text-center mt-2 mb-3">Preencha os Campos com seus dados:</h5>
        @if(isset($message))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="text-center">{{ $message }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-4">
            <form action="{{ route('cadastrar') }}" method="post">
                @csrf
                <!-- Name input -->
                <div class="form-outline mb-4">
                    <input type="text" id="nome" name="name" class="form-control" />
                    <label class="form-label" for="form2Example1">Nome e Sobrenome</label>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control" />
                    <label class="form-label" for="form2Example1">Email</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control" />
                    <label class="form-label" for="password">Password</label>
                </div>
                

                <!-- Submit button -->
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('tela-login') }}" class="btn btn-primary btn-block mb-4">Login</a>
                    <button type="submit" class="btn btn-success btn-block mb-4">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@extends('layouts.footer')
