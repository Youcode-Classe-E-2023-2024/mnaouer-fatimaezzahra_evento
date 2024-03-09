@extends('layout.auth')

@section('content')
<main class="form-signin">
    <form action="{{ route('register.store') }}" method="post">
        @csrf

        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
        <div class="form-floating">
            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" required>
            <label for="floatingInput">Email address</label>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-floating">
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="floatingUsername" placeholder="Username" required>
            <label for="floatingUsername">Name</label>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-floating">
            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-floating">
            <input name="password_confirmation" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Confirm Password</label>
        </div>

        <button name="register" class="w-100 btn btn-lg btn-dark" type="submit">Sign up</button>
        <a href="{{ route('login') }}" class="w-100 btn btn-lg btn-secondary mt-2" type="button">Sign in</a>
        <a href="{{ route('home') }}" class="w-100 btn btn-lg btn-outline-dark mt-2" type="button">Back</a>

    </form>

    <p class="mt-5 mb-3 text-muted">&copy; EVENTO - 2024</p>
</main>
@endsection
