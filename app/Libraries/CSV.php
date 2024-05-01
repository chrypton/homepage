<?php

namespace App\Libraries;

use Illuminate\Support\Collection;

class CSV {
	private Collection $headers;
	public Collection $data;

	function __construct(string $filepath)
	{
		$this->data = collect(array_map('str_getcsv', file(base_path("storage/csv/{$filepath}"))));
		$this->headers = collect($this->data->shift());
		
		$this->data->transform(function ($csvRow){
			return $this->headers->combine($csvRow);
		});
	}

	static function open($filepath): Collection
	{
		$csv = new CSV($filepath);
		return $csv->data;
	}
}
