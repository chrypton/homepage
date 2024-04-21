<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bookmark;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		User::create([
			'name' => 'Admin',
			'username' => 'admin',
			'email' => 'admin@homepage.test',
			'password' => Hash::make('adminpassword'),
		]);

		User::factory(5)->create();

		foreach (User::pluck('id') as $id) {
			for ($j=0; $j < 20; $j++) { 
				Bookmark::factory()->create(['user_id' => $id]);
			}
		}
	}
}
