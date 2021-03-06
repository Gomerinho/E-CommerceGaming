@extends('layout')

@section('content')

    <header style="margin-top: -2%">
        <div class="overlay">

        </div>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="{{ asset('/storage/video/trailer.mp4') }} " type="video/mp4">
        </video>

        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white">
                    <h1 class="display-3" style="font-weight: 800">FindMyGame</h1>
                    <p class="lead mb-0">Trouvez le jeu qu'il vous faut au meilleur prix</p>
                </div>
            </div>
        </div>
    </header>

    <section class="my-5">
        <div class="container h-100 mb-3">
            <div class="d-flex justify-content-center h-100">
                <form action="/search" method="post">
                    {{ csrf_field() }}
                    <div class="searchbar">
                        <input class="search_input" type="text" name="search" placeholder="Rechercher...">
                        <button type="submit" class="search_icon"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        </body>
        <div class="container">

            <div class="row">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <div style="height:500px">
                                    <img class="card-img-top" style=" height:100%"
                                        src="storage/image/product/{{ $product->img_product }}" alt="">
                                </div>

                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="product/{{ $product->id }}">{{ $product->name }}</a>
                                    </h4>
                                    <h5>{{ $product->price }} €</h5>
                                    <p class="card-text">
                                        {{ \Illuminate\Support\Str::limit($product->desc, 150, $end = '...') }}
                                    </p>
                                </div>
                                @php
                                $rate = DB::table('reviews')
                                ->where('product_id', $product->id)
                                ->avg('star');

                                $rate = round($rate, 1);
                                @endphp

                                @if (!isset($rate) || $rate == 0)
                                    <div class="card-footer">
                                        <small class="text-muted">Aucune note</small>
                                    </div>
                                @else
                                    <div class="card-footer">
                                        <small class="text-muted">{{ $rate }} &#9733;</small>
                                    </div>
                                @endif
                            </div>
                        </div>

                    @endforeach
                    {{ $products->links() }}


                </div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

        </div>
        <!-- /.container -->
    </section>
@endsection
