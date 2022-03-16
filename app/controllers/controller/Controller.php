<?php

namespace app\controllers\controller;

class Controller {

	private $params = [];
	private $view;

	public function init($params = [], object $view) : object {
		$this->params	= $params;
		$this->view		= $view;

		return $this;
	}

	public function start() : void {
		$controllerPath = 'app\controllers\\' . ucfirst($this->params['params']['controller']) . 'Controller';
		$action = ucfirst($this->params['params']['controller']) . $this->params['params']['action'] . 'Action';

		if (class_exists($controllerPath)) {
			$controller = new $controllerPath($this->view, $this->params);

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