<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'Lorem ipsum dolor sit.',
            'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure eum alias, quidem natus error adipisci?'
        ];
    }
}
