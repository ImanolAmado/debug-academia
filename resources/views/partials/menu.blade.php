<div class="row">           
    <div class="col-12">              
        <nav class="navbar navbar-expand-lg navbar-dark"> 
        <div>
            <button id="ham" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#miMenu" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>                    
        <div class="collapse navbar-collapse" id="miMenu" data-bs-theme="dark">                        
            <ul class="navbar-nav"> 
            <li class="nav-item">
                <a class="nav-link" href={{route('login')}}>Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{route('login')}}>Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{route('login')}}>Preguntas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{route('login')}}>Estadísticas</a>
            </li>
            <form method="POST" action="{{ route('logout') }}">
                <li class="nav-item">
                    @csrf
                <a class="nav-link"  :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
                        {{ __('Log Out') }}</a>                    
            </form>
            </li>
            </ul>  
        </div>       
        </nav>
    </div>                 
</div>       