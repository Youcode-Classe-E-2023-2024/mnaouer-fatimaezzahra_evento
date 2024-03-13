<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .footer {
            background-color: #333;
            margin-top: 3rem;
            padding: 1rem 0;
            width: 100%;
        }

        .footer-text {
            color: #fff;
            font-size: 1.2rem;
            text-align: center;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    @stack('css')
</head>
<body>

<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="blog-header-logo text-dark" href="{{ route('home') }}">EVENTO</a>
            </div>

            <div class="col-4 text-center">
                <div class="d-none d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-center align-items-center">
                    <form class="form" action="{{ route('title.search') }}" method="POST">
                        @csrf
                        <i class="fa fa-search"></i>
                        <input name="search" id="search-bar" type="text" class="form-control form-input" aria-label="search-bar" placeholder="Search...">
                    </form>
                </div>
            </div>

            <div class="col-4 d-flex justify-content-end align-items-center">
                @role('admin')
                    <a class="btn btn-sm btn-outline-secondary ms-2" href="{{ route('dashboard') }}">Admin</a>
                @endrole

                @auth()
                    @role('organizer|admin')
                    <a class="btn btn-sm btn-dark ms-2" href="{{ route('event.create') }}">Create Event</a>
                    @endrole
                    <a class="btn btn-sm btn-outline-secondary ms-2" href="{{ route('profile.show', 1) }}">Profile</a>
                @endauth

                @guest()
                    <a class="btn btn-sm btn-outline-secondary ms-2" href="{{ route('login') }}">Sign in</a>
                @endguest
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            @foreach($cats as $cat)
                <a class="p-2 link-secondary" href="{{ route('category.search', $cat->name) }}">{{ $cat->name }}</a>
            @endforeach
        </nav>
    </div>
</div>

<main class="py-4">
    @yield('content')
</main>

<footer class="blog-footer">
    <p>EVENTO built for <a href="https://github.com/orgs/Youcode-Classe-E-2023-2024">IT-Titans</a> by <a href="#">@mnaouer</a>.</p>
    <p><a href="#">Back to top</a></p>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@stack('js')
</body>
</html>
