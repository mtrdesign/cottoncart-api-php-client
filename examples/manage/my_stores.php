<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->my_stores(array(
                'count' => null, 
                'start' => null, 
                'user_id' => null,
              )); 
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}