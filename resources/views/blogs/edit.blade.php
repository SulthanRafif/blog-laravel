<x-app-layout title="Edit Post">
    <div class="container">
         <div class="card">
            <div class="card-header">Buat Postingan Blog</div>
                <div class="card-body">
                    <form action="{{ route('blogs.update', $blog->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-4">
                            <label for="judul" class="form-label">Judul Blog</label>
                            <input type="text" name="judul" id="judul" value="{{ $blog->judul }}" class="form-control @error('judul') is-invalid @enderror">
                                @error('judul')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="body" class="form-label">Isi Blog</label>
                                <textarea placeholder="What's is on your mind ?" name="body" id="body" cols="2" rows="2" class="form-control  @error('body') is-invalid @enderror">{{ $blog->body }}</textarea>
                                @error('body')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        <button type="submit" class="btn btn-primary">Edit Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>