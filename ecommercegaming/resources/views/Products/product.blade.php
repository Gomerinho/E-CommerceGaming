@extends('layout')

@section('content')

    <div class="container">

        <!-- /.col-lg-3 -->
        <div class="row">
            <div class="col">
                <div class="imgProduct">
                    <img class="img-fluid" src=" {{ asset('/storage/image/product/' . $product->img_product) }}" alt="">
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $product->name }}</h3>
                        <h4>{{ $product->price }} €</h4>
                        <p class="card-text">{{ $product->desc }}</p>
                        <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                        4.0 stars
                        <button class="btn btn-primary ">Acheter</button>
                    </div>
                </div>
                <div class="card card-outline-secondary my-4">
                    <div class="card-header">
                        Product Reviews
                    </div>

                    @foreach ($review as $reviews)
                        <div class="card-body">
                            <p>{{ $reviews->comment }}</p>
                            <small class="text-muted">écrit par {{ $reviews->name }} le {{ $reviews->created_at }}</small>
                        </div>

                        <hr>

                    @endforeach

                    @if (auth()->check())

                        <form action="/addReview" method="post" class="form-control">
                            {{ csrf_field() }}
                            <label for="comment" class="control-label">Commentaire</label>
                            <input type="text" name="comment" class="control-input" placeholder="Commentaire">
                            <label for="star" class="control-label">Notes</label>
                            <input type="number" name="star" class="control-input" placeholder="Notes" max="5" min="1">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="product_id" value="{{ $id }}">

                            <button type="submit" class="btn btn-primary">Ajouter un commentaire</button>
                        </form>
                    @endif
                </div>
            </div>

        </div>

    </div>
@endsection
