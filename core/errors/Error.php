<?php

namespace core\errors;

class Error {

	private $errors = [];

	public function init($errors = []) {
		$this->errors = $errors;
	}

	public function throwError(int $code) {
		// send response code 
		// include ErrorController
		// debug($this->errors);
		require_once D . '/app/errors/views/' . $code . '.php';
		http_response_code($code);
		exit();
	}
}