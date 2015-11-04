<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->delete_store(array(
                'store_id' => STORE_ID,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}