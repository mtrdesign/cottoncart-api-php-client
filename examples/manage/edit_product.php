<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->edit_product(array(
                'product_id'      => 307,
                'name'            => 'Test 1',
                'colours'         => array(),
                'featured_colour' => null,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}