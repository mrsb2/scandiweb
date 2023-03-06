<?php
header("Access-Control-Allow-Origin: *");

class Products {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct() {
        $this->servername = "localhost";
        $this->username = "scandiweb_root";
        $this->password = "scandiweb2468";
        $this->dbname = "mrsomebo_scandiweb";
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
    }

    public function get_products() {
        if (!$this->conn) {
        die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT p.*, a.attribute_type, a.attribute_value FROM products p 
        LEFT JOIN product_attributes a ON p.id = a.product_id";
        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        echo json_encode($rows);
        } else {
        echo "No products found.";
        }

        mysqli_close($this->conn);
    }
}

// Instantiate the class and call the get_products method
$products = new Products();
$products->get_products();
?>
