<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->catalogue->stores(array(
                # int|null number of stores to list (optional; default: all stores)
                'count' => null, 
                # int|null offset to start listing stores from (optional; 0-based, default: 0)
                'start' => null, 
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}