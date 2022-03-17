<?php

namespace app\controllers\controller;

use app\controllers\controller\AbstractController;

class Controller extends AbstractController {

	public function init(object $view, object $model, object $response, $params = [], string $method) : object {
		parent::init($view, $model, $response, $params, $method);

		return $this;
	}

	public function start() : void {
		$controllerPath = 'app\controllers\\' . ucfirst($this->params['params']['controller']) . 'Controller';
		$action = $this->params['params']['action'] . 'Action';

		if (class_exists($controllerPath)) {
			$controller = new $controllerPath();
			$controller->init($this->view, $this->model, $this->response, $this->params, $this->method);

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