<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $blog->title }}
            </h2>
            <a href="{{ route('blogs.index') }}" class="text-blue-600 hover:text-blue-800">
                ← Back to Blogs
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-64 object-cover">
                @endif
                
                <div class="p-8">
                    <div class="text-gray-500 mb-6">
                        Published on {{ $blog->published_at->format('F d, Y') }}
                    </div>

                    <div class="prose max-w-none">
                        {!! $blog->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
