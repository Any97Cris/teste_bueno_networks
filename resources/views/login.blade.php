@extends('layouts.head')
<div class="container">

    <div class="row justify-content-md-center cotainer">
        <h2 class="mt-5 mb-3 text-center">Login</h2>
        
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="text-center">{{ session('message') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-4">
            <form action="{{ route('autenticar-usuario') }}" method="post">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="forEmail">Email</label>
                    <input type="email" id="email" name="email" class="form-control" />
                    
                    @if($errors->has('email') )
                        <p class="text-danger msg_size">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="forPassword">Password</label>
                    <input type="password" id="password" name="password" class="form-control" />
                    
                    @if($errors->has('password') )
                        <p class="text-danger msg_size">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>

                <!-- Submit button -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-block mb-4">Acessar</button>
                </div>                
            </form>
            <!-- Register buttons -->
            <div class="text-center">
                <p>Ainda não esta cadastrado? <a href="{{ route('tela-cadastrar') }}">Cadastrar</a></p>
            </div>
        </div>
    </div>
</div>
@extends('layouts.footer')
