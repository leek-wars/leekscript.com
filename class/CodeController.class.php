<?php

class CodeController {

	public static function serviceExecute($code) {

		if (strlen($code) > 10000) {
			return Response::fail(['error' => '10000 bytes max']);
		}

		$file = '../codes/code-' . time() . '-' . rand() . '.ls';

		file_put_contents($file, $code);

		$res = shell_exec("leekscript -f ../codes/$file");

		//unlink($file);

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
