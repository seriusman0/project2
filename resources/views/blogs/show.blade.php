@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <a href="{{ route('blogs.index') }}" class="text-blue-600 hover:text-blue-800 mb-6 inline-block">
            ← Back to Blogs
        </a>

        <article class="bg-white rounded-lg shadow-md overflow-hidden">
            @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-64 object-cover">
            @endif
            
            <div class="p-8">
                <h1 class="text-4xl font-bold mb-4">{{ $blog->title }}</h1>
                
                <div class="text-gray-500 mb-6">
                    Published on {{ $blog->published_at->format('F d, Y') }}
                </div>

                <div class="prose max-w-none">
                    {!! $blog->content !!}
                </div>
            </div>
        </article>
    </div>
</div>
@endsection
