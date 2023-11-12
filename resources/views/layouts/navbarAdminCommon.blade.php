<nav class="mb-5 navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('tela-principal') }} ">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">            
        <ul class="mt-2 navbar-nav">          
            @if(session('permissionId') == 1)
                <li class="nav-item">
                    <a href="{{ route('tela-admin') }}" class="sem_cor_link">Admin</a>
                </li>  
            @endif   
            <li class="mx-3 nav-item text-center">
                {{Auth::user()->name}} <br>
                <a href="{{ route('logout') }}" class="text-center">Sair</a>
            </li>     
        </ul>
        </div>
    </div>
</nav>