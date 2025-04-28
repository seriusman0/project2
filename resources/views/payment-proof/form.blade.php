@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Search Payment Proof</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('payment-proof.fetch') }}">
        @csrf
        <div class="mb-3">
            <label for="nis" class="form-label">NIS (10-digit Student ID)</label>
            <input type="text" class="form-control" id="nis" name="nis" maxlength="10" pattern="\d{10}" required value="{{ old('nis') }}">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>
@endsection
