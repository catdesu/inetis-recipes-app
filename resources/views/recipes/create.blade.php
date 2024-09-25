@extends('layouts.app')

@section('content')

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-light">
                <div class="card-body p-5 text-center">

                    <form class="mb-md-5 mt-md-4" enctype="multipart/form-data" action="{{ route('recipes.create') }}" method="POST">
                        @csrf
                        <h2 class="fw-bold mb-2 text-uppercase mb-5">Create Recipe</h2>

                        <div class="mb-4">
                            <div class="form-floating">
                                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ Request::old('title') }}" placeholder="" required />
                                <label class="form-label" for="title">Title</label>
                            </div>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-floating">
                                <textarea type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="" required>{{ Request::old('description') }}</textarea>
                                <label class="form-label" for="description">Description</label>
                            </div>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/webp" class="form-control @error('image') is-invalid @enderror" placeholder="" />
                            
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <a href="{{ route('recipes') }}" class="btn btn-outline-secondary btn-lg">Cancel</a>
                        <button class="btn btn-outline-primary btn-lg px-5" type="submit">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection