<?php

class ViewController {

	private static $privateViews = array('admin', 'admin_services', 'admin_error_manager', 
		'admin_forum', 'admin_servers', 'admin_translation', 'admin_trophies');

	public static function serviceGet($view) {

		if (in_array($view, self::$privateViews)) 
			return json_encode(Response::fail(array('error' => 'private_view')));

		$html = self::get($view);
		if ($html == null) {
			echo json_encode(Response::fail(array('error' => 'no_such_view', 'view' => $view)));
			return;
		}

		return Response::view($html);
	}

	public static function serviceGetPrivate($view, $token) {

		$farmer = FarmerController::getFromToken($token);
		if ($farmer == null) {
			return json_encode(Response::fail(array('error' => 'wrong_token')));
		}
		if (!$farmer->isAdmin()) {
			return json_encode(Response::fail(array('error' => 'not_admin')));
		}

		$html = self::get($view);
		if ($html == null) {
			echo json_encode(Response::fail(array('error' => 'no_such_view', 'view' => $view)));
			return;
		}

		return Response::view($html);
	}

	public static function get($view) {

		$file = 'view/' . $view . '.html';

		if (!file_exists($file)) {
			return "no such file : " . $file;
		}

		$content = file_get_contents('view/' . $view . '.html');
		$content = preg_replace_callback("/\{\{(.+?)\}\}/i", array(__CLASS__, "parseDoubleTag"), $content);

		return $content;
	}

	private static function parseDoubleTag($data) {

		$tag = $data[1];
		
		if ($tag == 'version') {
			return Util::$version;
		}

		return '{{' . $tag . '}}';
	}
}