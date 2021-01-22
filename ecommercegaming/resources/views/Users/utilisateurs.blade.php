@extends('layout')

@section('content')
    @foreach ($utilisateurs as $utilisateur)
        {{ $utilisateur->name }}
        <br>
        {{ $utilisateur->email }}

        <br>
        <br>
    @endforeach
@endsection
