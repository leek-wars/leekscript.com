<?php

class CodeController {

	public static function serviceExecute($code) {

		$res = shell_exec('leekscript -e "' . self::escape($code) . '" "{}"');

		return Response::success(['result' => $res]);
	}

	private static function escape($code) {
		return str_replace('"', '\\"', $code);
	}

	public static function serviceGetRandom() {

		$codes = explode("---", file_get_contents("../codes.txt"));
		$c = rand(0, count($codes) - 1);
		$code = trim($codes[$c]);

		return Response::success(['code' => $code]);
	}
}
