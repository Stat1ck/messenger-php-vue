<?php
declare(strict_types=1);
session_start();

define('D', __DIR__);

//dev
require_once D . '/dev/dev.php';

//autoload classes
require_once D . '/core/autoload/autoload_classes.php';

//start app
require_once D . '/core/bootstrap.php';