<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = \App\Models\User::pluck('id')->toArray();

        if (empty($userIds)) {
            throw new \Exception('No users found to assign to the team. Please seed the users table first.');
        }

        return [
            'user_id' => $this->faker->randomElement($userIds),
            'uuid' => Str::uuid(),
            'name' => $this->faker->company,
            'slug' => $this->faker->slug,
            'description' => $this->faker->sentence,
            'is_active' => $this->faker->boolean(80),
        ];
    }

    /**
     * Define an inactive state.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}
