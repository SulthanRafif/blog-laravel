<?php

namespace App\Http\Controllers;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Auth::user()->timeline();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(BlogRequest $request)
    {
        $request->make();
        
        return redirect()->route('blogs.index')->with('success', 'Data Blog berhasil di tambahkan');
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', ['blog' => $blog]);
    }

    public function edit(Blog $blog)
    {
        return view('blogs.edit', ['blog' => $blog]);
    }

    public function update(BlogRequest $request, Blog $blog)
    {
       $blog->update([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'body' => Str::limit(strip_tags($request->body), 200),
            'categories' => $request->categories
        ]);
        return redirect()->route('blogs.index')->with('success', 'Data Blog berhasil di edit');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back();
    }
}
