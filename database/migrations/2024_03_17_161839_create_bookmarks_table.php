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
		Schema::create('bookmarks', function (Blueprint $table) {
			$table->ulid('id')->primary();
			$table->foreignUlid('user_id')->constrained()->onDelete('cascade');
			$table->foreignUlid('parent_id')->nullable();
			$table->boolean('enabled')->default(true);
			$table->boolean('selected')->default(false);
			$table->string('title');
			$table->longText('url')->nullable();
			$table->enum('target', ['_self', '_blank'])->default('_blank');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('bookmarks');
	}
};
