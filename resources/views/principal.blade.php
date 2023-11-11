@extends('layouts.head')
<nav class="mb-5 navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">Home</a>
          </li>         
        </ul>
      </div>
    </div>
  </nav>
<div class="container">
    <p>{{session('permissionId')}}</p>
   
    <h2 class="mb-5">Tela Principal</h2>
</div>
@extends('layouts.footer')