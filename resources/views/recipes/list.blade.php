@extends('layouts.app')

@section('content')

<div class="container h-100">
    <a href="{{ url('recipes/create') }}" class="btn btn-outline-success mt-3 mb-3">New Recipe</a>
    <div class="row d-flex justify-content-center align-items-center h-100">
        @foreach ($recipes as $recipe)
            <div class="col-12 col-md-4 mb-4 d-flex align-items-stretch">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $recipe->image }}" class="card-img-top" alt="{{ $recipe->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $recipe->title }}</h5>
                        <p class="card-text description">{{ $recipe->description }}</p>
                        <a href="{{ url("recipes/$recipe->id") }}" class="btn btn-primary">See recipe</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection