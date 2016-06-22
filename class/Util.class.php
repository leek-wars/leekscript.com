<?php

class Util {

	public static $version = 8;

	public static $api; // API url

	public static function init() {
		Util::$api = 'http://' . self::getBaseServerName() . '/api/';
	}

	public static function getBaseServerName() {
		return str_replace('api.', '', $_SERVER['SERVER_NAME']);
	}

	public static function isApi() {
		return Util::startsWith('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'], self::$api);
	}

	/*
	 * Passe un nom de champ de la forme : last_time en lastTime
	 */
	public static function camelize($string) {
		return preg_replace_callback('/(^|_)([a-z])/', function($matches) { return strtoupper($matches[2]); }, $string); 
	}

	/*
	 * Passe un nom de champ de la forme : last-time en lastTime
	 */
	public static function dashToCamel($string) {
		return preg_replace_callback('/(-)([a-z])/', function($matches) { return strtoupper($matches[2]); }, $string); 
	}

	/*
	 * Passe un nom de champ de la forme : lastTime en last_time
	 */
	public static function decamelize($string) {

		preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $string, $matches);
		$ret = $matches[0];
		foreach ($ret as &$match) $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
		return implode('_', $ret);
	}

	public static function startsWith($haystack, $needle) {
	    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
	}

	public static function endWith($haystack, $needle) {
		return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
	}

	public static function formatURLCode($text) {
		return urlencode(preg_replace("/[ '	]/i", "-", strtolower($text)));
	}

	public static function getCookie($key) {
		if (!array_key_exists($key, $_COOKIE)) return null;
		return $_COOKIE[$key];
	}

	public static function issetCookie($key) {
		return isset($_COOKIE[$key]);
	}

	public static function setCookie($key, $value, $time) {
		setCookie($key, $value, time() + $time, '/', $_SERVER['SERVER_NAME'], false, true);
	}

	public static function unsetCookie($key) {
		if (isset($_COOKIE[$key])) {
			unset($_COOKIE[$key]);
			setCookie($key, null, -1, '/', $_SERVER['SERVER_NAME'], false, true);
		}
	}
}