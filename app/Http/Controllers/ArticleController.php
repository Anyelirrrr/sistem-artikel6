<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN PUBLIK
    |--------------------------------------------------------------------------
    */
    public function publicIndex()
    {
        $articles = Article::latest()->get();
        return view('articles.public', compact('articles'));
    }

    /*
    |--------------------------------------------------------------------------
    | PEMBACA (LOGIN)
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        $search = $request->search;

        $articles = Article::when($search, function ($query, $search) {
            $query->where('judul', 'like', "%{$search}%")
                  ->orWhere('konten', 'like', "%{$search}%");
        })
        ->latest()
        ->get();

        return view('articles.index', compact('articles', 'search'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN (CRUD)
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'  => 'required|string|max:255',
            'jenis'  => 'required|in:ilmiah,populer',
            'konten' => 'required',
            'image'  => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $request->file('image')->store('articles', 'public');

        Article::create([
            'judul'   => $request->judul,
            'jenis'   => $request->jenis,
            'konten'  => $request->konten,
            'image'   => $imagePath,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('articles.index')
            ->with('success', 'Artikel berhasil ditambahkan');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'judul'  => 'required|string|max:255',
            'jenis'  => 'required|in:ilmiah,populer',
            'konten' => 'required',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($article->image);
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('articles.index')
            ->with('success', 'Artikel berhasil diperbarui');
    }

    public function destroy(Article $article)
    {
        Storage::disk('public')->delete($article->image);
        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Artikel berhasil dihapus');
    }
}
