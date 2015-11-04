<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->delete_store(array(
                # string alphanumeric ID of the store (required)
                'store_id' => STORE_ID,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}