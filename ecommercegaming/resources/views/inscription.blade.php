@extends('layout')

@section('content')
    <h2 class="page-title text-center font-weight-bold text-uppercase">REJOIDNRE LA COMMUNAUTé DE FINDMYGAME</h2>
    <div class="container border rounded p-3 mb-3 mt-3">

        <form class='row g-3 needs-validation' action="/inscription" method="post">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='email'
                    value="{{ old('email') }}" placeholder='Entrez votre adresse mail' required>
                @if ($errors->has('email'))
                    <p>{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" aria-describedby="name" name='name'
                    value="{{ old('name') }}" placeholder="Entrez votre nom " required>

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

            <button type="submit" class="btn btn-primary">Nous rejoindre</button>

        </form>
    </div>
@endsection
