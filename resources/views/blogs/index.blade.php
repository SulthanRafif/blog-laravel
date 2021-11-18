@extends('dashboard.layouts.main')
@section('title')
POST
@endsection
@section('container')
    @if(session()->has('success'))
        <div class="alert alert-success  mt-3" role="alert">{{ session()->get('success') }}</div>
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>
      <div class="table-responsive col-lg-8">
        <a href="{{ route('blogs.create') }}" class="badge bg-primary text-decoration-none link-light mb-3"><span data-feather="file-plus"></span> CREATE NEW POST</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Categories</th>
              <th scope="col">Date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($blogs as $blog)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $blog->judul }}</td>
              <td>{{ $blog->categories }}</td>
              <td>{{ $blog->created_at->format("d F, Y") }}</td>
              <td>  
                <div>
                    <a href="{{ route('blogs.show', $blog->slug) }}" class="badge bg-info text-decoration-none link-light mb-3"><span data-feather="eye"></span> Lihat Post</a>
                    <a class="badge bg-warning text-decoration-none link-light mb-3" href="{{ route('blogs.edit', $blog->slug) }}"><span data-feather="edit"></span> Edit Post</a>
                       <form action="{{ route('blogs.destroy', $blog->slug) }}" method="post" style="display: inline">
                            @csrf
                            @method('delete')
                            <button class="badge bg-danger text-decoration-none link-light mb-3" type="submit"><span data-feather="x-circle"></span> Delete</button>
                      </form>
                </div>
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection