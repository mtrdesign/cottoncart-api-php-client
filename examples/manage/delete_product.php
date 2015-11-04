<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->delete_product(array(
                # int numeric ID of the product (required)
                'product_id' => PRODUCT_ID,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}