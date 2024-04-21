<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bookmark extends Model
{
	use HasUlids;
	use HasFactory;

	protected $fillable = [
		'user_id',
		'parent_id',
		'enabled',
		'selected',
		'title',
		'url',
		'target',
	];

	protected function casts(): array
	{
		return [
			'enabled' => 'boolean',
			'selected' => 'boolean',
		];
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function parent(): BelongsTo
	{
		return $this->belongsTo(Bookmark::class, 'parent_id');
	}

	public function children(): HasMany
	{
		return $this->hasMany(Bookmark::class, 'parent_id');
	}
}
