@extends('layout')

@section('content')

    <header style="margin-top: -2%">
        <div class="overlay"></div>
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
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
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
