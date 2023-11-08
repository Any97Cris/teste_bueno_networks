@extends('layouts.head')
<div class="container">

    <div class="row justify-content-md-center cotainer">
        <div class="col-4">
            <h2 class="mb-5 mt-5">Editar</h2>
            <form action="{{route('atualizar', $idEditar->id)}}" method="post">
                @method('PUT')
                @csrf
                <!-- Name input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Nome e Sobrenome</label>
                    <input type="text" id="nome" name="name" class="form-control" value="{{ $idEditar->name }}"/>
                    
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $idEditar->email }}" />
                    
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="password">Selecione Permissão</label>
                    <select class="form-control" name="permissionId" id="permissionId">
                        <option value="">Selecione Permissão</option>
                        @foreach ($listarDadosPermission as $item)
                            <option value="{{$item->id}}" {{ !empty($permissionId) && $permissionId == $item->id ? ' selected ' : ''}}> {{$item->name}}</option>
                        @endforeach
                    </select>  
                </div>
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Nova Senha" />
                    
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
