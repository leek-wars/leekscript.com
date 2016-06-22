<?php

class DocumentationController {

	public static function serviceGet() {

		$doc = json_decode(file_get_contents("../documentation.json"));
		return Response::success(['documentation' => $doc]);
	}
}
