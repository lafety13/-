<?php

function __autoload($class)
{
	//path for finding
	$path = [
		'/components/',
		'/controllers/',
		'/models/',
		'/views/',
		'/rest/',
	];

	foreach ($path as $pathName) {
		$file = ROOT . $pathName . $class . '.php';

		if (is_file($file)) {
			include_once $file;
		}
	}
}