<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-light">
        <!-- Page Header -->
        <header class="bg-white shadow-sm mb-4">
            <div class="container py-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">Komunitas Belajar dan Rumah Kedua Remaja</h3>
                        <h4 class="fw-bold">Sehat, Positif dan Berprestasi</h4>
                    </div>
                    <div>
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                        @endauth
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <div class="container-fluid">
                <div class="row">
                    @include('partials.sidebar')
                    <div class="col-md-9 col-lg-10">
                        @include('partials.payment-proof-form')

                        @php
                            $blogs = \App\Models\Blog::where('status', 'published')
                                ->orderByDesc('published_at')
                                ->paginate(9);
                        @endphp

                        @include('partials.blog-section')
                    </div>
                </div>
            </div>
        </main>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
