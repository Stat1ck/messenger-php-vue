<?php

use core\DI\InitDI;
use app\App;

try{
	$InitDI = new InitDI();

	$di = $InitDI
		->init_variables()
		->init_configs()
		->init_services()
		->getDI();

	$app = new App($di);
	$app->start();

} catch(\ErrorException $e) {
	echo $e->getMessage();
}