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
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore,
                            similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum.
                            Sequi mollitia, necessitatibus quae sint natus.</p>
                        <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore,
                            similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum.
                            Sequi mollitia, necessitatibus quae sint natus.</p>
                        <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore,
                            similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum.
                            Sequi mollitia, necessitatibus quae sint natus.</p>
                        <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                        <hr>
                        <a href="#" class="btn btn-success">Laisser un commentaire</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
