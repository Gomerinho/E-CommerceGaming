@extends('Admin/layoutAdmin')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Modifier un utilisateur</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Admin</li>
                    <li class="breadcrumb-item active">Produit</li>
                    <li class="breadcrumb-item">Modifier un produit</li>
                </ol>
                <div class="container">
                    <form action="/admin/modifyProduct" method="post" class="border border-2 p-4 rounded"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Nom : </label>
                            <input class='form-control' type="text" name="name" placeholder="Entrez le Nom"
                                value="{{ $product->name }}" class='mb-3'>
                        </div>
                        @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                        <div class="form-group">
                            <label for="price">Prix : </label>
                            <input class='form-control' type="number" name="price" placeholder="Entrez le prix"
                                value="{{ $product->price }}" class='mb-3'>
                        </div>
                        @if ($errors->has('price'))
                            <p class="text-danger">{{ $errors->first('price') }}</p>
                        @endif
                        <div class="form-group">

                            <label for="stock">Stock : </label>
                            <input class='form-control' type="number" name="stock" placeholder="Entrez la date de naissance"
                                value="{{ $product->stock }}" class='mb-3'>
                        </div>
                        @if ($errors->has('stock'))
                            <p class="text-danger">{{ $errors->first('stock') }}</p>
                        @endif
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="img_product" value="{{ $product->img_product }}">
                            <label for="desc">Description : </label>
                            <textarea class="form-control rounded-0" name="desc" id="desc" cols="100"
                                rows="10">{{ $product->desc }}</textarea>
                        </div>
                        @if ($errors->has('desc'))
                            <p class="text-danger">{{ $errors->first('desc') }}</p>
                        @endif
                        <div class="form-group">
                            <label for="activation_code">Code Activation : </label>
                            <input type="text" name="activation_code" id="activation_code" class="form-control">
                        </div>
                        @if ($errors->has('activation_code'))
                            <p class="text-danger">{{ $errors->first('activation_code') }}</p>
                        @endif

                        <input type="file" name='file' id="file">
                        <button type='submit' class="btn btn-warning">Modifier
                            le produit</button>
                    </form>
                </div>

            </div>

        </main>
    </div>

@endsection
