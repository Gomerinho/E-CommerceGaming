@extends ('layout')

@section('content')
    <div class="container">
        <form action="/addProduct" method="post" enctype="multipart/form-data" class="mt-5">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="name" class="form-label">Nom du jeu</label>
                <input type="text" name="name" class="form-control w-4">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Description du jeu</label>
                <textarea name="desc" id="desc" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <label for="price" class="form-label">Prix du jeu</label>
            <div class="input-group mb-3 w-25">
                <input type="number" class="form-control w-3" aria-label="Prix du jeu en euros" name="price">
                <span class="input-group-text">€</span>
            </div>
            <div class="mb-3 w-25">
                <label for="stock" class="form-label">Stock du jeu</label>
                <input type="number" class="form-control w-3" name="stock">
            </div>

            <div class="mb-3 w-25">
                <label for="file" class="form-label">Image du jeu</label>
                <input class="form-control" type="file" id="file" name="file">
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary mb-5 mt-3">Ajouter un jeu</button>
            </div>
        </form>
    </div>

    @cloudinaryJS
@endsection
