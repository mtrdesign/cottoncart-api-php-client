<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->my_users(array(
                # int|null number of sub-users to list (optional; default: all sub-users)
                'count' => null, 
                # int|null offset to start listing sub-users from (optional; 0-based, default: 0)
                'start' => null,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}