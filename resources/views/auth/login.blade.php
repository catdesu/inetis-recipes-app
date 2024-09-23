@extends('layouts.app')

@section('content')

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-lighus: 1rem;">
                <div class="card-body p-5 text-center">

                    <form class="mb-md-5 mt-md-4" action="{{ route('login') }}" method="POST">
                        @csrf
                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                        <p class="mb-5">Please enter your login and password!</p>

                        <div class="form-floating mb-4">
                            <input type="email" id="email" name="email" class="form-control" placeholder="" />
                            <label class="form-label" for="email">Email</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" id="password" name="password" class="form-control" placeholder="" />
                            <label for="password">Password</label>
                        </div>

                        <button class="btn btn-outline-primary btn-lg px-5" type="submit">Login</button>
                    </form>

                    <div>
                        <p class="mb-0">Don't have an account? 
                            <a href="<?= URL::to('/register') ?>" class="text-decoration-none fw-bold">Sign Up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection