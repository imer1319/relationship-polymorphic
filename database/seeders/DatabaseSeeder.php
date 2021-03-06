<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\Category;
use App\Models\Image;
use App\Models\Tag;
use App\Models\Video;
use App\Models\Post;
use App\Models\User;
use App\Models\Level;
use App\Models\Profile;
use App\Models\Location;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Group::factory()->count(3)->create();
        Level::factory()->create(['name' => 'bronce']);
        Level::factory()->create(['name' => 'plata']);
        Level::factory()->create(['name' => 'oro']);
        
        User::factory()->count(5)->create()->each(function ($user){
            $profile = $user->profile()->save(Profile::factory()->make());
            $profile->location()->save(Location::factory()->make());
            $user->groups()->attach($this->array(rand(1,3)));
            $user->image()->save(Image::factory()->make([
                'url'=> 'http://lorempixel.com/90/90'
            ]));
        });
        Category::factory()->count(4)->create();
        Tag::factory()->count(12)->create();
        Post::factory()->count(40)->create()->each(function ($post){
            $post->image()->save(Image::factory()->make());
            $post->tags()->attach($this->array(rand(1,12)));

            $number_comment = rand(1,6);
            for ($i=0; $i < $number_comment; $i++) { 
                $post->comments()->save(Comment::factory()->make());
            }
        });
        Video::factory()->count(40)->create()->each(function ($video){
            $video->image()->save(Image::factory()->make());
            $video->tags()->attach($this->array(rand(1,12)));

            $number_comment = rand(1,6);
            for ($i=0; $i < $number_comment; $i++) { 
                $video->comments()->save(Comment::factory()->make());
            }
        });
    }

    public function array($max)
    {
        $values = [];
        for ($i=1; $i < $max; $i++) { 
            $values[] = $i; 
        }
        return $values;
    }
}
