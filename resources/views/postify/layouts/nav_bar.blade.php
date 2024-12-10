<nav class="navbar navbar-expand-lg bg-body-tertiary" 
    style="background-color: rgba(255, 255, 255, 0) !important; color: white !important">
    <div class="container-fluid" >
        <a style="color: white !important" class="navbar-brand" href="{{ route('postify_user') }}">
            <img src="https://png.pngtree.com/png-clipart/20230330/original/pngtree-sticky-notes-png-image_9011267.png"
                 alt="" style="height: 30px; width: 30px; color: white !important">{{ Auth::user()->name }}</a>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('postify_Inicio') }}" style="color: white !important">INICIO</a>
                </li>
            </ul>
        </div>
        <div><a href="{{ route('postify_search') }}" class="dropdown-item">Buscar<img src="{{ asset('img/postify/Lupa.png') }}" alt="" style="height: 30px; width: 30px; margin: 0 30px 0 2px"></a></div>
        <div class="btn-group dropstart" role="group">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Opciones
            </a>
            <ul class="dropdown-menu">
                
                <li>
                    <form action="{{ route('postify_LoginOut') }}" method="POST" style="margin: 10px">
                        @csrf
                        <button class="dropdown-item" type="submit">Salir</button>
                    </form>
                </li>
            </ul>
        </div>

    </div>
</nav>
