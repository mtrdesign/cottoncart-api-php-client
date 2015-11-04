<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->upload_design(array(
                # string alphanumeric ID of the store where the product will be added (required)
                'store_id'    => STORE_ID,
                # string an image file to upload as new design (required)
                'design_file' => __DIR__ . DS . '..' . DS . 'logo-800x800.jpg',
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}