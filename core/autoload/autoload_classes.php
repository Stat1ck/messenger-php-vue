<?php

spl_autoload_register(function($class) {
	require D . '/' . $class .'.php';
});