<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');



class DeleteProduct {
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

    public function delete_products($product_ids) {
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        foreach ($product_ids as $id) {
            // Delete the product's attributes from the product_attributes table
            $sql = "DELETE FROM product_attributes WHERE product_id='$id'";
            mysqli_query($this->conn, $sql);
    
            // Delete the product from the products table
            $sql = "DELETE FROM products WHERE id='$id'";
            mysqli_query($this->conn, $sql);
        }
    

        echo "Products deleted successfully.";

        mysqli_close($this->conn);
    }
}

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (isset($data['productIds'])) {
    $product_ids = $data['productIds'];

    // Instantiate the class and call the delete_products method
    $delete_product = new DeleteProduct();
    $delete_product->delete_products($product_ids);
} else {
    echo "No product IDs specified.";
}
?>
