<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
			'email' => 'admin@homepage.test',
			'password' => Hash::make('adminpassword'),
		]);

		User::factory(5)->create();
	}
}
