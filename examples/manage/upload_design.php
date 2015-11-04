<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->upload_design(array(
                'store_id'    => STORE_ID,
                'design_file' => __DIR__ . DS . '..' . DS . 'logo-800x800.jpg',
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}