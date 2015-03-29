<?php
session_start();

$GLOBALS['config'] = array(
		'mysql' => array(
				'host' => '127.0.0.1',
				'username' => 'root',
				'password' => 'Light1188',
				'db' => 'dbremotetransaction'
		),
		'remember' => array(
				'cookie_name' => 'hash',
				'cookie_expiry' => 604800
		),
		'session' => array(
				'session_name' => 'user',
				'token_name' => 'token'
		)
); 

spl_autoload_register(function ($class){
	require_once 'classes/' . $class . '.php';
});

require_once 'functions/sanitize.php';

if (Cookies::exists(Config::get('remember/cookie_name')) && !Session::exist(Config::get('session/session_name'))) {
	$hash = Cookies::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('tblusers_session', array('hash', '=', $hash));

	if ($hashCheck->count()) {
		$user = new User($hashCheck->first()->user_id);
		$user->login();
	}
}