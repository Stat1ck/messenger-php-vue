<?php

namespace core\DI;

class DI {
	private $di = [];

	public function set(string $key, $value) {
		$this->di[$key] = $value;
	}

	public function get(string $key) {
		return (!empty($this->di[$key])) ? $this->di[$key] : [];
	}
}