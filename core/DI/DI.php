<?php

namespace core\DI;

class DI {
	private $di = [];

	public function set(string $key, $value, bool $flag = false) {
		$this->di[$key] = $value;

		if ($flag) {
			return $this->get($key);
		}
	}

	public function get(string $key) {
		return (!empty($this->di[$key])) ? $this->di[$key] : [];
	}
}