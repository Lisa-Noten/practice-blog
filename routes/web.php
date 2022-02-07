<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\ImageController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;
use \Illuminate\Validation\ValidationException;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('home'); //using PostController to make things cleaner

// Route::get('posts/{post}', function ($id) { //post wrapped in {braces} is a wildcard

//     //Find a post by its slug and pass it to a view called "post"

//     return view('post', [
//         'post' => Post::findOrFail($id)
//     ]);
// });//->where('post', '[A-z_\-]+'); //find one or more uppercase letters (post = wildcard)

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

// Route::get('categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'posts' => $category->posts,
//         'categories' => Category::all()
//     ]);
// });

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest'); //middleware allows you to preform logic on certain actions
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');


Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');


Route::post('newsletter', NewsletterController::class);

// Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin');
// Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
// Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin');
// Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin');

// Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin');
// Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');

Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
});

Route::get('storage/app/', [ImageController::class, 'show'])->name('display');
