<?php

class Router {
    protected $routes = [];

    public function get($path, $handler) {
        $this->routes['GET'][$path] = $handler;
    }

    public function post($path, $handler) {
        $this->routes['POST'][$path] = $handler;
    }

    public function delete($path, $handler) {
        $this->routes['DELETE'][$path] = $handler;
    }

    public function dispatch(IRequest $request) {
        $method = $request->getMethod();
        $path = $request->getPath();

        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $routePath => $handler) {
                if ($path === $routePath) {
                    if (is_callable($handler)) {
                        $handler();
                        return;
                    }
                }
            }
        }

        echo "404 Not Found";
    }

    
}
?>