<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50),
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
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

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:2', 'max:255'],
            'thumbnail' => ['image'],
            'slug' => ['required', 'min:2', 'max:255', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => ['required', 'min:2', 'max:255'],
            'body' => ['required', 'min:2', 'max:4098'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        if (request()->file('thumbnail')) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails', [
                'disk' => 'public',
            ]);
        }

        $post->update($attributes);

        return back()->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post deleted!');
    }
}
