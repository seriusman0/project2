@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Blog Management</h1>

    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mb-3">Add New Blog Post</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Published At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>{{ $blog->title }}</td>
                <td>{{ ucfirst($blog->status) }}</td>
                <td>{{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('d M Y') : '-' }}</td>
                <td>
                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $blogs->links() }}
</div>
@endsection
