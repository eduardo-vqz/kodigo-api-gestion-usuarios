<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * El modelo correspondiente a este factory.
     *
     * @var class-string<\App\Models\User>
     */
    protected $model = User::class;

    /**
     * Define el estado por defecto del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'              => $this->faker->name(),
            'username'          => $this->faker->unique()->userName(),
            'email'             => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            // Con cast 'password' => 'hashed' en el modelo,
            // Laravel se encarga de hashear este valor.
            'password'          => 'password', // o '123456'
            'role'              => 'user',
            'remember_token'    => Str::random(10),
        ];
    }

    /**
     * Indica que el email del usuario no está verificado.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
