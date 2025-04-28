<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap CSS -->
        <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="{{ asset('assets/fonts/figtree.css') }}" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .sidebar {
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                z-index: 100;
                padding: 48px 0 0;
                box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
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
        <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>
