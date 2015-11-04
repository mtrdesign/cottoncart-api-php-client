<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->create_product(array(
                'store_id'        => 'test2233',
                'name'            => 'Test',
                'design_id'       => null,
                'design_file'     => __DIR__ . DS . '..' . DS . 'logo-800x800.jpg',
                'product_type_id' => 'all',
                'process'         => 'all',
                'colours'         => 'all',
                'featured_colour' => null,
                'scale'           => null,
                'horiz'           => null,
                'vert'            => null,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}