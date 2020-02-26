<header class="text-center py-3 header">
    <h1>DRHBooks</h1>
</header>
<nav class="navbar navbar-expand-lg navbar-dark p-2 d-flex">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item pr-2">
                <a class="nav-link {{ (request()->is('/') || request()->is('/home')) ? 'active' : '' }}" href="{{url('/')}}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('categoria*')) ? 'active' : '' }}" href="{{url('/categoria/indice')}}">Categorías</a>
            </li>
            @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('usuario/favoritos')) ? 'active' : '' }}" href="{{url('/usuario/favoritos')}}">Favoritos</a>
                </li>
            @endif

            @if(Auth::check() && Auth::user()->role=="admin")
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('admin/panel*')) ? 'active' : '' }}" href="{{url('/admin/panel')}}">Panel de gestión</a>
                </li>
            @endif
        </ul>
    </div>

    <!--Login/Dropdown usuario-->
    <div class="nav-item pr-2">
        @if(!Auth::check())
            <a class="btn btn-primary link-login" href="{{url('/login')}}"><i class="fas fa-user mr-2"></i> Inicia sesión</a>
        @else
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span ><img class="rounded-circle mr-2 img-perfil" src="{{asset('assets/img/img_usuarios/'.Auth::user()->profile_img_file)}}"><p class="mb-0 username d-inline">{{Auth::user()->username}}</p></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item font-weight-bold" href="{{url('/usuario/perfil')}}">Tu perfil</a>
                    <a class="dropdown-item font-weight-bold" href="{{route('logout')}}"
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
