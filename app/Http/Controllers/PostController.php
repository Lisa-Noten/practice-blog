<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
// use vendor\symfony\http-foundation\Response;
use App\Http\Middleware\MustBeAdministrator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {   
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']) //Changes multiple queries to one
            )->paginate(3)->withQueryString() //with querystring to add search query to pagination
        ]);

    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    protected function getPosts()
    {
        return Post::latest()->filter()->get();
            
    }
}