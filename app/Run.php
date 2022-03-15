<?php

namespace app;

use core\DI\SenderDI;

class Run extends SenderDI {
	
	public function start() {
		$this->error->init($this->error_cfg);
		$this->router->init($this->router_cfg, $this->router_types, $this->request_url, $this->error);
		$this->db->init($this->db_cfg);

		$currentUrlParams = $this->di->set('currentUrlParams', $this->router->getCurrentUrlParams(), true);

		$currentUrlParams['isApi'] ? $this->api->init($currentUrlParams) : 'nio';
	}
}