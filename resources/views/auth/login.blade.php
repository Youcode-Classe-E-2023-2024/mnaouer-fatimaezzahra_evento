@extends('layout.auth')

@section('content')
    <main class="form-signin">
        <form action="{{ route('login.store') }}" method="post">
            @csrf

            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if($errors->count())
                <div class="col-md-12">
                    <div class="alert alert-danger text-center">
                        @foreach ($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
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

            <div class="row mb-3">
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <div class="col-6">
                    <a class="btn btn-link" href="{{ route('password.create') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
            </div>

            <button name="login" class="w-100 btn btn-lg btn-secondary" type="submit">Sign in</button>
            <a href="{{ route('register') }}" class="w-100 btn btn-lg btn-dark mt-2" type="button">Sign up</a>
            <a href="{{ route('home') }}" class="w-100 btn btn-lg btn-outline-dark mt-2" type="button">Back</a>
            <p class="mt-5 mb-3 text-muted">&copy; EVENTO - 2024</p>
        </form>
    </main>
@endsection
