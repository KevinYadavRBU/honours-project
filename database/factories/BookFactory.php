<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'author' => fake()->name(),
            'status' => fake()->randomElement(array_keys(Book::STATUSES)),
        ];
    }

    public function toRead(): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => 'to-read',
        ]);
    }

    public function reading(): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => 'reading',
        ]);
    }

    public function finished(): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => 'finished',
        ]);
    }
}
