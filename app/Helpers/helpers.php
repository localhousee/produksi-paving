<?php

if (!function_exists('format_money')) {
	function format_money($value)
	{
		return number_format($value, 0, ',', '.');
	}
}
