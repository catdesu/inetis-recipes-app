@extends('layouts.app')

@section('content')

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            @foreach ($recipes as $recipe)
                <div class="card" style="width: 18rem;">
                    <img src="data:image/webp;base64,{{ $recipe->image }}" class="card-img-top" alt="{{ $recipe->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $recipe->title }}</h5>
                        <p class="card-text">{{ $recipe->description }}</p>
                        <a href="{{ url("recipes/$recipe->id") }}" class="btn btn-primary">See recipe</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection