<?php

use core\DI\InitDI;
use app\Run;

try{
	$InitDI = new InitDI();
	$InitDI->init_configs();
	$InitDI->init_services();
	$di = $InitDI->getDI();

	$run = new Run($di);
	$run->start();
} catch(\ErrorException $e) {
	echo $e->getMessage();
}