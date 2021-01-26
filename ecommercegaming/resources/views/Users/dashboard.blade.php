@extends('layout')

@section('content')

    <div class="container">
        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label=" breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Profil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{ $user->name }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nom</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    {{ $user->email }}
                                </div>

                                <div class="col text-secondary">
                                    <div class="col text-secondary">

                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modalEmail"
                                            class="btn btn-warning"><i class="fas fa-edit"></i></button>

                                        <div class="modal fade" id="modalEmail" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form action="/email_modification" method="post">
                                                {{ csrf_field() }}
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modifier mon
                                                                adresse mail</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label for="email">Choisir une adresse mail</label>
                                                            <input type="email" name="email" id="email">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Fermer</button>
                                                            <button type="submit" class="btn btn-primary">Confimer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    @if ($errors->has('email'))
                                        <p>{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mot de passe</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    *******
                                </div>
                                <div class="col text-secondary">

                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalPassword"
                                        class="btn btn-warning"><i class="fas fa-edit"></i></button>

                                    <div class="modal fade" id="modalPassword" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="/password_modification" method="post">
                                            {{ csrf_field() }}
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modifier mon
                                                            mot de passe</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label for="password">Nouveau mot de passe</label>
                                                        <input type="password" name="password" id="password">
                                                        <label for="password_confirmation">Confirmation du mot de
                                                            passe</label>
                                                        <input type="password" name="password_confirmation"
                                                            id="password_confirmation">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Fermer</button>
                                                        <button type="submit" class="btn btn-primary">Confimer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @if ($errors->has('password'))
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Date de naissance</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    {{ date('d/m/Y', strtotime($user->birthdate)) }}
                                </div>
                                <div class="col text-secondary">

                                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        class="btn btn-warning"><i class="fas fa-edit"></i></button>

                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="/birthdate" method="post">
                                            {{ csrf_field() }}
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modifier ma
                                                            date
                                                            de naissance</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label for="date">Choisir une date de naissance</label>
                                                        <input type="date" name="date" id="date">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Confimer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <h2 class="page-header text-center text-underline">MES JEUX</h2>
        <section class="my-5">

            <div class="row">

                <div class="row">
                    @foreach ($ventes as $vente)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <div style="height:500px">
                                    <img class="card-img-top" style=" height:100%"
                                        src="storage/image/product/{{ $vente->product->img_product }}" alt="">
                                </div>

                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="product/{{ $vente->product->id }}">{{ $vente->product->name }}</a>
                                    </h4>
                                    <h5>{{ $vente->product->price }} €</h5>
                                    <p class="card-text">
                                        {{ \Illuminate\Support\Str::limit($vente->product->desc, 150, $end = '...') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->


    </div>
    <!-- /.row -->

    </div>
    <!-- /.container -->
    </section>
    </div>



@endsection
