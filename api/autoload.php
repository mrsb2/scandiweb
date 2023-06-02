<?php

spl_autoload_register(function ($class_name) {
  $base_directory = __DIR__;
  $class_file = $base_directory . '/' . str_replace('\\', '/', $class_name) . '.php';

  if (file_exists($class_file)) {
      require_once $class_file;
      
  } else {
      $products_directory = $base_directory . '/products';
      $products_file = $products_directory . '/' . str_replace('\\', '/', $class_name) . '.php';

      if (file_exists($products_file)) {
          include $products_file;
          
      }
  }
});



?>
