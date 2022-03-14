<?php

namespace app\controllers;

class ErrorController {

	public function __construct($code) {
		$action = 'Error'.$code.'Action';
		$this->$action();
	}
	
	private function Error404Action() {
		echo '<center><h1>404 - Page Not Found!</h1></center>';
	}
}