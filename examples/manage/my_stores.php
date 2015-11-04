<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->my_stores(array(
                # int|null number of stores to list (optional; default: all stores)
                'count' => null, 
                # int|null offset to start listing stores from (optional; 0-based, default: 0)
                'start' => null, 
                # int|null list only stores owned by this sub-user 
                # (optional; default: list all stores; if 0, list only stores NOT belonging to sub-users)
                'user_id' => null,
              )); 
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}