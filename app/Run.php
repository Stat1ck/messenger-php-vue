<?php

namespace app;

use core\DI\SenderDI;

class Run extends SenderDI {
	
	public function start() {
		$this->router->start($this->di->get('router_config'), $this->di->get('router_types'));
		$this->db->connect($this->di->get('db_config'));

		//debug($this->di);
	}
}