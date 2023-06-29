<?php


abstract class Product {
    
    protected $sku;
    protected $name;
    protected $price;
    protected $type;
    
    protected $attribute_type;
    protected $attribute_value;

    public function __construct($sku,$name , $price,$type,$attribute_type, $attribute_value) {
        
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
        $this->attribute_type=$attribute_type;
        $this->attribute_value=$attribute_value;
        
    }

    abstract public function add();

}




?>