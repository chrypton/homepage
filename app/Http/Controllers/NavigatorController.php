<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\NavigatorLink;
use App\Models\YoutubeChannel;
use Illuminate\Support\Facades\Http;

class NavigatorController extends Controller
{
	public function links()
	{
		return NavigatorLink::all();
	}

	public function youtube()
	{
		$filteredVideos = [];
		foreach(auth()->user()->youtubeSubscriptions as $channel){
			$filteredVideos = [...$filteredVideos, ...cache()->remember("youtube_uploads_{$channel['channel_id']}", 600, function () use ($channel) {
				$responseUploads = Http::get('https://www.googleapis.com/youtube/v3/playlistItems', [
					'key' => env('KEY_YOUTUBE'),
					'part' => 'contentDetails',
					'playlistId' => $channel['uploads_id'],
					'maxResults' => 50,
				])->json();
	
				$responseVideos = Http::get('https://www.googleapis.com/youtube/v3/videos', [
					'key' => env('KEY_YOUTUBE'),
					'part' => 'contentDetails,snippet',
					'id' => implode(',', Arr::pluck($responseUploads['items'], 'contentDetails.videoId')),
				])->json();
	
				$formattedVideos = Arr::map($responseVideos['items'], function ($video) use ($channel) {
					return [
						'title' => $video['snippet']['title'],
						'link' => "https://www.youtube.com/watch?v={$video['id']}",
						'embedLink' => "https://www.youtube.com/embed/{$video['id']}?autoplay=1",
						'thumbnail' => end($video['snippet']['thumbnails'])['url'],
						'channelLink' => "https://www.youtube.com/channel/{$video['snippet']['channelId']}",
						'channelTitle' => $video['snippet']['channelTitle'],
						'channelThumbnail' => $channel['thumbnail'],
						'timestamp' => Carbon::create($video['snippet']['publishedAt']),
						'duration' => CarbonInterval::create($video['contentDetails']['duration'])->totalSeconds,
					];
				});
	
				array_multisort(array_column($formattedVideos, 'timestamp'), SORT_DESC, $formattedVideos);
	
				return Arr::where($formattedVideos, function ($video) {
					return $video['timestamp']->greaterThan(Carbon::now()->subWeek());
				});
			})];
		}
	
		array_multisort(array_column($filteredVideos, 'timestamp'), SORT_DESC, $filteredVideos);

		return $filteredVideos;
	}
}
