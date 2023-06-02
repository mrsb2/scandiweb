<?php

class getProducts{
    
    public static function getProduct() {
    global $conn;
    
    // $sql = "SELECT p.*, pa.attribute_key, pa.attribute_value
    // FROM products p
    // LEFT JOIN product_attributes pa ON p.id = pa.product_id";
    $sql = "SELECT p.*, a.attribute_type, a.attribute_value FROM products p 
        LEFT JOIN product_attributes a ON p.id = a.product_id";
        
    
        $result = $conn->query($sql);
        if (!$result) {
            header('HTTP/1.1 500 Internal Server Error');
            echo 'Failed to fetch products from the database.';
            exit;
        }
        $products = $result->fetch_all(MYSQLI_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($products);
        mysqli_close($conn);
    }
    
}

?>