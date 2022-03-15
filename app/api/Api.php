<?php

namespace app\api;

class Api {
	
	private $params = [];

	public function init($params = []) {
		$this->params = $params;

		$this->start();
	}

	private function start() {
		$controllerPath = 'app\api\controllers\\' . ucfirst($this->params['params']['controller']) . 'ApiController';
		$action = $this->params['params']['action'] . 'Action';

		if (class_exists($controllerPath)) {
			$controller = new $controllerPath();

			if (method_exists($controllerPath, $action)) {
				$controller->$action();
			} 
			else {
				// status code 404
			}
		} 
		else {
			// status code 404
		}
		
	}
}