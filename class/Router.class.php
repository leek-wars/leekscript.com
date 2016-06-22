<?php

class Router {

	private static $SERVICES = [
		'code/execute' => ['code', 'execute', 'post', ['code' => 'string']],
		'code/get-random' => ['code', 'get-random', 'get', []],
		'documentation/get' => ['documentation', 'get', 'get', []]
	];

	public static function start() {

		$url = str_replace(Util::$api, '', 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
		$method = strtolower($_SERVER['REQUEST_METHOD']);

		$parts = explode('/', $url, 3);

		if (count($parts) < 2) {
			echo json_encode(Response::success(array(
				'error' => 'too_few_parameters'
			)));
			return;
		}

		$module = $parts[0];
		$function = $parts[1];

		// Search service
		if (!array_key_exists($module . '/' . $function, self::$SERVICES)) {
			echo json_encode(Response::fail(array(
				'error' => 'no_such_service',
				'module' => $module,
				'function' => $function
			)));
			return;
		}

		$service = self::$SERVICES[$module . '/' . $function];

		if ($service[2] != $method) {
			echo json_encode(Response::fail(array(
				'error' => 'wrong_method',
				'module' => $module,
				'function' => $function
			)));
			return;
		}

		if (!self::serviceIsImplemented($service)) {
			echo json_encode(Response::fail(array(
				'error' => 'service_not_implemented',
				'module' => $module,
				'function' => $function
			)));
			return;
		}

		// Service publique ?
		// if (!$service->isPublic() && $_SERVER['HTTP_REFERER'] != $_SERVER['SERVER_NAME']) {
		// 	echo json_encode(Response::fail(['error' => 'service_is_private']));
		// 	return;
		// }

		$functionPHP = 'service' . ucfirst(Util::dashToCamel($function));
		$controller = self::getServiceController($service);
		$classMethod = new ReflectionMethod($controller, $functionPHP);
		$argumentCount = count($classMethod->getParameters());

		// echo "URL : " . $url . '<br>';
		// echo "Module : " . $module . '<br>';
		// echo "Fonction : " . $function . '<br>';
		// echo "Method name : " . $method . '<br>';
		// echo "Controller : " . $controller . '<br>';

		// Vérification des paramètres
		$params = array();

		if ($method == 'post') {

			$params = array();

			$json = (array)json_decode(file_get_contents('php://input'));
			$post = $_POST;
			if (count($json) > count($post)) {
				$post = $json;
			}

			foreach ($service[3] as $parameter => $type) {

				if (array_key_exists($parameter, $post)) {

					$params[$parameter] = $post[$parameter];

				} else if ($type == 'file' && array_key_exists($parameter, $_FILES)) {

					$params[$parameter] = $_FILES[$parameter];

				} else {
					echo json_encode(Response::fail(array(
						'error' => 'missing_parameter',
						'parameter' => $parameter,
						'module' => $module,
						'function' => $function
					)));
					return;
				}
			}
		} else if ($method == 'get') {

			$getParams = count($parts) > 2 ? explode('/', $parts[2]) : array();

			if (count($getParams) != count($service[3])) {
				echo json_encode(Response::fail(array(
					'error' => 'wrong_parameter_count',
					'expected_parameters' => count($service[3]),
					'module' => $module,
					'function' => $function
				)));
				return;
			}

			$i = 0;
			foreach ($service[3] as $p => $parameter) {
				$params[$p] = urldecode($getParams[$i++]);
			}

		} else {

			if (!array_key_exists($parameter, $params)) {
				echo json_encode(Response::fail(array(
					'error' => 'wrong_method',
					'module' => $module,
					'function' => $function
				)));
				return;
			}
		}

		foreach ($service[3] as $parameter => $type) {

			$value = array_key_exists($parameter, $params) ? $params[$parameter] : null;
			$checkedValue = self::checkParameterType($value, $type, $parameter);

			if ($checkedValue === null) {
				echo json_encode(Response::fail(array(
					'error' => 'wrong_parameter_type',
					'parameter' => $parameter,
					'expected_type' => $type,
					'module' => $module,
					'function' => $function
				)));
				return;
			}
			$params[$parameter] = $checkedValue;
		}

		$res = call_user_func_array($controller . '::' . $functionPHP, $params);

		if ($res) echo json_encode($res);
	}

	/*
	 * Regarde si le paramètre (qui est toujours une chaine) satisfait le type requis
	 * par le service et renvoie la valeur dans le bon type (surtout utile pour les booléens !)
	 * Si la valeur ne semble pas bonne, retourne null
	 */
	private static function checkParameterType($value, $requiredType, $name) {

		switch ($requiredType) {
			case 'number': {
				if (is_numeric($value)) return intval($value);
				break;
			}
			case 'boolean': {
				if ($value === true) return true;
				if ($value === false) return false;
				if ($value == 'true' || $value == 'false') return $value == 'true';
				break;
			}
			case 'string':
			case 'array':
			case 'json':
			case 'object': {
				return $value;
			}
			case 'file': {
				if (array_key_exists($name, $_FILES)) {
					return $_FILES[$name];
				}
				return 'no_file';
			}
		}
		return null;
	}

	public static function serviceIsImplemented($service) {

		$controller = self::getServiceController($service);
		$functionPHP = 'service' . ucfirst(Util::dashToCamel($service[1]));

		if (method_exists($controller, $functionPHP) === false) {
			return false;
		}

		$classMethod = new ReflectionMethod($controller, $functionPHP);
		$argumentCount = count($classMethod->getParameters());

		if (count($service[3]) != count($classMethod->getParameters())) {
			return false;
		}

		return true;
	}

	public static function getServiceController($service) {
		return ucfirst(Util::dashToCamel($service[0])) . 'Controller';
	}
}
