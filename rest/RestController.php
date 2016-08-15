<?php
require_once("RestHandler.php");
		
$view = "";
if (isset($_GET["view"])) {
	$view = $_GET["view"];
}
/*
controls the RESTful services
URL mapping
*/
switch($view){

	case "all":
		// to handle REST Url /api/users/
		$RestHandler = new RestHandler();
		$RestHandler->getAllData();
		break;
		
	case "single":
		// to handle REST Url /api/users/<id>/
		$RestHandler = new RestHandler();
		$RestHandler->getById($_GET["id"]);
		break;
	case "search":
		// to handle REST Url /api/users/search/<name>/
		$RestHandler = new RestHandler();
		$RestHandler->search($_GET["name"]);
		break;
	case "update":
		// to handle REST Url /api/users/<id>/
		$RestHandler = new RestHandler();
		$RestHandler->update($_GET["id"]);
		break;
	case "delete":
		// to handle REST Url /api/users/delete/<id>/
		$RestHandler = new RestHandler();
		$RestHandler->delete($_GET["id"]);
		break;

	case "" :
		//404 - not found;
		break;
}
?>
