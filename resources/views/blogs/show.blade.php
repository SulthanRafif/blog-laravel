@extends('dashboard.layouts.main')
@section('title')
{{ ucfirst(trans($blog->judul)) }}
@endsection
@section('container')
    <div class="container mt-4">
      <div class="row">
        <div class="col-lg-8">
          <!-- Post content-->
          <article>
            <!-- Post header-->
            <header class="mb-2">
              <!-- Post title-->
              <h1 class="fw-bolder mb-1">{{ $blog->judul }}</h1>
              <!-- Post meta content-->
              <div class="text-muted fst-italic mb-2">
                Posted on {{$blog->created_at->format("d F, Y")}} by {{ $blog->user->name }}
              </div>
              <!-- Post categories-->
              <a
                class="badge bg-secondary text-decoration-none link-light" href="#">{{ $blog->categories }}
              </a>
            </header>
            <a href="{{ route('blogs.index')}}" class="badge bg-primary text-decoration-none link-light mb-3"><span data-feather="arrow-left"></span> Back to all my posts</a>
            <a href="{{ route('blogs.edit', $blog->slug) }}" class="badge bg-warning text-decoration-none link-light mb-3"><span data-feather="edit"></span> Edit</a>
            <a href="" class="badge bg-primary text-decoration-none link-light mb-3"><span data-feather="x-circle"></span> Delete</a>
            <!-- Preview image figure-->
            <figure class="mb-4">
              <img
                class="img-fluid rounded"
                src="https://source.unsplash.com/1200x400?{{$blog->categories}}"
                alt="{{$blog->categories}}"
              />
            </figure>
            <!-- Post content-->
            <section class="mb-5">
                <p class="fs-5 mb-4">
                    {{ $blog->body}}
                </p>
                <h2 class="fw-bolder mb-4">
                    I have odd cosmic thoughts every day
                </h2>
                <p class="fs-5 mb-4">
                  Science is an enterprise that should be cherished as an activity
                  of the free human mind. Because it transforms who we are, how we
                  live, and it gives us an understanding of our place in the
                  universe.
                </p>
            </section>
          </article>
        </div>
        <!-- Side widgets-->
      </div>
    </div>
@endsection