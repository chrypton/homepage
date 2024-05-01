<?php

namespace App\Models;

use App\Models\Bookmark;
use App\Models\YoutubeChannel;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
	use HasUlids;
	use HasFactory;

	protected $fillable = [
		'name',
		'username',
		'email',
		'password',
	];

	protected $hidden = [
		'password',
		'remember_token',
		'bookmark_increment',
	];

	protected function casts(): array
	{
		return [
			'email_verified_at' => 'datetime',
			'password' => 'hashed',
		];
	}

	public function bookmarks(): HasMany
	{
		return $this->hasMany(Bookmark::class);
	}

	public function youtubeSubscriptions(): BelongsToMany
	{
		return $this->belongsToMany(YoutubeChannel::class);
	}
}
