@extends('dashboard.layouts.main')

@section('container')
    @if(session()->has('success'))
        <div class="alert alert-success  mt-3" role="alert">{{ session()->get('success') }}</div>
    @endif
     <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if(session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>
                @endif
                 <div class="mb-2">
                     <h1>
                        Buat Postingan Blog
                    </h1>
                </div>
                    <div class="mb-3">
                        <form action="{{ route('blogs.store') }}" method="post">
                            @csrf
                            <div class="mb-4">
                                <h2><label for="judul" class="form-label">Judul Blog</label></h2>
                                <input type="text" name="judul" id="judul" value="{{ old('judul') }}" class="form-control @error('judul') is-invalid @enderror">
                                @error('judul')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <h2><label for="body" class="form-label">Isi Blog</label></h2>
                                <textarea placeholder="What's is on your mind ?" name="body" id="body" cols="2" rows="2" class="form-control  @error('body') is-invalid @enderror"></textarea>
                                @error('body')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </form>
                    </div>
                <div>
                     <h1>
                        Daftar Blog
                    </h1>
                </div>
                @foreach($blogs as $blog)
                <div class="mb-3">
                    <div>
                        <h2>{{ $blog->judul }}</h2>
                    </div>
                    <div>
                        <p>{{$blog->body}}</p>
                    </div>
                    <div>
                        <p>{{$blog->created_at->format("d F, Y")}}</p>
                    </div>
                    <div>
                        <a class="btn btn-primary me-2" href="{{ route('blogs.edit', $blog->id) }}">Edit Post</a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="post" style="display: inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection