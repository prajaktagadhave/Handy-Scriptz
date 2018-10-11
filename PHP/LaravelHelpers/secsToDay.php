<?php
namespace App\Helpers;

class secsToDay
{
  static function ConvertSectoDay($seconds)
	{
		$days = floor($seconds / 86400);
		$hours = str_pad(floor($seconds / 3600), 2, "0", STR_PAD_LEFT);
		$minutes = str_pad(floor(($seconds / 60) % 60), 2, "0", STR_PAD_LEFT);
		$seconds = str_pad($seconds % 60, 2, "0", STR_PAD_LEFT);
		return "{$days}d {$hours}:{$minutes}:{$seconds}";
		
	}
}
