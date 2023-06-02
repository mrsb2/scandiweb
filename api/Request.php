<?php

require_once 'IRequest.php';


class Request implements IRequest {
    public function getMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getPath() {
        return $_SERVER['REQUEST_URI'];
    }

    public function getBody() {
        // Implement the logic to retrieve the request body
        // You can use $_POST, $_GET, or other methods based on your requirements
        // Example: return $_POST;
    }

    public function getParams() {
        // Implement the logic to retrieve the request parameters
        // You can use $_GET, $_POST, or other methods based on your requirements
        // Example: return $_GET;
    }

    public function getQuery() {
        // Implement the logic to retrieve the query parameters
        // You can use $_GET or other methods based on your requirements
        // Example: return $_GET;
    }
}
?>