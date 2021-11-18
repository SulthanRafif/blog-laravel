<?php

namespace App\Http\Controllers;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Menampilkan Data Blog yang dimiliki salah satu User yang login
     * 
     * @return view('blogs.index', compact('blogs'));
     */
    public function index()
    {
        $blogs = Blog::where('user_id', Auth::user()->id)
                        ->latest()
                        ->get(); 
                        
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Menampilkan Form untuk mengisi Data Blog yang dimiliki salah satu User yang login
     * 
     * @return view('blogs.create');
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     *  Mengisi Data Blog yang dimiliki salah satu User yang login
     * 
     * @var blog
     */
    public function store(BlogRequest $request, Blog $blog)
    {
        $blog = Auth::user()->hasMany(Blog::class)->create([
            'categories' => $request->categories,
            'judul' => $request->judul,
            'body' => Str::limit(strip_tags($request->body), 200),
            'identifier' => Str::slug(Str::random(31) . $request->id),
            'slug' => Str::slug($request->judul)
        ]);;
        
        return redirect()->route('blogs.index')->with('success', 'Data Blog berhasil di tambahkan');
    }

    /**
     *  Menampilkan salah satu Data Blog yang dimiliki salah satu User yang login
     * 
     * @return view('blogs.show', ['blog' => $blog]);
     */
    public function show(Blog $blog)
    {
        return view('blogs.show', ['blog' => $blog]);
    }

    /**
     *  Menampilkan Form untuk mengupdate salah satu Data Blog yang dimiliki salah satu User yang login
     * 
     * @return view('blogs.edit', ['blog' => $blog]);
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', ['blog' => $blog]);
    }

    /**
     *  Mengubah salah satu Data Blog yang dimiliki salah satu User yang login
     * 
     * @var blog
     */
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

    /**
     *  Menghapus salah satu Data Blog yang dimiliki salah satu User yang login
     * 
     * @var blog
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back();
    }
}
