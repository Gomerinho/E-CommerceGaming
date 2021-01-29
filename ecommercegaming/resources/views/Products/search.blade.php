@extends('layout')

@section('content')
    <section class="my-5">
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
