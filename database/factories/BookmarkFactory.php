<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bookmark>
 */
class BookmarkFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'user_id' => User::inRandomOrder()->first()->id,
			'parent_id' => function (array $attributes) {
				$ownerBookmarks = User::find($attributes['user_id'])->bookmarks();

				if($ownerBookmarks->count() < 5){
					return null;
				} else {
					return User::find($attributes['user_id'])->bookmarks()->inRandomOrder()->first()->id;
				}
			},
			'enabled' => fake()->boolean(),
			'selected' => fake()->boolean(),
			'title' => fake()->realText(15),
			'url' => fake()->url(),
			'target' => fake()->randomElement(['_self', '_blank']),
		];
	}
}
