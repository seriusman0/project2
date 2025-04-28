@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Admin Dashboard</h1>
    <p>Welcome to the Study Center Admin Dashboard.</p>

    <ul>
        <li><a href="#">Manage Users</a></li>
        <li><a href="#">Manage Payment Proofs</a></li>
        <li><a href="#">Manage Blogs</a></li>
        <li><a href="#">Import Data (CSV/Excel)</a></li>
        <li><a href="#">Export Reports</a></li>
        <li><a href="#">System Settings</a></li>
    </ul>
</div>
@endsection
