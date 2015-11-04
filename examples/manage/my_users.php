<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->my_users(array(
                'count' => null, 
                'start' => null,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}