@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Blog Posts</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($blogs as $blog)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2">{{ $blog->title }}</h2>
                    <p class="text-gray-600 mb-4">
                        {{ Str::limit($blog->content, 150) }}
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">
                            {{ $blog->published_at->format('M d, Y') }}
                        </span>
                        <a href="{{ route('blogs.show', $blog->id) }}" class="text-blue-600 hover:text-blue-800">
                            Read More →
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $blogs->links() }}
    </div>
</div>
@endsection
