<?php

class Database {
	public static $db = null;
	public static function get_db() {
		if ( is_null( self::$db ) ) {
			self::$db = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
		}

		return self::$db;
	}
}
