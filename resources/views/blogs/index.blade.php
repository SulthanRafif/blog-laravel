<x-app-layout title="Blogs Page">
    <x-container>
           <div class="container">
           <div class="row">
                <div class="col-md-7">
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
    </x-container>
</x-app-layout>

