<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style='margin-bottom: 5%'>
    <div class="container">
        <a class="navbar-brand" href="/">FindMyGame</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        @if (auth()->check())
                            <a class="dropdown-item" href="/dashboard">Profil</a>
                            @if (auth()->user()->is_admin)
                                <a href="/admin" class="dropdown-item">Panneau Admin</a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/signout">Se deconnecter</a>
                        @endif
                        @if (auth()->guest())
                            <a class="dropdown-item" href="/inscription">Se connecter</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/inscription">S'inscrire</a>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
