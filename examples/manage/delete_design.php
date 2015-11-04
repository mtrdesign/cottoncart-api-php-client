<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->delete_design(array(
                'design_id' => 4529,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}