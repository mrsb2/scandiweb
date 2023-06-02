<?php


class delProducts
{
    public static function delProduct($product_ids) {
        global $conn;

        

        // Delete products from 'products' table
        foreach ($product_ids as $id) {
            // Delete the product's attributes from the product_attributes table
            $sql = "DELETE FROM product_attributes WHERE product_id='$id'";
            $result = $conn->query($sql);
    
            // Delete the product from the products table
            $sql = "DELETE FROM products WHERE id='$id'";
            $result = $conn->query($sql);
        }
    
    }
}

?>