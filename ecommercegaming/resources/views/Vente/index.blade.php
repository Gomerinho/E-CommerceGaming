@extends('layout')

@section('content')

    <div class="container">
        @foreach ($ventes as $vente)
            <div class="card">
                <div class="card-header">
                    <h3>Vente n° {{ $vente->product->name }}</h3>
                </div>
            </div>
        @endforeach
    </div>

@endsection
