<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomImgId = fake()->numberBetween(1, 70);
        return [
            'name' => fake()->name(),
            'username' => fake()->unique()->username(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'img' => "https://i.pravatar.cc/150?img={$randomImgId}",
            'password' => static::$password ??= Hash::make('password'),
            // $a = $a ? $a : $b; //ternary operator
            // $a = $a ?: $b; //elvis operator
            // $a ??= $b; //null coalescing operator 

            'remember_token' => Str::random(10),
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

       public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_admin' => true,
        ]);
    }
}
