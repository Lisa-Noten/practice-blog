<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;




class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(AdminStoreRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();
        $validated['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($validated);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(AdminUpdateRequest $request)
    {
        $validated = $request->validated();

        if (isset($validated['thumbnail'])) {
            $validated['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($validated);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post deleted!');
    }
}
