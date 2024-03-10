@extends('layout.auth')

@section('content')
    <main class="form-signin">
        <form action="{{ route('password.store') }}" method="post">
            @csrf

            <h1 class="h3 mb-3 fw-normal">Please enter you're email</h1>

            @if(session('statut'))
                <div class="alert alert-success">
                    {{ session('statut') }}
                </div>
            @endif

            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                       id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email address</label>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button name="login" class="w-100 btn btn-lg btn-secondary" type="submit">Send</button>
            <a href="{{ route('home') }}" class="w-100 btn btn-lg btn-outline-dark mt-2" type="button">Back</a>
            <p class="mt-5 mb-3 text-muted">&copy; EVENTO - 2024</p>
        </form>
    </main>
@endsection
