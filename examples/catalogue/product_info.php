<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->catalogue->product_info(array(
                'product_id' => PRODUCT_ID,
                'country'	   => null,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}