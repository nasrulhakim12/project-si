<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ArticleController extends Controller
{
    /**
     * Menampilkan semua artikel.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(5);

        return view('articles.index', compact('articles'));
    }

    /**
     * Export laporan artikel ke PDF.
     */
    public function report()
    {
        $articles = Article::latest()->get();

        $pdf = Pdf::loadView('reports.articles', compact('articles'));

        return $pdf->download('laporan-artikel.pdf');
    }

    /**
     * Menampilkan form tambah artikel.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Menyimpan artikel baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('articles', 'public');
        }

        Article::create($validated);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail artikel.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Menampilkan form edit artikel.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Memperbarui artikel.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            $validated['image'] = $request
                ->file('image')
                ->store('articles', 'public');
        }

        $article->update($validated);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Menghapus artikel.
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}