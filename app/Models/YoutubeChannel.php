<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class YoutubeChannel extends Model
{
	use HasUlids;
	use HasFactory;

	protected $fillable = [
		'title',
		'channel_id',
		'uploads_id',
		'thumbnail',
	];

	public function subscribers(): BelongsToMany
	{
		return $this->belongsToMany(User::class);
	}
}
