<?php

namespace core\helpers;

class Response {
		
	public function resJSON($resArr = []) {
		echo json_encode($resArr);
		exit();
	}
}