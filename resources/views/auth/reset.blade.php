@extends('layout.auth')

@section('content')
    <main class="form-signin">
        <form action="{{ route('password.update') }}" method="post">
            @csrf

            <h1 class="h3 mb-3 fw-normal">Please enter new password</h1>

            @if(session('statut'))
                <div class="alert alert-success">
                    {{ session('statut') }}
                </div>
            @endif

            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                       id="floatingPassword" placeholder="Password" required>
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

            <button name="login" class="w-100 btn btn-lg btn-secondary" type="submit">Send Email</button>
            <a href="{{ route('home') }}" class="w-100 btn btn-lg btn-outline-dark mt-2" type="button">Back</a>
            <p class="mt-5 mb-3 text-muted">&copy; EVENTO - 2024</p>
        </form>
    </main>
@endsection
