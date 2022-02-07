<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = []; //never mass asign these atributes
    // protected $fillable = ['title', 'excerpt', 'body', 'slug', 'category_id', 'user_id']; //mass asign these atributes

    // protected $with = ['category', 'author']; //Gets posts that include category and author (in a sql query)


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query
                    ->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('body', 'like', '%' . request('search') . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query ->whereHas('category', fn ($query) =>
                    $query->where('slug', $category)));

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query ->whereHas('author', fn ($query) =>
            $query->where('username', $author)));
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class); //eloquent relationship (able to get the category that belongs to a post)
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id'); //Post belongs to a user
    }

//    public function getThumbnail()
//    {
//        if (! $this->attributes[''])
//    }
}


