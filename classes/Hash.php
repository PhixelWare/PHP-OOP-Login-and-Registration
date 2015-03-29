<?php
class Hash {
	public static function make($string, $salt = '') {
		return hash('sha1', $string . $salt);
	}
	
	public static function salt($length) {
		return utf8_encode(mcrypt_create_iv($length));		
	}
	
	public static function unique() {
		return self::make(uniqid());
	}
}

// 	issues regarding mcrypt_create_iv
// 	added  utf8_encode to make it acceptable:
// return utf8_encode(mcrypt_create_iv($length));

// adjusted tblusers_session number of characters for hash (50->70) due to hash having 68 characters.