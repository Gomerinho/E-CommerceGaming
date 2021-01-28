@extends('Admin/layoutAdmin')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Modifier un utilisateur</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Admin</li>
                    <li class="breadcrumb-item active">Membres</li>
                    <li class="breadcrumb-item">Modifier un membre</li>
                </ol>
                <div class="container">
                    <form action="/admin/modifyUser" method="post" class="border border-2 p-4 rounded">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Nom : </label>
                            <input class='form-control' type="text" name="name" placeholder="Entrez le Nom"
                                value="{{ $user->name }}" required class='mb-3'>
                        </div>
                        @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                        <div class="form-group">
                            <label for="email">Email : </label>
                            <input class='form-control' type="email" name="email" placeholder="Entrez l'email'"
                                value="{{ $user->email }}" required class='mb-3'>
                        </div>
                        @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                        <div class="form-group">

                            <label for="birthdate">Date de naissance : </label>
                            <input class='form-control' type="date" name="birthdate"
                                placeholder="Entrez la date de naissance" value="{{ $user->birthdate }}" required
                                class='mb-3'>
                        </div>
                        @if ($errors->has('birthdate'))
                            <p class="text-danger">{{ $errors->first('birthdate') }}</p>
                        @endif
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <label for="wallet">Crédits : </label>
                            <input class='form-control' type="number" name="wallet" placeholder="Entrez les crédits"
                                value="{{ $user->wallet }}" required class='mb-3'>
                        </div>
                        @if ($errors->has('wallet'))
                            <p class="text-danger">{{ $errors->first('wallet') }}</p>
                        @endif
                        <div class="form-group">

                            <label for="is_admin">Admin : </label>
                            <select class="form-control" id="is_admin" name="is_admin">
                                @if ($user->is_admin)
                                    <option value="1" selected>Administrateur</option>
                                    <option value="0">Utilisateur</option>
                                @else
                                    <option value="0" selected>Utilisateur</option>
                                    <option value="1">Administrateur</option>
                                @endif
                            </select>
                        </div>
                        @if ($errors->has('is_admin'))
                            <p class="text-danger">{{ $errors->first('id_admin') }}</p>
                        @endif
                        <button type='submit' class="btn btn-warning">Modifier
                            l'utilisateur</button>
                    </form>
                </div>

            </div>

        </main>
    </div>

@endsection
