<?php
namespace Routing;

require_once 'controllers/errorController.php';

class Router
{
    public function route()
    {
        $controller = isset($_GET['controller']) ? $_GET['controller'] : default_controller;
        $action = isset($_GET['action']) ? $_GET['action'] : default_action;

        $controllerName = ucfirst($controller) . 'Controller';

        $controllerFilePath = 'controllers/' . $controllerName . '.php';
        if (file_exists($controllerFilePath)) {
            require_once $controllerFilePath;

            $controllerInstance = new $controllerName;

            if (method_exists($controllerInstance, $action)) {
                $controllerInstance->$action();
            } else {
                // Handle additional actions
                switch ($action) {
                    case 'searchProducts':
                        $controllerInstance->searchProducts();
                        break;
                    case 'sortProducts':
                        $controllerInstance->sortProducts();
                        break;
                    // Add more cases for additional actions if needed

                    default:
                        $this->handleError();
                }
            }
        } else {
            $this->handleError();
        }
    }

    public function isSearchAction()
    {
        return isset($_GET['action']) && in_array($_GET['action'], ['searchProducts', 'sortProducts']);
    }

    public function includeHeader()
    {
        if (
            isset($_GET['action'], $_GET['controller'])
            && (
                ($_GET['controller'] === 'category' && in_array($_GET['action'], ['index', 'create', 'edit']))
                || ($_GET['controller'] === 'product' && in_array($_GET['action'], ['manage', 'create', 'edit', 'save', 'delete']))
                || ($_GET['controller'] === 'order' && in_array($_GET['action'], ['manage', 'orderDetailsAdmin']))
            )
        ) {
            require_once 'views_2/layout/header_2.php';
        } else {
            require_once 'views_2/layout/header.php';
        }
    }

    public function includeFooter()
    {
        if (
            isset($_GET['action'], $_GET['controller'])
            && (
                ($_GET['controller'] === 'category' && in_array($_GET['action'], ['index', 'create', 'edit']))
                || ($_GET['controller'] === 'product' && in_array($_GET['action'], ['manage', 'create', 'edit', 'save', 'delete']))
                || ($_GET['controller'] === 'order' && in_array($_GET['action'], ['manage', 'orderDetailsAdmin']))
            )
        ) {
            require_once 'views_2/layout/footer_2.php';
        } else {
            require_once 'views_2/layout/footer.php';
        }
    }

    private function handleError()
    {
        $errorController = new errorController();
        $errorController->index();
    }
}
?>