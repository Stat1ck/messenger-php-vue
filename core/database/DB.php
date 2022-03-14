<?php

namespace core\database;

use \PDO;

class DB {
	
	private $config = [];
	private $db;

	public function connect(array $config) {
		$this->config = $config;
		//$this->db = new PDO('mysql:host=' . );
	}
}