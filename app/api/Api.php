<?php

namespace app\api;

use app\api\controllers\controller\ApiController;

class Api extends ApiController {

	public function init(object $apiModel, $params = [], object $response, string $method) : object {
		parent::init($apiModel, $params, $response, $method);

		return $this;
	}

	public function start() : void {
		$controllerPath = 'app\api\controllers\\' . ucfirst($this->params['params']['controller']) . 'Controller';
		$action = $this->params['params']['action'] . 'Action';

		if (class_exists($controllerPath)) {
			$controller = new $controllerPath();
			$controller->init(
				$this->apiModel->upModel($this->params['params']['controller']),
				$this->params, 
				$this->response, 
				$this->method
			);

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