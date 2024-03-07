@extends('layout.auth')

@section('content')
<main class="form-signin">
    <form action="index.php?page=login" method="post">
        <img src="assets/img/wiki.png" style="width: 100px; height: 100px" alt="logo">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
            <label for="floatingInput">Email address</label>
        </div>

        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
        </div>

        <button name="login" class="w-100 btn btn-lg btn-secondary" type="submit">Sign in</button>
        <a href="{{ route('register') }}" class="w-100 btn btn-lg btn-dark mt-2" type="button">Sign up</a>
        <a href="{{ route('home') }}" class="w-100 btn btn-lg btn-outline-dark mt-2" type="button">Back</a>
        <p class="mt-5 mb-3 text-muted">&copy; WIKI/2023–2024</p>
    </form>
</main>
@endsection
