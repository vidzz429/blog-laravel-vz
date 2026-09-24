<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home', ['title' => 'Home Page']);
    });
    Route::get('/about', function () {
        return view('about', ['title' => 'About', 'nama' => 'Dapit']);
    });

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    Route::get('/posts', function () {
        // $post = Post::with(['author', 'category'])->latest()->get();

        return view('posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->Paginate(9)->withQueryString()]);
    });

    Route::get('/posts/{post:slug}', function (Post $post) {

        // $post = Post::find($slug);
        return view('post', ['title' => 'Single Post', 'post' => $post]);
    });
    Route::get('/contact', function () {
        return view('contact', ['title' => 'Contact']);
    });

    Route::get('/authors/{user:username}', function (User $user) {
        // $posts = $user->posts->load('category', 'author');
        return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
    });

    Route::get('/categories/{category:slug}', function (Category $category) {
        // $posts = $category->posts->load( 'author', 'category');
        return view('posts', ['title' => count($category->posts) .  ' Articles In: ' . $category->name, 'posts' => $category->posts]);
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
