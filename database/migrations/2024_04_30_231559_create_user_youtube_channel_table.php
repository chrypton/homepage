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
		Schema::create('user_youtube_channel', function (Blueprint $table) {
			$table->foreignUlid('user_id')->index()->constrained()->onDelete('cascade');
			$table->foreignUlid('youtube_channel_id')->index()->constrained()->onDelete('cascade');

			$table->primary(['user_id', 'youtube_channel_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('user_youtube_channel');
	}
};
