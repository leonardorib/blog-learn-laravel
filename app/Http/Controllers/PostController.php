<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {

        return view('posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:2', 'max:255'],
            'thumbnail' => ['required', 'image'],
            'slug' => ['required', 'min:2', 'max:255', Rule::unique('posts', 'slug')],
            'excerpt' => ['required', 'min:2', 'max:255'],
            'body' => ['required', 'min:2', 'max:4098'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails', [
            'disk' => 'public',
        ]);

        Post::create($attributes);

        return redirect('/');
    }
}
