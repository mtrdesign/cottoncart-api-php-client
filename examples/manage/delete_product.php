<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->delete_product(array(
                'product_id' => 307,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}