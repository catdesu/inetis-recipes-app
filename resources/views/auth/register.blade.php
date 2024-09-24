@extends('layouts.app')

@section('content')

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-light">
                <div class="card-body p-5 text-center">

                    <form class="mb-md-5 mt-md-4" action="{{ route('register') }}" method="POST">
                        @csrf
                        <h2 class="fw-bold mb-2 text-uppercase mb-5">Register</h2>

                        <div class="mb-4">
                            <div class="form-floating">
                                <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="{{ Request::old('username') }}" required />
                                <label class="form-label" for="username">Username</label>
                            </div>
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-floating">
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ Request::old('email') }}" required />
                                <label class="form-label" for="email">Email</label>
                            </div>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-floating">
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="" required />
                                <label for="password">Password</label>
                            </div>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-floating">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="" required />
                                <label for="password_confirmation">Confirm Password</label>
                            </div>
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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