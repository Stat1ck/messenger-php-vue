<?php

namespace app;

use core\DI\SenderDI;

class Run extends SenderDI {
	
	public function start() {
		$this->router->init($this->router_cfg, $this->router_types, $this->request_url);
		$this->db->init($this->db_cfg);

		$this->di->set('currentUrlParams', $this->router->getCurrentUrlParams());

		//debug($this->di);
	}
}