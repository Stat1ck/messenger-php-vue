<?php

namespace app;

use core\DI\SenderDI;

class App extends SenderDI {
	
	public function start() {
		$routerParams = $this->router->start();

		$routerParams['isApi'] 
			? $this->api
				->init($this->apiModel, $routerParams, $this->response, $this->method)
				->start() 
			: $this->controller
				->init($this->view, $this->model, $this->response, $routerParams, $this->method)
				->start();
	}
}