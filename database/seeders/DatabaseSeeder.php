<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder //Seeding is for testing purposes only
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // Post::truncate();
        // Category::truncate();
        // Comment::truncate();
        
        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);

        // $family = Category::create([
        //     'name' => 'Family',
        //     'slug' => 'family'
        // ]);

        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);
        
        // Post::create([
        //     'category_id' => $family->id,
        //     'user_id' => $user->id,
        //     'title' => 'My Family Post',
        //     'slug' => 'my-first-post',
        //     'excerpt' => 'Lorem ipsum dolar sit amet',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec lacinia massa. Cras quam purus, ullamcorper vitae ligula et, tristique tincidunt metus. Sed at neque et urna mattis porta. Sed mollis augue in enim elementum fringilla. Donec eget mi rutrum nibh efficitur porta. Morbi condimentum, dui et laoreet vehicula, libero ipsum laoreet mi, eget pulvinar dolor mi in mauris.</p>'
        // ]);

        // Post::create([
        //     'category_id' => $work->id,
        //     'user_id' => $user->id,
        //     'title' => 'My Work Post',
        //     'slug' => 'my-work-post',
        //     'excerpt' => 'Lorem ipsum dolar sit amet',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec lacinia massa. Cras quam purus, ullamcorper vitae ligula et, tristique tincidunt metus. Sed at neque et urna mattis porta. Sed mollis augue in enim elementum fringilla. Donec eget mi rutrum nibh efficitur porta. Morbi condimentum, dui et laoreet vehicula, libero ipsum laoreet mi, eget pulvinar dolor mi in mauris.</p>'
        // ]);
    }
}
