<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->create_user(array(
                'email' => 'akolevu2td2@yahoo.com', 
                'name' => 'Test', 
                'password' => null,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}