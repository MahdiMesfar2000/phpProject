<?php

use Routing\Router;

session_start();
ob_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'helpers/utils.php';
require_once 'config/parameters.php';

// Connection with Database
$db = Database::connectPDO();

// Include the Router
require_once 'Routing/Router.php';

// Create an instance of the Router
$router = new Router();

// Common header logic
if (!$router->isSearchAction()) {
    $router->includeHeader();
}

// Call the route method
$router->route();

// Common footer logic
if (!$router->isSearchAction()) {
    $router->includeFooter();
}
