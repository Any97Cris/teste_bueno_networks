@extends('layouts.head')
<div class="container">
<h2 class="mb-5">Editar</h2>
    <div class="row justify-content-md-center cotainer">
        <div class="col-4">
            <form action="{{route('atualizar', $idEditar->id)}}" method="post">
                @method('PUT')
                @csrf
                <!-- Name input -->
                <div class="form-outline mb-4">
                    <input type="text" id="nome" name="name" class="form-control" value="{{ $idEditar->name }}"/>
                    <label class="form-label" for="form2Example1">Nome e Sobrenome</label>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control" value="{{ $idEditar->email }}" />
                    <label class="form-label" for="form2Example1">Email</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control" value="{{ $idEditar->password }}" />
                    <label class="form-label" for="password">Password</label>
                </div>
                

                <!-- Submit button -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-block mb-4">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@extends('layouts.footer')
