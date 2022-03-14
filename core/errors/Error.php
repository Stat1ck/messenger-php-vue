<?php

namespace core\errors;

use app\controllers\ErrorController;

class Error {

	public static function newError($code) {
		new ErrorController($code);
		http_response_code($code);
		exit();
	}
}