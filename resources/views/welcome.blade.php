<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Minimal Template CSS -->
    <link href="{{ asset('assets/template/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/template/css/theme.css') }}" rel="stylesheet" />

    <!-- Fonts -->
    <link href="{{ asset('assets/fonts/figtree.css') }}" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header class="p-3 bg-light border-bottom">
    <div class="container d-flex justify-content-end">
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
        @endauth
    </div>
</header>

<main class="container my-4">
    <div class="row">
        <aside class="col-md-3">
            @include('partials.sidebar')
        </aside>
        <section class="col-md-9">
            @include('partials.payment-proof-form')

            @php
                $blogs = \App\Models\Blog::where('status', 'published')
                    ->orderByDesc('published_at')
                    ->paginate(9);
            @endphp

            @include('partials.blog-section')
        </section>
    </div>
</main>

<footer class="footer-6 unpad--bottom bg--dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <h6 class="type--uppercase">About Us</h6>
                <p>
                    {{ config('app.name', 'Laravel') }} is a robust platform designed with modularity at the core.
                </p>
            </div>
            <div class="col-md-6 col-lg-3">
                <h6 class="type--uppercase">Recent Updates</h6>
                <div class="tweets-feed tweets-feed-2" data-feed-name="mrareweb" data-amount="2"></div>
            </div>
            <div class="col-md-6 col-lg-3">
                <h6 class="type--uppercase">Instagram</h6>
                <div class="instafeed instafeed--gapless" data-user-name="mediumrarethemes" data-amount="6" data-grid="3"></div>
            </div>
            <div class="col-md-6 col-lg-3">
                <h6 class="type--uppercase">Newsletter</h6>
                <form action="//mrare.us8.list-manage.com/subscribe/post?u=77142ece814d3cff52058a51f&amp;id=f300c9cce8" data-success="Thanks for signing up. Please check your inbox for a confirmation email." data-error="Please provide your email address.">
                    <input class="validate-required validate-email" type="text" name="EMAIL" placeholder="Email Address" />
                    <button type="submit" class="btn btn--primary type--uppercase">Subscribe</button>
                    <div style="position: absolute; left: -5000px;" aria-hidden="true">
                        <input type="text" name="b_77142ece814d3cff52058a51f_f300c9cce8" tabindex="-1" value="" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer__lower text-center-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span class="type--fine-print">&copy; <span class="update-year"></span> {{ config('app.name', 'Laravel') }} &mdash; All Rights Reserved</span>
                </div>
                <div class="col-md-6 text-right text-center-xs">
                    <ul class="social-list list-inline">
                        <li><a href="#"><i class="socicon socicon-google icon icon--xs"></i></a></li>
                        <li><a href="#"><i class="socicon socicon-twitter icon icon--xs"></i></a></li>
                        <li><a href="#"><i class="socicon socicon-facebook icon icon--xs"></i></a></li>
                        <li><a href="#"><i class="socicon socicon-instagram icon icon--xs"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/template/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>