<x-app-layout title="Blogs Page">
    <x-container>
           <div class="container">
               <div class="row mb-3">
                <div class="col-md-5">
                    <div class="card">
                            <div class="card-header">Buat Postingan Blog</div>
                            <div class="card-body">
                                <form action="{{ route('blogs.store') }}" method="post">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="judul" class="form-label">Judul Blog</label>
                                        <input type="text" name="judul" id="judul" value="{{ old('judul') }}" class="form-control @error('judul') is-invalid @enderror">
                                        @error('judul')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="body" class="form-label">Isi Blog</label>
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
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <h1>Blogs</h1>
                        @foreach($blogs as $blog)
                            <div class="mb-5">
                                <div>
                                    <img src="https://i.pravatar.cc/150" alt="{{ $blog->user->name }}">
                                </div>
                                <div>
                                    <div class="mb-2">
                                        {{ $blog->user->name }}
                                    </div>
                                    <div class="mb-2">
                                        {{$blog->judul}}
                                    </div>
                                    <div class="mb-2">
                                        {{$blog->body}}
                                    </div>
                                    <div class="">
                                        {{$blog->created_at->format("d F, Y")}}
                                    </div>
                                    @if($blog->user->id == Auth::user()->id)
                                    <div>
                                        <a class="btn btn-primary me-2" href="{{ route('blogs.edit', $blog->id) }}">Edit Post</a>
                                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="post" style="display: inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                        <div class="col-md-5">
                            <h1>Recently follows</h1>
                            @foreach(Auth::user()->follows()->limit(5)->get() as $user)
                            <div class="mb-5">
                                <div>
                                    <img src="https://i.pravatar.cc/150" alt="{{ $blog->user->name }}">
                                </div>
                                <div>
                                    <div class="mb-2">
                                        {{ $user->name }}
                                    </div>
                                    <div class="mb-2">
                                        {{ $user->pivot->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </x-container>
</x-app-layout>

