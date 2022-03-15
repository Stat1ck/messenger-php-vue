<?php

namespace app\api;

class Api {
	
	private $params = [];

	public function init($params = []) : object {
		$this->params = $params;

		return $this;
	}

	public function start() : void {
		$controllerPath = 'app\api\controllers\\' . ucfirst($this->params['params']['controller']) . 'ApiController';
		$action = $this->params['params']['action'] . ucfirst($this->params['params']['controller']) . 'Action';

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