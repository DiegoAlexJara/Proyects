<div class="sidebar">
    <h2><a href="{{ route('comics_adminInicio') }}" class="header-link">ADMINISTRADOR</a></h2>
    <ul>
        {{-- <li><a href="{{ route('usuarios.index') }}" class="btn btn-secondary">USUARIOS</a></li> --}}
        <li>
            <a href="{{ route('comics_adminMarcas') }}" class="d-grid gap-2">
                <button class="btn btn-secondary" type="button">MARCAS</button>
            </a>
            <a href="" class="d-grid gap-2">
                <button class="btn btn-secondary" type="button">CATEGORIAS</button>
            </a>
            <a href="" class="d-grid gap-2">
                <button class="btn btn-secondary" type="button">SUB-CATEGORIAS</button>
            </a>
            <a href="{{ route('comics_adminProducts') }}" class="d-grid gap-2">
                <button class="btn btn-secondary" type="button">PRODUCTOS</button>
            </a>
            
        </li>
        
    </ul>
    <div class="sidebar-footer">
        <a href="{{ route('comics_userInicio') }}">
            <button class="back-button">MODO USUARIO</button>
        </a>

        <form action="{{ route('comics_LoginOut') }}" method="POST">
            @csrf
            <button input="submit" class="logout-button">SALIR DE SESSION</button>
        </form>
    </div>
</div>
