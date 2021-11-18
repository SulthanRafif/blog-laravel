@extends('dashboard.layouts.main')
@section('title')
CREATE POST
@endsection
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
    </div>
    <div class="col-lg-8">
    <form method="post" action="{{ route('blogs.store') }}">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Blog</label>
            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" value="{{ old('judul') }}">
            @error('judul')
            <div class="text-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="categories" class="form-label">Kategori Blog</label>
            <input type="text" class="form-control @error('categories') is-invalid @enderror" id="categories" name="categories" value="{{ old('categories') }}">
            @error('categories')
            <div class="text-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Isi Blog</label>
            <input id="body" class="@error('judul') is-invalid @enderror" type="hidden" name="body">
            <trix-editor input="body"></trix-editor>
            @error('body')
            <div class="text-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
@endsection