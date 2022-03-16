<?php

namespace app\abstracts;

abstract class Controller {
	protected $view;
	protected $params = [];

	public function __construct(object $view, $params = []) {
		$this->view		= $view;
		$this->params	= $params;
	}
}