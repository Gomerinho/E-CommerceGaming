<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">FindMyGame</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home
                        <span class="sr-only">(current)</span>
                    </a>
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
                            <a class="dropdown-item" href="/inscription" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Se connecter</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/inscription">S'inscrire</a>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Se connecter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container">
                <form class='row g-3 needs-validation' action="/connexion" method="post">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name='email' placeholder='Entrez votre email' required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mot de
                            passe</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name='password'
                            placeholder="Entrez mot de passe">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Se connecter">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
