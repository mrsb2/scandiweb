<?php


class DVD extends Product {
    

    public function __construct($sku,$name, $price, $type, $attribute_type, $attribute_value) {
        
        parent::__construct($sku,$name,  $price,$type,$attribute_type, $attribute_value);
        
    }

    public function add() {
        global $conn;
        
        $sku = $this->sku;
        $name = $this->name;
        $price = $this->price;
        $type = $this->type;
        $attribute_type = $this->attribute_type;
        $attribute_value = $this->attribute_value;
        
        $sql = "INSERT INTO products (sku,name,  price, type) VALUES ( '$sku','$name', $price, '$type')";
        if (mysqli_query($conn, $sql)) {
            $product_id = mysqli_insert_id($conn);
            echo "Product inserted successfully. Product ID: $product_id\n";
            $size = $attribute_value . 'MB';
            $sql = "INSERT INTO product_attributes (product_id, attribute_type, attribute_value) VALUES ($product_id , '$attribute_type', '$size')";
            if (mysqli_query($conn, $sql)) {
                echo "Product attribute inserted successfully.\n";
                mysqli_close($conn);
            } else {
                echo "Error inserting product attribute: " . mysqli_error($conn) . "\n";
            }
        } else {
            echo "Error inserting product: " . mysqli_error($conn) . "\n";
        }
    }
}










?>