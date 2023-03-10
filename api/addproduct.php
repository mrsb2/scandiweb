<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");


class AddProduct {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;
 

    // i ve forgot to made them as .env

    public function __construct() {
        $this->servername = "localhost";
        $this->username = "scandiweb_root";
        $this->password = "scandiweb2468";
        $this->dbname = "mrsomebo_scandiweb"; 
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
    }

    public function add_product($data) {
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $product_name = $data->name;
        $sku = $data->sku;
        $price = $data->price;
        $product_type = $data->type;
        $attribute_type = $data->attribute_type;
        $attribute_value = $data->attribute_value;

        // Insert product into 'products' table
        $sql = "INSERT INTO products (name, sku, price, type) VALUES ('$product_name', '$sku', $price, '$product_type')";
        if (mysqli_query($this->conn, $sql)) {
            $product_id = mysqli_insert_id($this->conn);

            // Insert product attribute into 'product_attributes' table
            $sql = "INSERT INTO product_attributes (product_id, attribute_type, attribute_value) VALUES ($product_id, '$attribute_type', '$attribute_value')";
            if (mysqli_query($this->conn, $sql)) {
                echo "Product inserted successfully";
            } else {
                echo "Error inserting product attribute: " . mysqli_error($this->conn);
            }
        } else {
            echo "Error inserting product: " . mysqli_error($this->conn);
        }

        mysqli_close($this->conn);
    }
}

// Read incoming JSON data
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

// Instantiate the class and call the add_product method
$add_product = new AddProduct();
$add_product->add_product($request);
?>