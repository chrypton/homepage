<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('youtube_channels', function (Blueprint $table) {
			$table->Ulid('id')->primary();
			$table->string('title');
			$table->string('channel_id', 24)->unique();
			$table->string('uploads_id', 24)->unique();
			$table->longText('thumbnail');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('youtube_channels');
	}
};
