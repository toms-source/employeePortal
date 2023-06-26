<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => fake()->name(),
            // 'email' => fake()->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            //'remember_token' => Str::random(10),
            'email' => $this->faker->unique()->safeEmail(),
            'company_email' => $this->faker->unique()->safeEmail(),
            'password' => $this->faker->password(),
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->firstName(),
            'department' => $this->faker->randomElement(['Human Resources', 'Finance', 'Developer']),
            'role' => $this->faker->randomElement(['admin', 'user']),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'birth_date' => $this->faker->date(),
            'civil_status' => $this->faker->randomElement(['Single', 'Married', 'Divorced', 'Widowed']),
            'position' => $this->faker->jobTitle(),
            'salary_rate' => $this->faker->randomFloat(2, 1000, 5000),
            'status' => $this->faker->randomElement(['Hired', 'Contractual']),
            'start_date' => $this->faker->date(),
         
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
