<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->delete_design(array(
                # int numeric ID of the design (required)
                'design_id' => DESIGN_ID,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}