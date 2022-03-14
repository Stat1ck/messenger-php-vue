<?php

namespace core\database;

use \PDO;

class DB {
	
	private $config = [];
	private $db;

	public function init(array $config) : void {
		$this->config = $config;
	}

	//$this->db = new PDO('mysql:host=' . );
}