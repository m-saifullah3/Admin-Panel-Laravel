@extends('layouts.app.main')

@section('title', 'Login')

@section('content')
    <div class="text-center mt-4">
        <h1 class="h2">Welcome back</h1>
        <p class="lead">
            Sign in to your account to continue
        </p>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="m-sm-4">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control form-control-lg" type="email" name="email"
                            placeholder="Enter your email" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control form-control-lg" type="password" name="password"
                            placeholder="Enter your password" />
                    </div>
                    <div class="text-center mt-3">
                        <a href="index.html" class="btn btn-lg btn-primary">Sign in</a>
                        <!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
                    </div>

                    <div>
                        Want to register? <a href="{{ route('register') }}">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
