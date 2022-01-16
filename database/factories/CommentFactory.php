<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Comment::class;
    public function definition()
    {
        return [
            //
            'the_comment' => $this->faker->paragraph(),
            'post_id' => Post::all()->random(1)->first()->id,
            'user_id' => User::all()->random(1)->first()->id,

        ];
    }
}
