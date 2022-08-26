<?php

use Carbon\Carbon;

if (!function_exists('format_money')) {
	function format_money($value)
	{
		return number_format($value, 0, ',', '.');
	}
}

if (!function_exists('format_date')) {
	function format_date($value)
	{
		return Carbon::parse($value)->format('d-m-Y');
	}
}
