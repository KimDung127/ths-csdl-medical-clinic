<?php

class Router {
    protected $routes = [];

    // Add route with optional parameters
    public function add($route, $controllerAction) {
        // Convert route placeholders to regular expressions (e.g., /user/{id}/{name} -> /user/(\d+)/(\w+))
        $route = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_-]+)', $route);
        $this->routes['#^' . $route . '$#'] = $controllerAction;
    }

    // Dispatch the URI
    public function dispatch($uri) {
        // Separate the URI path from query parameters (e.g., /user/123?name=john)
        $uriParts = parse_url($uri);
        $path = $uriParts['path'];

        foreach ($this->routes as $routePattern => $controllerAction) {
            // Check if the URI path matches the route pattern
            if (preg_match($routePattern, $path, $matches)) {
                array_shift($matches); // Remove the full match from the array

                // Extract controller and action
                list($controllerName, $actionName) = explode('@', $controllerAction);
                $controller = new $controllerName();

                if (method_exists($controller, $actionName)) {
                    // Call the controller action (no params passed)
                    $controller->{$actionName}();
                } else {
                    echo "Method $actionName not found!";
                }
                return;
            }
        }

        // No matching route found
        echo "No route found for $uri";
    }

    // Function to get GET parameters (query params)
    public static function get($key = null) {
        if ($key === null) {
            return $_GET; // Return all GET parameters
        }
        return isset($_GET[$key]) ? $_GET[$key] : null; // Return specific GET param
    }

    // Function to get POST parameters
    public static function post($key = null) {
        if ($key === null) {
            return $_POST; // Return all POST parameters
        }
        return isset($_POST[$key]) ? $_POST[$key] : null; // Return specific POST param
    }
}
