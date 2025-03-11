<?php
	
	require_once '../vendor/autoload.php';
	
	const VIEW_DIR = __DIR__ . "../../src/View/pages";
	const LAYOUT_DIR = __DIR__ . "../../src/View/layouts";
	const STYLE_DIR = "/assets/css";
	const SCRIPT_DIR = "/assets/js";
	const IMG_DIR = "./assets/img";
	
	use App\Core\SessionManager;
	use App\Core\Router;
	use App\Routes;
	
	SessionManager::start();
	
	$router = new Router();
	$routes = new Routes( $router );
	$routes->routes();
