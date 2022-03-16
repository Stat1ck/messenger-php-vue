<?php

namespace app;

use core\DI\SenderDI;

class App extends SenderDI {
	
	public function start() {
		$routerParams = $this->router->start();

		$routerParams['isApi'] 
			? $this->api
				->init($routerParams)
				->start() 
			: $this->controller
				->init($routerParams, $this->view)
				->start();
	}
}