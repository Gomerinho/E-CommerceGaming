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

                            {!! \Illuminate\Support\Str::limit(nl2br($product->desc), 1000, $end = '...') !!}
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
                                                {!! nl2br(e($product->desc)) !!}
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
                        <div class="d-flex align-items-center justify-content-between small">
                            <div>
                                @if (isset($rate) && $rate != 0)
                                    @if ($rate >= 1 && $rate < 2)
                                        <span class="fa fa-star checked" style="color: gold"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    @endif
                                    @if ($rate >= 2 && $rate < 3)
                                        <span class="fa fa-star checked" style="color: gold"></span>
                                        <span class="fa fa-star checked" style="color: gold"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    @endif
                                    @if ($rate >= 3 && $rate < 4)
                                        <span class="fa fa-star checked" style="color: gold"></span>
                                        <span class="fa fa-star checked" style="color: gold"></span>
                                        <span class="fa fa-star checked" style="color: gold"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    @endif
                                    @if ($rate >= 4 && $rate < 5)
                                        <span class="fa fa-star checked" style="color: gold"></span>
                                        <span class="fa fa-star checked" style="color: gold"></span>
                                        <span class="fa fa-star checked" style="color: gold"></span>
                                        <span class="fa fa-star checked" style="color: gold"></span>
                                        <span class="fa fa-star"></span>

                                    @endif

                                    @if ($rate == 5)
                                        <span class="fa fa-star checked" style="color: gold"></span>
                                        <span class="fa fa-star checked" style="color: gold"></span>
                                        <span class="fa fa-star checked" style="color: gold"></span>
                                        <span class="fa fa-star checked" style="color: gold"></span>
                                        <span class="fa fa-star checked" style="color: gold"></span>
                                    @endif
                                    {{ $rate }}
                                @else
                                    <p>Aucune note</p>
                                @endif
                            </div>
                            <form action="/vente" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <button class="btn btn-primary" type="submit">Acheter</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card card-outline-secondary my-4">
                    <div class="card-header">
                        Avis sur le jeu
                    </div>

                    @foreach ($review as $reviews)
                        <div class="card-body m-3 border">
                            <p>{{ $reviews->comment }} : {{ $reviews->star }}<span style="color: gold">&#9733;</span></p>
                            <small class="text-muted">écrit par {{ $reviews->name }} le
                                {{ date('d/m/Y', strtotime($reviews->created_at)) }}</small>
                        </div>
                    @endforeach

                    <div class='card-footer'>
                        @if (auth()->check())

                            <form action="/addReview" method="post">
                                {{ csrf_field() }}

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#commentModal">
                                    Commenter le jeu
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ajouter un Commentaire</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">

                                                    <label for="comment" class="control-label">Commentaire</label>
                                                    <input type="text" name="comment" class="form-control"
                                                        placeholder="Commentaire">
                                                </div>
                                                <div class="form-group">
                                                    <label for="star" class="control-label">Notes</label>
                                                    <input type="number" name="star" class="form-control"
                                                        placeholder="Notes" max="5" min="1">
                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                    <input type="hidden" name="product_id" value="{{ $id }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-primary">Ajouter un
                                                    commentaire</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
