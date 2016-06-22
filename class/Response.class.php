<?php

class Response {

	public static function success($params = array()) {
		assert(is_array($params), "params is not an array : " . var_export($params, true));
		return (object) array_merge(array('success' => true), $params);
	}

	public static function fail($params = array()) {
		assert(is_array($params), "params is not an array");
		return (object) array_merge(array('success' => false), $params);
	}

	public static function view($view) {
		echo $view;
	}	
}