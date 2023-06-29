<?php


require_once 'autoload.php';
require_once 'connect.php';

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

$request = new Request();


$router = new Router($request);


$router->get('/', function () {

    echo "I'm running on 3 hours of sleep, suicidal thoughts and an oreo, and I'm ready to fight GOD or BECOME HIM!";
});
$router->get('/getProducts', 'getProducts::getProduct');
$router->post('/delProducts', function () {
    $requestData = json_decode(file_get_contents('php://input'), true);
    $productIds = $requestData['productIds'];
    echo $productIds;
    delProducts::delProduct($productIds);
});
$router->post('/addProducts', function () {
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    addProducts::addProduct($request);
});
$router->dispatch($request);
?>