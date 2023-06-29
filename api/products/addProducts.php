<?php



// abstract class Product {
    
//     protected $sku;
//     protected $name;
//     protected $price;
//     protected $type;
    
//     protected $attribute_type;
//     protected $attribute_value;

//     public function __construct($sku,$name , $price,$type,$attribute_type, $attribute_value) {
        
//         $this->sku = $sku;
//         $this->name = $name;
//         $this->price = $price;
//         $this->type = $type;
//         $this->attribute_type=$attribute_type;
//         $this->attribute_value=$attribute_value;
        
//     }

//     abstract public function add();

// }

// class Book extends Product {
    

//     public function __construct($sku,$name,  $price, $type, $attribute_type, $attribute_value) {
        
//         parent::__construct($sku,$name,  $price,$type,$attribute_type, $attribute_value);
        
//     }

//     public function add() {
//         global $conn;

//         $sku = $this->sku;
//         $name = $this->name;
//         $price = $this->price;
//         $type = $this->type;
//         $attribute_type = $this->attribute_type;
//         $attribute_value = $this->attribute_value;
//         $weight = $attribute_value . 'Kg';
//         $sql = "INSERT INTO products (sku,name,  price, type) VALUES ( '$sku','$name', $price, '$type')";
//         if (mysqli_query($conn, $sql)) {
//             $product_id = mysqli_insert_id($conn);
//             echo "Product inserted successfully. Product ID: $product_id\n";
            
//             $sql = "INSERT INTO product_attributes (product_id, attribute_type, attribute_value) VALUES ($product_id , '$attribute_type', '$weight')";
//             if (mysqli_query($conn, $sql)) {
//                 echo "Product attribute inserted successfully.\n";
//                 mysqli_close($conn);
//             } else {
//                 echo "Error inserting product attribute: " . mysqli_error($conn) . "\n";
//             }
//         } else {
//             echo "Error inserting product: " . mysqli_error($conn) . "\n";
//         }
//     }
// }
// class DVD extends Product {
    

//     public function __construct($sku,$name, $price, $type, $attribute_type, $attribute_value) {
        
//         parent::__construct($sku,$name,  $price,$type,$attribute_type, $attribute_value);
        
//     }

//     public function add() {
//         global $conn;
        
//         $sku = $this->sku;
//         $name = $this->name;
//         $price = $this->price;
//         $type = $this->type;
//         $attribute_type = $this->attribute_type;
//         $attribute_value = $this->attribute_value;
        
//         $sql = "INSERT INTO products (sku,name,  price, type) VALUES ( '$sku','$name', $price, '$type')";
//         if (mysqli_query($conn, $sql)) {
//             $product_id = mysqli_insert_id($conn);
//             echo "Product inserted successfully. Product ID: $product_id\n";
//             $size = $attribute_value . 'MB';
//             $sql = "INSERT INTO product_attributes (product_id, attribute_type, attribute_value) VALUES ($product_id , '$attribute_type', '$size')";
//             if (mysqli_query($conn, $sql)) {
//                 echo "Product attribute inserted successfully.\n";
//                 mysqli_close($conn);
//             } else {
//                 echo "Error inserting product attribute: " . mysqli_error($conn) . "\n";
//             }
//         } else {
//             echo "Error inserting product: " . mysqli_error($conn) . "\n";
//         }
//     }
// }
// class Furniture extends Product {
    

//     public function __construct($name, $sku, $price, $type, $attribute_type, $attribute_value) {
        
//         parent::__construct($name, $sku, $price,$type,$attribute_type, $attribute_value);
        
//     }

//     public function add() {
//         global $conn;
        
//         $name = $this->name;
//         $sku = $this->sku;
//         $price = $this->price;
//         $type = $this->type;
//         $attribute_type = $this->attribute_type;
//         $attribute_value = $this->attribute_value;
//         $dimmension = $attribute_value->height . 'x' . $attribute_value->width . 'x' . $attribute_value->length . 'Cm';
//         $sql = "INSERT INTO products (sku,name,  price, type) VALUES ( '$sku','$name', $price, '$type')";
//         if (mysqli_query($conn, $sql)) {
//             $product_id = mysqli_insert_id($conn);
//             echo "Product inserted successfully. Product ID: $product_id\n";
            
            
//             $sql = "INSERT INTO product_attributes (product_id, attribute_type, attribute_value) VALUES ($product_id , '$attribute_type', '$dimmension')";
//             if (mysqli_query($conn, $sql)) {
//                 echo "Product attribute inserted successfully.\n";
//                 mysqli_close($conn);
//             } else {
//                 echo "Error inserting product attribute: " . mysqli_error($conn) . "\n";
//             }
//         } else {
//             echo "Error inserting product: " . mysqli_error($conn) . "\n";
//         }
//     }
// }

class addProducts{
    public static function addProduct($data) {
        $productType = $data->type;
        switch ($productType) {
            case 'Book':
                $product = new Book($data->sku, $data->name, $data->price, $data->type, $data->attribute_type, $data->attribute_value);
                break;
            case 'Furniture':
                $product = new Furniture($data->sku, $data->name, $data->price, $data->type, $data->attribute_type, $data->attribute_value);
                break;
            case 'DVD':
                $product = new DVD($data->sku, $data->name, $data->price, $data->type, $data->attribute_type, $data->attribute_value);
                break;
            default:
                echo "Invalid product type.\n";
                return;
        }
        $product->add();
    }

}




?>


