<?php



class Furniture extends Product {
    

    public function __construct($name, $sku, $price, $type, $attribute_type, $attribute_value) {
        
        parent::__construct($name, $sku, $price,$type,$attribute_type, $attribute_value);
        
    }

    public function add() {
        global $conn;
        
        $name = $this->name;
        $sku = $this->sku;
        $price = $this->price;
        $type = $this->type;
        $attribute_type = $this->attribute_type;
        $attribute_value = $this->attribute_value;
        $dimmension = $attribute_value->height . 'x' . $attribute_value->width . 'x' . $attribute_value->length . 'Cm';
        $sql = "INSERT INTO products (sku,name,  price, type) VALUES ( '$sku','$name', $price, '$type')";
        if (mysqli_query($conn, $sql)) {
            $product_id = mysqli_insert_id($conn);
            echo "Product inserted successfully. Product ID: $product_id\n";
            
            
            $sql = "INSERT INTO product_attributes (product_id, attribute_type, attribute_value) VALUES ($product_id , '$attribute_type', '$dimmension')";
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