<?php

class Items {
	public static $items = [
		'theme' => 'WordPress Theme',
		'plugin' => 'WordPress Plugin',
		'html' => 'HTML Template',
		'react' => 'React Template',
	];
	public static function get() {
		return self::$items;
	}
}