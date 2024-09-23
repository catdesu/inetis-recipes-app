@extends('layouts.app')

@section('content')

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-lighus: 1rem;">
                <div class="card-body p-5 text-center">

                    <form class="mb-md-5 mt-md-4" action="{{ route('register') }}" method="POST">
                        @csrf
                        <h2 class="fw-bold mb-2 text-uppercase mb-5">Register</h2>

                        <div class="form-floating mb-4">
                            <input type="text" id="username" name="username" class="form-control" placeholder="" />
                            <label class="form-label" for="username">Username</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="email" id="email" name="email" class="form-control" placeholder="" />
                            <label class="form-label" for="email">Email</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" id="password" name="password" class="form-control" placeholder="" />
                            <label for="password">Password</label>
                        </div>
                        
                        <div class="form-floating mb-4">
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="" />
                            <label for="confirm_password">Confirm Password</label>
                        </div>

                        <button class="btn btn-outline-primary btn-lg px-5" type="submit">Register</button>
                    </form>

                    <div>
                        <p class="mb-0">Already have an account ? 
                            <a href="<?= URL::to('/login') ?>" class="text-decoration-none fw-bold">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection