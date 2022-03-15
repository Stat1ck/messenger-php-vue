<?php

namespace core\database;

use \PDO;

class DB {
	
	private $config = [];
	private $db;

	public function __construct(array $config) {
		$this->config = $config;

		$this->connect();
	}

	private function connect() : void {
		try {
			$this->db = new PDO('mysql:host=' . $this->config['dbhost'] . ';dbname=' . $this->config['dbname'] . ';', $this->config['dbuser'], $this->config['dbpassword']);
			$this->db->exec('SET NAMES ' . $this->config['dbcharset']);
		} catch (\PDOException $e) {
			echo $e->getMessage();
			exit();
		}
	}

	private function query(string $sql, $params = []) : object {
		$stmt = $this->db->prepare($sql);
			
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				$type = is_int($val) ? PDO::PARAM_INT : PDO::PARAM_STR;
					
				$stmt->bindValue(':' . $key, $val, $type);
			}
		}

		$stmt->execute();

		return $stmt;
	}

	public function all(string $sql, $params = []) : array {
		$result = $this->query($sql, $params);

		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function column(string $sql, $params = []) : string {
		$result = $this->query($sql, $params);

		return $result->fetchColumn();
	}

	public function lastInsertId() : int {
		return $this->db->lastInsertId();
	}
}