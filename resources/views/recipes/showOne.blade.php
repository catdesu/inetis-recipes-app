@extends('layouts.app')

@section('content')

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-light">
                <div class="m-2 text-end">
                    <a href="{{ url("recipes/edit/$recipe->id") }}" class="btn btn-outline-primary btn-sm rounded-circle me-1" title="Edit Recipe">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <a href="{{ url("recipes/delete/$recipe->id") }}" class="btn btn-outline-danger btn-sm rounded-circle" title="Delete Recipe">
                        <i class="bi bi-x"></i>
                    </a>
                </div>
                <div class="card-body p-3 pt-0 text-center">
                    <h4>{{ $recipe->title }}</h4>
                    <img src="{{ asset($recipe->image) }}" class="img-fluid" alt="{{ $recipe->title }}">
                    <p class="text-start">{{ $recipe->description }}</p>
                </div>
            </div>
            <div class="text-center m-3">
                <a href="{{ url("steps/create/$recipe->id") }}" class="btn btn-success">New Step</a>
            </div>
            @foreach ($steps as $step)
                <div class="card bg-light mt-2">
                    <div class="card-body p-3 text-center">
                        <div class="ms-2 text-end">
                            <a href="{{ url("steps/edit/$step->id") }}" class="btn btn-outline-primary btn-sm rounded-circle me-1" title="Edit Step">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="{{ url("steps/delete/$step->id") }}" class="btn btn-outline-danger btn-sm rounded-circle" title="Delete Step">
                                <i class="bi bi-x"></i>
                            </a>
                        </div>
                        <div class="d-flex align-items-center">
                            <!-- Left side big number -->
                            <div class="display-3 text-primary me-3">
                                {{ $loop->iteration }}
                            </div>
                            <!-- Right side content -->
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-1">{{ $step->title }}</h5>
                                    <small class="{{ is_null($step->prep_time) ? 'd-none' : '' }} text-muted"><i class="bi bi-clock me-1"></i>{{ $step->prep_time }} minutes</small>
                                </div>
                                <p class="mb-0 text-muted text-start">{{ $step->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection