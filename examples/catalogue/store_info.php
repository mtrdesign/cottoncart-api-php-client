<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->catalogue->store_info(array(
                # string alphanumeric ID of the store (required)
                'store_id'       => STORE_ID,
                # string|null 2-char country code for shipping costs (optional; default: 'gb')
                'country'        => null,
                # string|null show embed shop settings in the response (optional; default: 'no')
                'embed_settings' => null,
                # int|null number of store products to list (optional; default: all products)
                'count'          => null,
                # int|null offset to start listing products from (optional; 0-based, default: 0)
                'start'          => null,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}