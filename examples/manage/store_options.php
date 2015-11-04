<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->store_options(array(
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}