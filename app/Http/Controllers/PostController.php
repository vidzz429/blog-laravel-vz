<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function create(){
        
        return view('create',[
            'title' => 'Buat artikel baru',
            'categories' => Category::all()
        ]);
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'body' => 'required|string'
    ]);

    $validated['title'] = ucfirst($validated['title']);

    // 1. Buat slug dasar dari title
    $slug = Str::slug($request->title);
    $originalSlug = $slug;
    $count = 1;

    // 2. Cek apakah slug sudah ada di database, jika ada tambahkan angka di belakangnya
    while (Post::where('slug', $slug)->exists()) {
        $slug = "{$originalSlug}-{$count}";
        $count++;
    }

    $validated['slug'] = $slug;
    $validated['author_id'] = auth()->id();

    Post::create($validated);

    return redirect('/posts')->with('success', 'Artikel berhasil dibuat');
}
}

