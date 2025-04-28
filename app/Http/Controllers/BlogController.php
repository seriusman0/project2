<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 'published')
            ->orderByDesc('published_at')
            ->take(5)
            ->get();

        return view('blogs.index', compact('blogs'));
    }
}
