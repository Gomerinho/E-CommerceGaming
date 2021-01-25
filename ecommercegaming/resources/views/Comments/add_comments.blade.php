@extends('layout')

@section('content')

    <form action="/addReview" method="post" class="form-control">
        {{ csrf_field() }}
        <label for="comment" class="control-label">Commentaire</label>
        <input type="text" name="comment" class="control-input" placeholder="Commentaire">
        <label for="star" class="control-label">Notes</label>
        <input type="number" name="star" class="control-input" placeholder="Notes" max="5" min="1">
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <input type="hidden" name="product_id" value="{{ $id }}">

        <button type="submit" class="btn btn-primary">Ajouter un commentaire</button>
    </form>
@endsection
