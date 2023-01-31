<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;



class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel, perspiciatis.'
        ];
    }
}
