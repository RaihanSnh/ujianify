<?php

declare(strict_types=1);

namespace App\Helpers;

use function array_map;
use function implode;
use function is_string;
use function str_contains;
use function str_replace;

class CSV{

	public static function create(array $data) : string{
		$ret = '';
		foreach ($data as $row) {
			$shouldEscape = false;
			foreach ($row as $value) {
				if(!is_string($value)) {
					$value = (string) $value;
				}
				if (str_contains($value, ',') || str_contains($value, '"')) {
					$shouldEscape = true;
					break;
				}
			}
			if ($shouldEscape) {
				$escapedRow = array_map(function ($value) {
					return '"' . str_replace('"', '""', $value) . '"';
				}, $row);
				$line = implode(',', $escapedRow);
			} else {
				$line = implode(',', $row);
			}
			$ret .= $line . "\n";
		}
		return $ret;
	}
}
