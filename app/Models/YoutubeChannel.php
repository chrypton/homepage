<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
