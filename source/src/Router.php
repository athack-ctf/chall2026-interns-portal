<?php

class Router {
    private $routes = [];
    private $rawPath = '';

    public function get($path, $handler) {
        $this->routes['GET'][$path] = $handler;
    }

    public function post($path, $handler) {
        $this->routes['POST'][$path] = $handler;
    }
    
    private function getPathInfo() {
        return $_SERVER['PATH_INFO'] ?? '';
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        
        $this->rawPath = $this->getPathInfo();

        AuthMiddleware::handle($this->rawPath);

        $normalizedPath = $this->rawPath;
        if ($normalizedPath === '' || $normalizedPath[0] !== '/') {
            $normalizedPath = '/' . $normalizedPath;
        }

        if (!isset($this->routes[$method])) {
            $this->notFound();
            return;
        }

        foreach ($this->routes[$method] as $route => $handler) {
            $params = $this->matchRoute($route, $normalizedPath);
            if ($params !== false) {
                $this->callHandler($handler, $params);
                return;
            }
        }

        $this->notFound();
    }

    private function matchRoute($route, $path) {
        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $route);
        $pattern = '#^' . $pattern . '$#';

        if (preg_match($pattern, $path, $matches)) {
            array_shift($matches);
            return $matches;
        }

        return false;
    }

    private function callHandler($handler, $params) {
        list($controller, $method) = explode('@', $handler);
        $controllerInstance = new $controller();
        call_user_func_array([$controllerInstance, $method], $params);
    }

    private function notFound() {
        http_response_code(404);
        echo "404 Not Found";
    }
}