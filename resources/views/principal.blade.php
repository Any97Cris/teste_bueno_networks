@extends('layouts.head')
@include('layouts.navbarAdminCommon')

<div class="mt-5 container">      
    <h2 class="mb-5 text-center">Tela Principal</h2>
    <h5 class="text-center">Seja Bem-Vindo, {{ Auth::user()->name }}</h5>
    @if(session('permissionId') == 1)
        <h5 class="text-center">Clique na opção <a href="{{ route('tela-admin') }}">Admin</a> para acessar as funcionalidades.</h5>
    @endif
    </div>
@extends('layouts.footer')