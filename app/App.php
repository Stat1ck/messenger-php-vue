<?php

namespace app;

use core\DI\SenderDI;

class App extends SenderDI {
	
	public function start() {
		$this->routerParams['isApi'] ? $this->api->init($this->routerParams)->start() : null;
	}
}