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

    public function store(BlogRequest $request)
    {
        $request->make();

        return redirect()->back();
    }

    public function edit(Blog $blog)
    {
        return view('blogs.edit', ['blog' => $blog]);
    }

    public function update(Request $request, $id)
    {
        Blog::find($id)->update([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'body' => $request->body,
        ]);
        return redirect('blogs');
    }

    public function destroy($id)
    {
        Blog::find($id)->delete();
        return back();
    }
}
