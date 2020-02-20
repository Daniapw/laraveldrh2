<header class="text-center py-3 header">
    <h1>DRH-Books</h1>
</header>
<nav class="navbar navbar-expand-lg navbar-dark p-2 d-flex">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item pr-2">
                <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{url('/')}}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('categoria/indice')) ? 'active' : '' }}" href="{{url('/categoria/indice')}}">Categorías</a>
            </li>

        </ul>
    </div>

    <!--Login/Dropdown usuario-->
    <div class="nav-item pr-2">
        @if(!Auth::check())
            <a class="btn btn-primary link-login" href="{{url('/login')}}"><i class="fas fa-user mr-2"></i> Inicia sesión</a>
        @else
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span ><img class="rounded-circle mr-2 img-perfil" src="{{asset('assets/img/img_usuarios/'.Auth::user()->profile_img_file)}}">{{Auth::user()->username}}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Mi perfil</a>
                    <a class="dropdown-item">Mis libros favoritos</a>
                    <a class="dropdown-item" href="{{route('logout')}}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Cerrar sesión
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>

        @endif
    </div>
</nav>
