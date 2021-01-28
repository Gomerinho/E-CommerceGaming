@extends('Admin/layoutAdmin')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="container mt-3">@include('flash::message')</div>

                <h1 class="mt-4">Panneau Administrateur</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Admin</li>
                    <li class="breadcrumb-item ">Produits</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6 mx-auto">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-header">
                                <h3>Nombre de Produit</h3>
                            </div>
                            <div class="card-body">
                                <i class="fas fa-shopping-cart" style="font-size: 50px; margin-right:2em"></i>
                                <p class='d-inline' style="font-size: 50px">{{ $productcount }}</p>
                            </div>

                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#Datatable">En savoir plus</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Listes des Produits
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="Datatable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prix</th>
                                        <th>Stock</th>
                                        <th>Description</th>
                                        <th>Code d'activation</th>
                                        <th>Date de creation</th>
                                        <th>Derniere Modification</th>
                                        <th>Modifier</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prix</th>
                                        <th>Stock</th>
                                        <th>Description</th>
                                        <th>Code d'activation</th>
                                        <th>Date de creation</th>
                                        <th>Derniere Modification</th>
                                        <th>Modifier</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ Str::limit($product->desc, 150, $end = '...') }}</td>
                                            <td>{{ $product->activation_code }}</td>
                                            <td>{{ date('d/m/Y', strtotime($product->created_at)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($product->updated_at)) }}</td>
                                            <td><a href="/admin/modifyProduct/{{ $product->id }}"><button type="button"
                                                        class="btn btn-warning d-flex mx-auto"><i
                                                            class="fas fa-edit"></i></button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="/addProduct"><button class="btn btn-success">Ajouter un produit</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; FindMyGame 2020</div>
                </div>
            </div>
        </footer>
    </div>
@endsection
