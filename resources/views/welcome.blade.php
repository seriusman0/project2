@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
@include('partials.sidebar')

    @include('partials.payment-proof-form')

    @php
        use App\Http\Controllers\BlogController;
        $blogs = app(BlogController::class)->index()->getData()['blogs'] ?? collect();
    @endphp

    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="pt-3 pb-2 mb-3 border-bottom text-center">
        <h3 class="fw-bold">Komunitas Belajar dan Rumah Kedua Remaja</h3>
        <h4 class="fw-bold">Sehat, Positif dan Berprestasi</h4>
    @include('partials.blog-section')

    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="pt-3 pb-2 mb-3 border-bottom d-flex justify-content-between align-items-center">
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
