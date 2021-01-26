@extends('layout')

@section('content')

    <div class="container" style="margin-top: 5%">
        <form class='row g-3 needs-validation' action="/inscription" method="post">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='email'
                    value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <p>{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" aria-describedby="name" name='name'
                    value="{{ old('name') }}" required>

            </div>
            <div class="mb-3">
                <label for="birthdate" class="form-label">Date de naissance : </label>
                <input type="date" class="form-control" max="2004-12-31" id="date" aria-describedby="date" name='birthdate'
                    value="{{ old('date') }}" required>

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name='password'
                    placeholder="mot de passe">
                @if ($errors->has('password'))
                    <p>{{ $errors->first('password') }}</p>
                @endif
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Verification mot de passe</label>
                <input type="password" class="form-control" id="password_confirmation" name='password_confirmation'
                    placeholder="mot de passe">
                @if ($errors->has('password_confirmation'))
                    <p>{{ $errors->first('password_confirmation') }}</p>
                @endif
            </div>
            <input type="submit" class="btn btn-primary" value="valider">

        </form>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Se connecter
    </button>

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
                                name='email' required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name='password'
                                placeholder="mot de passe">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Se connecter">

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Connexion</button>
                </div>
            </div>
        </div>
    </div>
@endsection
