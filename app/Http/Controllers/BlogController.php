<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 'published')
            ->orderByDesc('published_at')
            ->paginate(9);

        return view('blogs.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        if ($blog->status !== 'published') {
            abort(404);
        }

        return view('blogs.show', compact('blog'));
    }
}
