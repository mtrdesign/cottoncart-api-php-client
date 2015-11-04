<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->product_options(array(
                'store_id' => 'test2233',
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}