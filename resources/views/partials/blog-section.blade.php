<section class="mb-5 px-3">
  <h5 class="fw-bold text-center mb-4">Blog Terbaru</h5>
  <div class="row g-4">
    @forelse ($blogs as $blog)
      <div class="col-md-6">
        <div class="card shadow-sm h-100">
          <div class="card-body d-flex flex-column">
            <h6 class="card-title">{{ $blog->title }}</h6>
            <p class="card-text flex-grow-1">{{ Str::limit(strip_tags($blog->content), 150) }}</p>
            <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-success mt-auto align-self-start">Read More</a>
          </div>
        </div>
      </div>
    @empty
      <div class="col-12">
        <p class="text-center text-muted">No blog posts available.</p>
      </div>
    @endforelse
  </div>
  
  <div class="mt-4">
    {{ $blogs->links() }}
  </div>
</section>
