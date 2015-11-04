<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->product_options(array(
                # string alphanumeric ID of the store where the product will be added (required)
                'store_id' => STORE_ID,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}