@extends('layouts.head')
<div class="container">

    <div class="row justify-content-md-center cotainer">       
        <h2 class="mb-3 mt-5 text-center">Cadastrar</h2>
        <h5 class="text-center mt-2 mb-3">Preencha os Campos com seus dados:</h5>
        
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="text-center">{{ session('message') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-4">
            <form action="{{ route('cadastrar') }}" method="post">
                @csrf
                <!-- Name input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Nome e Sobrenome</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nome e Sobrenome" value="{{old('name')}}"/>
        
                    @if($errors->has('name') )
                        <p class="text-danger msg_size">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="example@gmail.com" value="{{old('email')}}"/>
                    
                    @if($errors->has('email') )
                        <p class="text-danger msg_size">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
                
                <!-- Select Options Permissions -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Selecione Tipo Usuário</label>
                    <select class="form-control" name="permissionId" id="permissionId">
                        <option value="">Selecione Permissão</option>
                        @foreach ($listarDadosPermission as $item)
                            <option value="{{$item->id}}" {{ (collect(old('permissionId'))->contains($item->id)) ? 'selected':'' }} > {{$item->name}}</option>
                        @endforeach
                    </select>      
                    @if($errors->has('permissionId') )
                        <p class="text-danger msg_size">
                            {{ $errors->first('permissionId') }}
                        </p>
                    @endif              
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control"/>
                    
                    @if($errors->has('password') )
                        <p class="text-danger msg_size">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
                

                <!-- Buttons -->
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('tela-admin') }}" class="btn btn-primary btn-block mb-4">Tela Admin</a>
                    <button type="submit" class="btn btn-success btn-block mb-4">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@extends('layouts.footer')
