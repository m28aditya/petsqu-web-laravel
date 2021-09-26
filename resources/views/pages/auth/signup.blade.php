@extends('pages.auth.auth')
@section('title')
Sign Up Here
@endsection
@section('content')
<main class="form-signin">
    <form action="/auth/sign-up" method="POST">
        @csrf
        <img class="mb-4" src="/resource/images/pets_logo.jpg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please Sign Up</h1>

        <div class="form-floating mb-2">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="password" placeholder="Name"
                name="name" autofocus value="{{ old('name') }}">
            <label for="password">Name</label>
            @error('name')
            <div class="text-left invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-floating mb-2">
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                placeholder="Username" name="username" value="{{ old('username') }}">
            <label for="username">Username</label>
            @error('username')
            <div class="text-left invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-floating mb-2">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                placeholder="name@example.com" name="email" value="{{ old('email') }}">
            <label for="email">Email address</label>
            @error('email')
            <div class="text-left invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-floating">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                placeholder="Password" name="password">
            <label for="password">Password</label>
            @error('password')
            <div class="text-left invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-floating">
            <input type="password" class="form-control @error('confirmPassword') is-invalid @enderror"
                placeholder="Password" name="confirmPassword">
            <label for="password">Confirm Password</label>
            @error('confirmPassword')
            <div class="text-left invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button class="w-100 btn btn-lg btn-danger" type="submit">Sign Up</button>
    </form>
    <label class="mt-3">Have an account? <a href="/auth/sign-in">Sign In Here</a></label>
</main>
@endsection