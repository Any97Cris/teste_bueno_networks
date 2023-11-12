@extends('layouts.head')
@include('layouts.navbarAdminCommon')
<div class="mb-5 container">
    {{-- <h2 class="mb-4">Usuários Admin</h2> --}}
    <a href="{{ route('tela-cadastrar') }}" class="btn btn-primary mb-5 btn-sm">
        Cadastrar
    </a>
    <div class="row justify-content-md-center cotainer">
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="text-center">{{ session('message') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-12">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_users as $dados)
                        <tr>
                            <td>{{ $dados->name }}</td>
                            <td>{{ $dados->email }}</td>
                            <td class="text-center d-grid gap-2">
                                <form action="{{ route('excluir', $dados->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{route('tela-editar', $dados->id)}}" class="text-dark btn btn-secondary">Editar</a>
                                    <input type="submit" class="btn btn-danger" value="Excluir" onclick="return confirm('Esta certo que vai excluir esse usuário?');">
                                </form> 
                                    
                                                                   
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@extends('layouts.footer')
