<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ 
            'title'       => $this->faker->jobTitle,
            'salary'      => $this->faker->randomElement([ '$50,000', '$60,000', '$70,000', '$80,000', '$90,000', '$100,000' ]),
            'location'    => $this->faker->city(),
            'schedule'    => $this->faker->randomElement([ 'Full-time', 'Part-time', 'Remote' ]),
            'featured'    => $this->faker->boolean(),
            'url'         => $this->faker->url(),
            'employer_id' => Employer::factory(),
        ];
    }
}
