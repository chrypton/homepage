<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NavigatorLink extends Model
{
	use HasUlids;
	use HasFactory;

	protected $fillable = [
		'parent_id',
		'enabled',
		'is_route',
		'title',
		'url',
		'target',
	];

	protected function casts(): array
	{
		return [
			'enabled' => 'boolean',
			'is_route' => 'boolean',
		];
	}
}
