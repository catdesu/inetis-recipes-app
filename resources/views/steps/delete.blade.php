@extends('layouts.app')

@section('content')

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-light">
                <div class="card-body p-5 text-center">

                    <form class="mb-md-5 mt-md-4" action="{{ url("steps/delete/$step->id") }}" method="POST">
                        @csrf
                        <h2 class="fw-bold mb-2 text-uppercase mb-5">Delete Step</h2>

                        <p>Are you sure you want to delete this step ?</p>

                        <a href="{{ url("recipes/$step->fk_recipes_id") }}" class="btn btn-outline-secondary btn-lg">Cancel</a>
                        <button class="btn btn-outline-danger btn-lg px-5" name="btn_delete_step" type="submit">Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection