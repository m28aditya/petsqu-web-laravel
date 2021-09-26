@extends('pages.auth.auth')
@section('title')
Sign In Here
@endsection
@section('content')
<main class="form-signin">
    <form action="/auth/sign-in" method="POST">
        @csrf
        <img class="mb-4" src="/resource/images/pets_logo.jpg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please Sign In</h1>
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="form-floating mb-2">
            <input type="email" class="form-control" placeholder="name@example.com" autofocus required name="email"
                id="email">
            <label for="email">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <label for="password">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-danger" type="submit">Sign in</button>
    </form>
    <label class="mt-3">Didn't have an account? <a href="/auth/sign-up">Sign Up Here</a></label>
</main>
@endsection