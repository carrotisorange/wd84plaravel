<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'course' => $this->faker->word,
            'schedule' => rand(8,12).'-'.rand(1,7).'/'.Arr::random(['MWF','TTHS']),
            'is_active_flag' => rand(0,1),
        ];
    }
}
