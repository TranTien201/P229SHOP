<?php

class Session
{

	public static function init()
	{
		session_start();
	}

	public static function set($key, $val)
	{
		$_SESSION[$key] = $val;
	}
	public static function setCookie($key, $val)
	{
	}
	public static function get($key)
	{
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		} else {
			return false;
		}
	}
	public static function checkSession()
	{
		self::init();
		if (self::get('login_user') == false || self::get('type') == 0) {
			self::destroy();
			header("Location:" . BASE_URL . "/login/login_form");
		} else {
		}
	}

	public static function destroy()
	{
		session_destroy();
	}

	public static function unset($key)
	{
		unset($_SESSION[$key]);
	}
}
