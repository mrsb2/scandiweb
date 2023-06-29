<?php



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


