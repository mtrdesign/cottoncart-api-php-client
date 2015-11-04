<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->catalogue->store_info(array(
                'store_id'		   => 'test23',
                'country'		     => null,
                'embed_settings' => null,
                'count'			     => null,
                'start'			     => null,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}