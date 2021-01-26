@extends('layout')

@section('content')

    <div class="container">

        <!-- /.col-lg-3 -->
        <div class="row">
            <div class="col">
                <div class="imgProduct" style="height: 60%">
                    <img class="img-fluid" src=" {{ asset('/storage/image/product/' . $product->img_product) }}"
                        style="height: 100%" alt="">
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $product->name }}</h3>
                        <h4>{{ $product->price }} €</h4>
                        <p class="card-text">
                            {{ \Illuminate\Support\Str::limit($product->desc, 500, $end = '...') }}
                            @if (\Illuminate\Support\Str::length($product->desc) > 500)
                                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop">lire la suite</a>
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">{{ $product->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{ $product->desc }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </p>
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
                            <p>{{ $reviews->star }}&#9733; {{ $reviews->comment }}</p>
                            <small class="text-muted">écrit par {{ $reviews->name }} le
                                {{ date('d/m/Y', strtotime($reviews->created_at)) }}</small>
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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Ajouter un commentaire</button>
                        </form>
                    @endif
                </div>
            </div>

        </div>

    </div>
@endsection
